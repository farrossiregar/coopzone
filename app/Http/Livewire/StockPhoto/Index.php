<?php

namespace App\Http\Livewire\StockPhoto;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StockPhoto;
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
        

        if($this->keyword){
            $data->where(function($table){
                foreach(\Illuminate\Support\Facades\Schema::getColumnListing('stockphoto') as $column){
                    $table->orWhere("stockphoto.".$column,'LIKE',"%{$this->keyword}%");
                }
            });
        }
        

        return view('livewire.stock-photo.index')
                ->layout('layouts.app')
                ->with(['data'=>$data->paginate(100)]);
    }

    public function delete($id)
    {
        StockPhoto::find($id)->delete();
    }

}
