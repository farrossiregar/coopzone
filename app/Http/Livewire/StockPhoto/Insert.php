<?php
namespace App\Http\Livewire\StockPhoto;

use App\Models\UserAccess;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\StockPhoto;
use App\Models\Iuran;
use App\Models\User;
use Illuminate\Validation\Rule; 

class Insert extends Component 
{
	use WithFileUploads;
	public $stock_photo, $foto_source, $foto_caption, $category, $subcategory;

    public $is_approve,$is_success=false;
  
	public $dana_form;

	protected $listeners = ['save-all'=>'save_all'];

	public function render()
    {
        return view('livewire.stock-photo.insert')->with(
            ['access'=>UserAccess::all()]
        );
    }
    
	public function mount()
	{
		// $this->tanggal_diterima = date('Y-m-d');
		
	}
	
	
	
	// public function save_all($num)
	// {
	// 	if($num==1) $this->validate_form_1 = true;
	// 	if($num==2) $this->validate_form_2 = true;
	// 	if($num==3) $this->validate_form_3 = true;
	// 	if($num==4) $this->validate_form_4 = true;
	// 	if($num==5) $this->validate_form_5 = true;
	

		
	// 	if($this->umur >=60 and $this->umur <=64){ // di atas 60 dan di bawah 64 tahun wajib mendaftarkan satu anggota
    //         if($this->validate_form_1){
	// 			$this->save();
	// 		}
    //     }elseif($this->umur >=65 and $this->umur <=74){ // di atas 65 dan di bawah 74 tahun wajib mendaftarkan 3 anggota
    //         if($this->validate_form_1 and $this->validate_form_2  and $this->validate_form_3 ){
	// 			$this->save();
	// 		}
    //     }elseif($this->umur>=75){
    //         if($this->validate_form_1==true and $this->validate_form_2==true and $this->validate_form_3==true and $this->validate_form_4==true and $this->validate_form_5==true){
	// 			$this->save();
	// 		}
	// 	}
	// }

	// public function form3()
	// {
	// 	$this->emit('counting_form');
	// 	$this->emit('validate-rekomendasi');
	// }

	
	public function save()
    {
		$rules = [
			// 'Id_Ktp'=>['required',
			// 				Rule::unique('user_member')->where(function($query) {
			// 					$query->where('Id_Ktp', $this->Id_Ktp)->where('status', 2);
			// 				})
			// 			],
			'foto_caption' => 'required|string',
			'foto_source' => 'required|string',
			'category' => 'required',
			'subcategory'=>'required',
			'stock_photo'=>'required|image:max:1024',
		
		];

		// if($this->foto_ktp!="") $rules['foto_ktp'] = 'image:max:1024';
		
		// $message_rules = [
		// 	"Id_Ktp.unique" => "Maaf No KTP sudah digunakan silahkan dicoba dengan No KTP yang lain.",
		// 	"uang_pendaftaran.min" => "Minimal uang pendaftaran Rp. 50.000,-"
		// ];
		
		// validate payment_date if empty
		if(empty($this->payment_date)) $this->payment_date = date('Y-m-d');

    	$this->validate($rules,$message_rules);
	
		$password = generate_password($this->name,$this->tanggal_lahir);
		
		$counting =  get_setting('counting_no_anggota_new')+1;
		update_setting('counting_no_anggota_new',$counting);

		$no_anggota = date('ym',strtotime($this->tanggal_diterima)).str_pad($counting,6, '0', STR_PAD_LEFT);
		
    	$user = new User();
        $user->user_access_id = 4; // Member
        $user->nik = $this->Id_Ktp;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->telepon = $this->phone_number;
        $user->address = $this->address;
        $user->password = Hash::make($password);
		$user->username = $no_anggota;
        $user->save();

        $data = new UserMember();
		
        $data->masa_tenggang = date('Y-m-d',strtotime("+6 months",strtotime($this->tanggal_diterima)));



        if($this->stock_photo != ""){
            // $stockphoto = 'foto_ktp'.date('Ymdhis').'.'.$this->foto_ktp->extension();
            $stockphoto = $this->stock_photo->getClientOriginalName().'.'.$this->stock_photo->extension();
            $this->stock_photo->storePubliclyAs('public/images',$stockphoto);
            $this->stock_photo->storePubliclyAs('public/thumbnail',$stockphoto);
            $data->stock_photo = $stockphoto;
        }
		
		$data->koordinator_alamat = $this->koordinator_alamat;
		$data->save();

		// Iuran
        // $bulan = date('m',strtotime($this->tanggal_diterima));
        // $tahun = date('Y',strtotime($this->tanggal_diterima));
        // for($count=1;$data->iuran_tetap>=$count;$count++){
        //     if($bulan>12){ // jika sudah melebihi 12 bulan maka balik ke bulan ke 1 tapi tahun bertambah
        //         $bulan = 1;
        //         $tahun++;
        //     }
		// 	// Iuran
		// 	$iuran = new Iuran();
		// 	$iuran->user_member_id = $data->id;
		// 	$iuran->type = 'Iuran';
		// 	$iuran->nominal = $data->total_iuran_tetap;
		// 	$iuran->from_periode = $data->tanggal_diterima;
		// 	$iuran->to_periode = date('Y-m-d',strtotime("+".($data->iuran_tetap-1)." months",strtotime($this->tanggal_diterima)));
		// 	$iuran->bank_account_id = $this->bank_account_id;
		// 	$iuran->file = $data->file_konfirmasi; 
		// 	$iuran->payment_date = $this->payment_date ? $this->payment_date : null;
		// 	$iuran->status = 2;
		// 	$iuran->bulan = $bulan;
		// 	$iuran->tahun = $tahun;
        //     $iuran->iuran_pertama = 1;
		// 	$iuran->save();
		// 	$bulan++;
		// }

		
		// if($this->validate_form_5){ 
		// 	$counting =  get_setting('counting_no_anggota_new')+1;
		// 	update_setting('counting_no_anggota_new',$counting);
		// 	$this->emit('save_rekomendasi',['num'=>5,'id'=>$data->id,'no_anggota'=>$counting]);
		// }
		// $this->is_success =true;
		
		// $messageWa  = "Kepada Yth Ibu/Bpak ".$data->name.",\n\nTerima kasih telah mendaftar sebagai Anggota di Yayasan Kematian Santa Maria, \nNomor Anggota : *".$data->no_anggota_platinum."*\n. Silahkan login dengan menggunakan username :". $data->no_anggota_platinum ."\n dan password {$password} \n";
        // $messageWa .= 'Masa Tunggu Klaim : '. date('d F Y',strtotime($data->masa_tenggang));
        // sendNotifWa($messageWa, $this->phone_number);
        
		session()->flash('message-success',__('Photo berhasil disimpan'));
    }
}