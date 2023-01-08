<?php
namespace App\Http\Livewire\CategorySubcategory;

use App\Models\UserAccess;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Subcategory;
use Illuminate\Validation\Rule; 

class InsertSubcategory extends Component 
{
	use WithFileUploads;
	public $name_subcategory, $id_category;

    public $is_approve,$is_success=false;
 

	protected $listeners = ['save-all'=>'save_all'];

	public function render()
    {
        return view('livewire.category-subcategory.insertsubcategory');
    }
    
	public function mount()
	{
		
	}
	
	
	public function save()
    {
		$rules = [
			'name_subcategory' => 'required|string',
			'id_category' => 'required|string',
		];

	

		$data 					= new Subcategory();
        $data->name_subcategory	= $this->name_subcategory;
        $data->id_category		= $this->id_category;
        $data->url_subcategory	= strtolower(str_replace(" ","-",$this->name_subcategory));
        $data->save();
        
		session()->flash('message-success',__('Subcategory berhasil disimpan'));

		return redirect()->to('category-subcategory');
    }
}