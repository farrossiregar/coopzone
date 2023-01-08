@section('title', "Tambah Subcategory")
@section('parentPageTitle', 'Subcategory')
<div class="mt-2 card">
    <div class="card-body">
        <div class="row" >
            <div class="form-group col-md-8">
                <h5 class="text-info">DATA SUBCATEGORY</h5>
            </div>
            <div class="col-md-4 text-right">
                <span wire:loading>
                    <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                    <span class="sr-only">{{ __('Loading...') }}</span>
                </span>
            </div>
            <div class="col-md-12"><hr class="mt-0" style="border:1px solid #18a2b8" /></div>
        </div>
        <!-- <div >
            <h6 class="text-success"><span><i class="fa fa-check"></i></span> Pendaftaran anda berhasil dilakukan</h6>
            {{-- <p>Terima kasih telah mendaftarkan diri anda sebagai Anggota Yayasan Sosial Santa Maria. Data diri anda akan segera kami proses setelah pembayaran kami terima. Silahkan cek email / Whatsapp anda untuk mendapatkan informasi pembayaran.</p> --}}
        </div> -->
        <form class="form-auth-small" method="POST" wire:submit.prevent="save" action="" >
            
            <div class="row" >
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputName">Subcategory</label>
                            <input type="text" class="form-control" id="name_subcategory" placeholder="Subcategory" wire:model="name_subcategory">
                            @error('name_subcategory') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputAlamat">Category</label>
                            <select class="form-control" name="id_category" wire:model="id_category">
                                <option value=""> --- Category --- </option>
                                @foreach(\App\Models\Category::orderBy('id', 'desc')->get() as $item)
                                <option value="{{$item->id}}">{{$item->name_category}}</option> 
                                @endforeach
                            </select>
                            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                      
                    </div>


                    <!-- <div class="row">
                        
                        <div class="form-group col-md-6">
                            <label for="exampleInputAlamat">No Telp. / HP</label>
                            <input type="text" class="form-control" id="phone_number" placeholder="Enter Phone Number" wire:model="phone_number">
                            @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div> -->
                    
                    
                   
                   
                </div>
               
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>

                
                


                <div class="col-12"><br /></div>
                
                <div class="form-group col-md-12">
                    <hr />
                    <a href="/"><i class="fa fa-arrow-left"></i> {{__('Back')}}</a>
                   
                        <button type="submit" class="ml-3 btn btn-primary" >{{ __('Submit') }} <i class="fa fa-check"></i></button>
                   
                    <span wire:loading>
                        <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                        <span class="sr-only">{{ __('Loading...') }}</span>
                    </span>     
                </div>
            </div>
            
        </form>
    </div>
</div>