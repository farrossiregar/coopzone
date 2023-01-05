@section('title', 'Stock Photo')
@section('parentPageTitle', 'Home')
<div class="clearfix row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header row">
                
                <!-- <div class="col-md-2">
                    <input type="text" class="form-control" wire:model="keyword" placeholder="Pencarian" />
                </div> -->
                
                <div class="col-md-6">
                    <span wire:loading>
                        <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                        <span class="sr-only">{{ __('Loading...') }}</span>
                    </span>
                </div>
            </div>
            <div class="body pt-0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-responsive" style="min-height:400px;">
                            <div class="row">
                                <div class="col-md-9"><h4>Category</h4></div>
                                <div class="col-md-3">
                                    <a href="{{route('category.insert')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Category</a>
                                </div>
                            </div>
                            <br>
                            
                            <table class="table table-hover m-b-0 c_list">
                                <thead>
                                    <tr style="background: #eee;">
                                        <th>No</th>
                                        <th>Category</th>
                                        <th>Uploaded Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\Models\Category::orderBy('id', 'desc')->get() as $k => $item)
                                    <tr>
                                        <td style="width: 50px;">{{$k+1}}</td>
                                        <td style="width: 50px;">{{$item->name_category}}</td>
                                        <td style="width: 50px;">{{$item->created_at}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="table-responsive" style="min-height:400px;">
                            <div class="row">
                                <div class="col-md-9"><h4>Subcategory</h4></div>
                                <div class="col-md-3">
                                    <a href="{{route('subcategory.insert')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Subcategory</a>
                                </div>
                            </div>
                            <br>
                            
                            <table class="table table-hover m-b-0 c_list">
                                <thead>
                                    <tr style="background: #eee;">
                                        <th>No</th>
                                        <th>Name Subcategory</th>
                                        <th>Category Parent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\Models\Subcategory::orderBy('id', 'desc')->get() as $k => $item)
                                    <tr>
                                        <td style="width: 50px;">{{$k+1}}</td>
                                        <td style="width: 50px;">{{$item->name_subcategory}}</td>
                                        <td style="width: 50px;">{{\App\Models\Category::where('id', $item->id_category)->first()->name_category }}</td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <br />
                {{$data->links()}}
            </div>
        </div>
    </div>

</div>

@push('after-scripts')
<script>
    Livewire.on('modal-konfirmasi-meninggal',(data)=>{
        $("#modal_konfirmasi_meninggal").modal("show");
    });
    Livewire.on('modal-detail-meninggal',(data)=>{
        $("#modal_detail_meninggal").modal("show");
    });
</script>
@endpush
@section('page-script')
function autologin(action,name){
    $("#modal_autologin form").attr("action",action);
    $("#modal_autologin .modal-body").html('<p>Autologin as '+name+' ?</p>');
    $("#modal_autologin").modal("show");
}
@endsection