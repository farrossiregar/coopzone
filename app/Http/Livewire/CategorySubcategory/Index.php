<?php

namespace App\Http\Livewire\CategorySubcategory;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StockPhoto;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    public $keyword,$koordinator_id,$status;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $dataMember,$selected,$password;
    public function render()
    {
        $data = StockPhoto::orderBy('id', 'desc');

        return view('livewire.category-subcategory.index')
                ->layout('layouts.app')
                ->with(['data'=>$data->paginate(100)]);
    }

    

    public function deletecategory($id)
    {
        Category::find($id)->delete();
    }


    public function deletesubcategory($id)
    {
        Subcategory::find($id)->delete();
    }
    
    
}
