<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\UserMember;
use App\Models\WorkOrder;
use App\Models\User;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Hash;

class Register extends Component 
{
	use WithFileUploads;
	public $name;
	// public $name_kta;
    public $is_approve,$is_success=false;
    // public $extend_register1=false,$extend_register2=false;

	public $wo_number, $wo_date, $requester_name, $phone, $business_name, $cooperative_name, $email, $department, $work_requested;
	public $modify_req, $implementation_req, $access_issue, $trouble_ticket, $other_action_req;
    public $core_system, $finance_and_accounting, $inventory, $point_of_sales, $human_resources, $payroll, $mobile_attendance, $mobile_stock_opname, $other_software_service;


    public $modify_req_field=false;
    public $implementation_req_field=false;
    public $access_issue_field=false;
    public $trouble_ticket_field=false;
    public $other_action_req_field=false;

    public $finance_and_accounting_field=false;
    public $inventory_field=false;
    public $point_of_sales_field=false;
    public $human_resources_field=false;
    public $payroll_field=false;
    public $mobile_attendance_field=false;
    public $mobile_stock_opname_field=false;
    public $other_software_service_field=false;





	// public $insert=false;
	// public $attachment_rekomendator_file, $attachment_rekomendator_name, $rand_id;

	// protected $rules = [
    //     'name' => 'required|string',
    //     'name_kta' => 'required|string',
    //     'email' => 'required|string',
	// 	'phone_number' => 'required',
	// 	'iuran_tetap'=>'required',
	// 	'sumbangan'=>'required',
	// 	'uang_pendaftaran'=>'required|numeric|min:50000',
    // ];

	protected $listeners = ['save-all'=>'save_all'];

	public function render()
    {
        return view('livewire.register')->layout('layouts.auth');
    }

	public function mount()
	{
		$this->rand_id = rand();
		$this->form_no = date('ymd').UserMember::count();
	}

	public function enablefield($type){
		if($type == 'implementation_req'){
			$this->implementation_req_field = true;
		}

		if($type == 'modify_req'){
			$this->modify_req_field = true;
		}

		if($type == 'access_issue'){
			$this->access_issue_field = true;
		}

		if($type == 'trouble_ticket'){
			$this->trouble_ticket_field = true;
		}

		if($type == 'other_action_req'){
			$this->other_action_req_field = true;
		}

		if($type == 'finance_and_accounting'){
			$this->finance_and_accounting_field = true;
		}

		if($type == 'inventory'){
			$this->inventory_field = true;
		}

		if($type == 'point_of_sales'){
			$this->point_of_sales_field = true;
		}

		if($type == 'human_resources'){
			$this->human_resources_field = true;
		}

		if($type == 'payroll'){
			$this->payroll_field = true;
		}

		if($type == 'mobile_attendance'){
			$this->mobile_attendance_field = true;
		}

		if($type == 'mobile_stock_opname'){
			$this->mobile_stock_opname_field = true;
		}

		if($type == 'other_software_service'){
			$this->other_software_service_field = true;
		}
		
	}

	public function disablefield($type){
		if($type == 'implementation_req'){
			$this->implementation_req_field = false;
		}

		if($type == 'modify_req'){
			$this->modify_req_field = false;
		}

		if($type == 'access_issue'){
			$this->access_issue_field = false;
		}

		if($type == 'trouble_ticket'){
			$this->trouble_ticket_field = false;
		}

		if($type == 'other_action_req'){
			$this->other_action_req_field = false;
		}

		if($type == 'finance_and_accounting'){
			$this->finance_and_accounting_field = false;
		}

		if($type == 'inventory'){
			$this->inventory_field = false;
		}

		if($type == 'point_of_sales'){
			$this->point_of_sales_field = false;
		}

		if($type == 'human_resources'){
			$this->human_resources_field = false;
		}

		if($type == 'payroll'){
			$this->payroll_field = false;
		}

		if($type == 'mobile_attendance'){
			$this->mobile_attendance_field = false;
		}

		if($type == 'mobile_stock_opname'){
			$this->mobile_stock_opname_field = false;
		}

		if($type == 'other_software_service'){
			$this->other_software_service_field = false;
		}
	}

	public function save(){
		$data 					= new WorkOrder();
        $data->wo_number		= $this->wo_number;
        $data->wo_date			= $this->wo_date;
        $data->requester_name	= $this->requester_name;
        $data->phone			= $this->phone;
        $data->business_name	= $this->business_name;
        $data->cooperative		= $this->cooperative_name;
        $data->email			= $this->email;
        $data->department		= $this->department;
        
        
        $data->save();

        
		session()->flash('message-success',__('Data berhasil disimpan'));

        return redirect()->to('register');
	}

}