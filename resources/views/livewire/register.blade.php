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
        <form class="form-auth-small" method="POST" wire:submit.prevent="register" action="" {!!($is_success?'style="display:none"':'')!!}>
            
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
                            <input type="text" class="form-control" wire:change="checkKTP" id="Id_Ktp" placeholder="Enter ID" wire:model="Id_Ktp">
                            @error('Id_Ktp') <span class="text-danger">{{ $message }}</span> @enderror
<!--                             
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <i class="fa fa-info"></i> Data KTP sudah digunakan
                            </div> -->
                            
                        </div> 
                        <div class="col-md-6">
                            <label>WO Date</label>
                            <input type="text" class="form-control" wire:model="no_anggota_gold" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputAlamat">Requester Name</label>
                            <input type="text" class="form-control" wire:change="checkKTP" id="Id_Ktp" placeholder="Enter ID" wire:model="Id_Ktp">
                            @error('Id_Ktp') <span class="text-danger">{{ $message }}</span> @enderror
                            
                        </div> 
                        <div class="col-md-6">
                            <label>Phone</label>
                            <input type="text" class="form-control" wire:model="no_anggota_gold" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputAlamat">Requester Name</label>
                            <input type="text" class="form-control" wire:change="checkKTP" id="Id_Ktp" placeholder="Enter ID" wire:model="Id_Ktp">
                            @error('Id_Ktp') <span class="text-danger">{{ $message }}</span> @enderror 
                        </div> 
                        <div class="col-md-6">
                            <label>Phone</label>
                            <input type="text" class="form-control" wire:model="no_anggota_gold" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputAlamat">Business Name</label>
                            <input type="text" class="form-control" wire:change="checkKTP" id="Id_Ktp" placeholder="Enter ID" wire:model="Id_Ktp">
                            @error('Id_Ktp') <span class="text-danger">{{ $message }}</span> @enderror 
                        </div> 
                        <div class="col-md-6">
                            <label>Cooperative Name</label>
                            <input type="text" class="form-control" wire:model="no_anggota_gold" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputAlamat">Email</label>
                            <input type="text" class="form-control" wire:change="checkKTP" id="Id_Ktp" placeholder="Enter ID" wire:model="Id_Ktp">
                            @error('Id_Ktp') <span class="text-danger">{{ $message }}</span> @enderror 
                        </div> 
                        <div class="col-md-6">
                            <label>Department</label>
                            <input type="text" class="form-control" wire:model="no_anggota_gold" />
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
                                    <input type="checkbox" class="form-check-input form-control" wire:model="departure_airport" readonly>
                                
                                    @error('departure_airport')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" wire:model="departure_airport" readonly>
                                
                                    @error('departure_airport')
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
                                    <input type="checkbox" class="form-check-input form-control" wire:model="departure_airport" readonly>
                                
                                    @error('departure_airport')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" wire:model="departure_airport" readonly>
                                
                                    @error('departure_airport')
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
                                    <input type="checkbox" class="form-check-input form-control" wire:model="departure_airport" readonly>
                                
                                    @error('departure_airport')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" wire:model="departure_airport" readonly>
                                
                                    @error('departure_airport')
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
                                    <input type="checkbox" class="form-check-input form-control" wire:model="departure_airport" readonly>
                                
                                    @error('departure_airport')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" wire:model="departure_airport" readonly>
                                
                                    @error('departure_airport')
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
                                    <input type="checkbox" class="form-check-input form-control" wire:model="departure_airport" readonly>
                                
                                    @error('departure_airport')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" wire:model="departure_airport" readonly>
                                
                                    @error('departure_airport')
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
                                    <label style="float:right;">TROUBLE TICKET</label>
                                </div>
                                <div class="col-md-1 form-group">
                                    <input type="checkbox" class="form-check-input form-control" wire:model="departure_airport" readonly>
                                
                                    @error('departure_airport')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" wire:model="departure_airport" readonly>
                                
                                    @error('departure_airport')
                                    <ul class="parsley-errors-list filled" id="parsley-id-29"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <br>
                <div class="form-group">
                    
                    <div class="col-md-12 form-group">
                        <a href="javascript:void(0)" wire:click="form1"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <button type="button" wire:loading.remove class="ml-3 btn btn-primary" wire:click="form3">{{ __('Submit Pendaftaran') }} <i class="fa fa-check"></i></button>
                        <span wire:loading>
                            <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                            <span class="sr-only">{{ __('Loading...') }}</span>
                        </span>
                        
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