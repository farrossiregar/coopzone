<?php
namespace App\Http\Livewire\CategorySubcategory;

use App\Models\UserAccess;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Category;
use Illuminate\Validation\Rule; 

class InsertCategory extends Component 
{
	use WithFileUploads;
	public $name_category;

    public $is_approve,$is_success=false;
 

	protected $listeners = ['save-all'=>'save_all'];

	public function render()
    {
        return view('livewire.category-subcategory.insertcategory');
    }
    
	public function mount()
	{
		
	}
	
	
	public function save()
    {
		$rules = [
			'name_category' => 'required|string',
		];

	

		$data 					= new Category();
        $data->name_category	= $this->name_category;
        $data->url_category		= strtolower(str_replace(" ","-",$this->name_category));
        $data->save();
        
		session()->flash('message-success',__('Category berhasil disimpan'));

		return redirect()->to('category-subcategory');
    }
}