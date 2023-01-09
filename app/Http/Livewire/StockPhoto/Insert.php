<?php
namespace App\Http\Livewire\StockPhoto;

use App\Models\UserAccess;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\StockPhoto;
use App\Models\Category;
use App\Models\Subcategory;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule; 

class Insert extends Component 
{
	use WithFileUploads;
	public $stock_photo, $foto_source, $foto_caption, $category, $subcategory;

    public $is_approve,$is_success=false;
 

	protected $listeners = ['save-all'=>'save_all'];

	public function render()
    {
        return view('livewire.stock-photo.insert');
    }
    
	public function mount()
	{
		
	}
	
	
	public function save()
    {
		$rules = [
			'foto_caption' => 'required|string',
			'foto_source' => 'required|string',
			'category' => 'required',
			'subcategory'=>'required',
			'stock_photo'=>'required|image:max:1024',
		
		];

		$image = $this->stock_photo;    
        $input['imagename'] = strtolower(str_replace(" ", "-", $this->foto_caption)).'.'.$image->extension();
		
		// $destinationPathThumb = public_path('Stock_Photo\thumbnail');
		// $destinationPathThumb = storage_path('Stock_Photo\thumbnail');

		
        // $img = Image::make($image->path());
        // $img->resize(240, 240, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPathThumb.'\\'.$input['imagename']);

		
		// $img = Image::make($image->path())->resize(240, 240, function ($constraint) {
        //     $constraint->aspectRatio();
        // });
		// $img->save('Stock_Photo/Thumbnail', $input['imagename'], 100);

		$new_img = Image::make($image->getRealPath())->resize(240, 160)->resizeCanvas(240, 160);

		// save file with medium quality
		$new_img->save(storage_path('app\public\Stock_Photo\Thumbnail\\'.$input['imagename']), 80);

		// Storage::putFileAs('public/Stock_Photo/Thumbnail' . $input['imagename'], (string)$image->encode('jpg', 95), $input['imagename']);
		// Storage::disk('local')->putFileAs('public/Stock_Photo/Thumbnail', $img, $input['imagename']);
   

		// $this->stock_photo->storePubliclyAs('Stock_Photo\images',$input['imagename']);
		// $this->stock_photo->store('Stock_Photo/Images', ['disk' => 'public']);
		$this->stock_photo->storeAs('public/Stock_Photo/Images', $input['imagename']);


		$data 				= new StockPhoto();
        $data->name			= $this->foto_caption;
        $data->foto_name	= $input['imagename'];
        $data->foto_source	= $this->foto_source;
        $data->category		= $this->category;
        $data->subcategory	= $this->subcategory;
        $data->status		= 1;
        $data->save();

        
		session()->flash('message-success',__('Photo berhasil disimpan'));

        return redirect()->to('stock-photo');
    }
}