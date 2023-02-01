@section('title', 'Register')
<div class="container">
    <div class="mt-2 card">
      <div class="card-header">
        <!-- <div class="row">
            <div class="col-md-6">
                <h4><small>Yayasan Sosial</small><br />SANTA MARIA</h4>
                <p>Jl. Citarum Tengah Ruko E-1<br />
                Telp: 024-354 4085 Semarang 50126 </p>
            </div>
            <div class="text-right col-md-6">
                <h6><small>Form No : </small>{{$form_no}}</h6>
            </div>
        </div> -->
      </div>
      <div class="card-body">
        <div {!!(!$is_success?'style="display:none"':'')!!}>
            <h6 class="text-success"><span><i class="fa fa-check"></i></span> Pendaftaran anda berhasil dilakukan</h6>
            <p>Terima kasih telah mendaftarkan diri anda sebagai Anggota Yayasan Sosial Santa Maria. Data diri anda akan segera kami proses setelah pembayaran kami terima. Silahkan cek email / Whatsapp anda untuk mendapatkan informasi pembayaran.</p>
            <h6 class="text-success"><small>Nomor Form : </small> {{$form_no}} <a href="javascript:;" class="badge badge-warning" onclick="copy_text({{$form_no}})">Copy</a></h6>
        </div>
        <form class="form-auth-small" method="POST" wire:submit.prevent="save" >
            
                <!-- <div class="alert alert-warning alert-dismissible" role="alert">
                   
                    <i class="fa fa-warning"></i> Calon anggota berusia 65 s/d 74 wajib mendaftarkan 1 (satu) anggota baru di bawah usia 50 th<br />
                   
                   
                </div>             -->
            
            
                <div class="col-md-12">
                    <h4 class="text-info">WORK ORDER</h4>
                    <hr />
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputAlamat">WO Number</label>
                            <input type="text" class="form-control" wire:model="wo_number">
                            @error('wo_number') <span class="text-danger">{{ $message }}</span> @enderror
<!--                             
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <i class="fa fa-info"></i> Data KTP sudah digunakan
                            </div> -->
                            
                        </div> 
                        <div class="col-md-6">
                            <label>WO Date</label>
                            <input type="text" class="form-control" wire:model="wo_date" />
                            @error('wo_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputAlamat">Requester Name</label>
                            <input type="text" class="form-control" wire:model="requester_name">
                            @error('requester_name') <span class="text-danger">{{ $message }}</span> @enderror
                            
                        </div> 
                        <div class="col-md-6">
                            <label>Phone</label>
                            <input type="text" class="form-control" wire:model="phone" />
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <label for="exampleInputAlamat">Business Name</label>
                            <input type="text" class="form-control" wire:model="business_name">
                            @error('business_name') <span class="text-danger">{{ $message }}</span> @enderror 
                        </div> 
                        <div class="col-md-6">
                            <label>Cooperative Name</label>
                            <input type="text" class="form-control" wire:model="cooperative_name" />
                            @error('cooperative_name') <span class="text-danger">{{ $message }}</span> @enderror 
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputAlamat">Email</label>
                            <input type="text" class="form-control" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror 
                        </div> 
                        <div class="col-md-6">
                            <label>Department</label>
                            <input type="text" class="form-control" wire:model="department" />
                            @error('department') <span class="text-danger">{{ $message }}</span> @enderror 
                        </div>
                    </div>
                </div>

                <br>
                <div class="col-md-12" >
                    <div class="row  form-group" style="border: 1px solid lightgrey; border-radius: 5px; padding: 10px 0; width: 100%; margin: auto;">
                        <br>
                        <div class="col-md-12">
                            <h5>Action Required</h5>
                        </div>
                        <br>
                        <hr>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <label style="float:right;">REQUEST FOR NEW IMPLEMENTATION</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($implementation_req_field == true)
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('implementation_req')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('implementation_req')">
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">

                                    @if($implementation_req_field == true)
                                        <input type="text" class="form-control" wire:model="modify_req">
                                    @else
                                        <input type="text" class="form-control" wire:model="implementation_req" readonly>
                                    @endif
                                
                                    @error('implementation_req')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <label style="float:right;">REQUEST TO MODIFY OR ENHANCE EXISTING</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($modify_req_field == true)
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('modify_req')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('modify_req')">
                                    @endif
                                
                                    @error('modify_req')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    @if($modify_req_field == true)
                                    <input type="text" class="form-control" wire:model="modify_req">
                                    @else
                                    <input type="text" class="form-control" wire:model="modify_req" readonly>
                                    @endif
                                
                                    @error('modify_req')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <label style="float:right;">ACCESS ISSUE</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($access_issue_field == true)
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('access_issue')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('access_issue')">
                                    @endif

                                </div>
                                <div class="col-md-6 form-group">
                                    @if($access_issue_field == true)
                                    <input type="text" class="form-control" wire:model="access_issue">
                                    @else
                                    <input type="text" class="form-control" wire:model="access_issue" readonly>
                                    @endif
                                
                                    @error('access_issue')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group" style="float:right;">
                                    <label style="float:right;">TROUBLE TICKET</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($trouble_ticket_field == true)
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('trouble_ticket')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('trouble_ticket')">
                                    @endif

                                </div>
                                <div class="col-md-6 form-group">
                                    @if($trouble_ticket_field == true)  
                                    <input type="text" class="form-control" wire:model="trouble_ticket">
                                    @else
                                    <input type="text" class="form-control" wire:model="trouble_ticket" readonly>
                                    @endif

                                    @error('trouble_ticket')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group" style="float:right;">
                                    <label style="float:right;">OTHER</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($other_action_req_field == true)  
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('other_action_req')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('other_action_req')">
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    @if($other_action_req_field == true) 
                                    <input type="text" class="form-control" wire:model="other_action_req">
                                    @else
                                    <input type="text" class="form-control" wire:model="other_action_req" readonly>
                                    @endif
                                
                                    @error('other_action_req')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>
                  

                    </div>
                </div>


                <br>
                <div class="col-md-12" >
                    <div class="row  form-group" style="border: 1px solid lightgrey; border-radius: 5px; padding: 10px 0; width: 100%; margin: auto;">
                        <br>
                        <div class="col-md-12">
                            <h5>Software Services</h5>
                        </div>
                        <hr>
                        
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group" style="float:right;">
                                    <label style="float:right;">CORE SYSTEM</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    <input type="checkbox" class="form-check-input form-control" checked disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" wire:model="core_system" required>
                                
                                    @error('core_system')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group" style="float:right;">
                                    <label style="float:right;">FINANCE AND ACCOUNTING</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($finance_and_accounting_field == true)  
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('finance_and_accounting')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('finance_and_accounting')">
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    @if($finance_and_accounting_field == true) 
                                    <input type="text" class="form-control" wire:model="finance_and_accounting">
                                    @else
                                    <input type="text" class="form-control" wire:model="finance_and_accounting" readonly>
                                    @endif
                                
                                    @error('finance_and_accounting')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group" style="float:right;">
                                    <label style="float:right;">INVENTORY</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($inventory_field == true)  
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('inventory')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('inventory')">
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    @if($inventory_field == true)  
                                    <input type="text" class="form-control" wire:model="inventory">
                                    @else
                                    <input type="text" class="form-control" wire:model="inventory" readonly>
                                    @endif
                                
                                    @error('inventory')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group" style="float:right;">
                                    <label style="float:right;">POINT OF SALES</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($point_of_sales_field == true)  
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('point_of_sales')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('point_of_sales')">
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    @if($point_of_sales_field == true)  
                                    <input type="text" class="form-control" wire:model="point_of_sales">
                                    @else
                                    <input type="text" class="form-control" wire:model="point_of_sales" readonly>
                                    @endif
                                
                                    @error('point_of_sales')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group" style="float:right;">
                                    <label style="float:right;">HUMAN RESOURCES</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($human_resources_field == true)  
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('human_resources')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('human_resources')">
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    @if($human_resources_field == true)  
                                    <input type="text" class="form-control" wire:model="human_resources">
                                    @else
                                    <input type="text" class="form-control" wire:model="human_resources" readonly>
                                    @endif
                                
                                    @error('human_resources')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group" style="float:right;">
                                    <label style="float:right;">PAYROLL</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($payroll_field == true)  
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('payroll')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('payroll')">
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    @if($payroll_field == true)  
                                    <input type="text" class="form-control" wire:model="payroll">
                                    @else
                                    <input type="text" class="form-control" wire:model="payroll" readonly>
                                    @endif
                                
                                    @error('payroll')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group" style="float:right;">
                                    <label style="float:right;">MOBILE ATTENDANCE</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($mobile_attendance_field == true)  
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('mobile_attendance')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('mobile_attendance')">
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    @if($mobile_attendance_field == true)  
                                    <input type="text" class="form-control" wire:model="mobile_attendance">
                                    @else
                                    <input type="text" class="form-control" wire:model="mobile_attendance" readonly>
                                    @endif
                                
                                    @error('mobile_attendance')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group" style="float:right;">
                                    <label style="float:right;">MOBILE STOCK OPNAME</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($mobile_stock_opname_field == true)  
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('mobile_stock_opname')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('mobile_stock_opname')">
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    @if($mobile_stock_opname_field == true)    
                                    <input type="text" class="form-control" wire:model="mobile_stock_opname">
                                    @else
                                    <input type="text" class="form-control" wire:model="mobile_stock_opname" readonly>
                                    @endif
                                
                                    @error('mobile_stock_opname')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5 form-group" style="float:right;">
                                    <label style="float:right;">OTHER (PLEASE DESCRIBE)</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    @if($other_software_service_field == true)  
                                    <input type="checkbox" class="form-check-input form-control" wire:click="disablefield('other_software_service')" checked>
                                    @else
                                    <input type="checkbox" class="form-check-input form-control" wire:click="enablefield('other_software_service')">
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    @if($other_software_service_field == true)    
                                    <input type="text" class="form-control" wire:model="other_software_service">
                                    @else
                                    <input type="text" class="form-control" wire:model="other_software_service" readonly>
                                    @endif
                                
                                    @error('other_software_service')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <br><br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputAlamat">WORK REQUESTED (BUSINESS NEED OR PROBLEM)</label>
                            <textarea name="" id="" cols="30" rows="6" class="form-control" wire:model="work_requested"></textarea>
                            
                            @error('wo_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> 
                    </div> 
                </div> 


                <br>
                <div class="form-group">
                    
                    <div class="col-md-12 form-group">
                        <a href="javascript:void(0)" wire:click="form1"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="ml-3 btn btn-primary">{{ __('Submit') }} <i class="fa fa-check"></i></button>
                        
                    </div>
                </div>
                
        </form>
      </div>
    </div>
</div>
@push('after-scripts')
<script>
    function copy_text(text) {
        var input = document.createElement('input');
        input.setAttribute('value', text);
        document.body.appendChild(input);
        input.select();
        var result = document.execCommand('copy');
        document.body.removeChild(input);
        /* Alert the copied text */
        alert("Copied the text: " + text);
    }
</script>
@endpush