<?php

namespace App\Http\Livewire\WorkOrder;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\WorkOrder;
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
        $data = WorkOrder::orderBy('id', 'desc');
        

        if($this->keyword){
            $data->where(function($table){
                foreach(\Illuminate\Support\Facades\Schema::getColumnListing('application_form') as $column){
                    $table->orWhere("application_form.".$column,'LIKE',"%{$this->keyword}%");
                }
            });
        }
        

        return view('livewire.work-order.index')
                ->layout('layouts.app')
                ->with(['data'=>$data->paginate(100)]);
    }

    public function delete($id)
    {
        StockPhoto::find($id)->delete();
    }

}
