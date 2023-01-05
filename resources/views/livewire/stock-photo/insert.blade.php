@section('title', "Tambah Anggota")
@section('parentPageTitle', 'Anggota')
<div class="mt-2 card">
    <div class="card-body">
        <div class="row" >
            <div class="form-group col-md-8">
                <h5 class="text-info">DATA IMAGE</h5>
            </div>
            <div class="col-md-4 text-right">
                <span wire:loading>
                    <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                    <span class="sr-only">{{ __('Loading...') }}</span>
                </span>
            </div>
            <div class="col-md-12"><hr class="mt-0" style="border:1px solid #18a2b8" /></div>
        </div>

        <form class="form-auth-small" method="POST" wire:submit.prevent="save" action="" >
            
            <div class="row" >
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Image</label>
                            <input type="file" class="form-control" id="stock_photo" wire:model="stock_photo">
                            @error('stock_photo') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputName">Caption</label>
                            <input type="text" class="form-control" id="foto_caption" placeholder="Enter Image Caption" wire:model="foto_caption">
                            @error('foto_caption') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputName">Source</label>
                            <input type="text" class="form-control" id="foto_source" placeholder="Enter Image Source" wire:model="foto_source">
                            @error('foto_source') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputAlamat">Category</label>
                            <select class="form-control" name="category" wire:model="category">
                                <option value=""> --- Category --- </option>
                                @foreach(\App\Models\Category::orderBy('id', 'desc')->get() as $item)
                                <option>{{$item->name_category}}</option> 
                                @endforeach
                            </select>
                            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputAlamat">Sub Category</label>
                            <select class="form-control" name="subcategory" wire:model="subcategory">
                                <option value=""> --- Sub Category --- </option>
                                @foreach(\App\Models\Subcategory::orderBy('id', 'desc')->get() as $item)
                                <option>{{$item->name_subcategory}}</option> 
                                @endforeach
                            </select>
                            @error('subcategory') <span class="text-danger">{{ $message }}</span> @enderror
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
                   
                        <button type="submit" class="ml-3 btn btn-primary">{{ __('Submit') }} <i class="fa fa-check"></i></button>
                   
                    <span wire:loading>
                        <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                        <span class="sr-only">{{ __('Loading...') }}</span>
                    </span>     
                </div>
            </div>
            
        </form>
    </div>
</div>