@section('title', 'Work Order')
@section('parentPageTitle', 'Home')
<div class="clearfix row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header row">
              
                <div class="col-md-2">
                    <input type="text" class="form-control" wire:model="keyword" placeholder="Pencarian" />
                </div>
                
                <div class="col-md-6">
                    <!-- <a href="javascript:;" class="ml-2 btn btn-info" wire:click="downloadExcel"><i class="fa fa-download"></i> Download</a> -->
                    <a href="{{route('stock-photo.insert')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Image</a>
                    <span wire:loading>
                        <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                        <span class="sr-only">{{ __('Loading...') }}</span>
                    </span>
                </div>
            </div>
            <div class="body pt-0">
                <div class="table-responsive" style="min-height:400px;">
                    <table class="table table-hover m-b-0 c_list">
                        <thead>
                            <tr style="background: #eee;">
                                <th>No</th>
                                <th>WO Number</th>
                                <th>WO Date</th>
                                <th>Requester Name</th>
                                <th>Business Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Cooperative Name</th>
                                <th>Department</th>

                                <th>Implementation Request</th>
                                <th>Modify Request</th>
                                <th>Access Issue</th>
                                <th>Trouble Ticket</th>
                                <th>Other</th>
                                
                                <th>Core System</th>
                                <th>Finance and Acc</th>
                                <th>Inventory</th>
                                <th>Point of Sales</th>
                                <th>Human Resources</th>
                                <th>Payroll</th>
                                <th>Mobile Attendance</th>
                                <th>Mobile Stock Opname</th>
                                <th>Other</th>

                                <th>Work Requested</th>

                                <th>Created Date</th>
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($number= $data->total() - (($data->currentPage() -1) * $data->perPage()) )
                            @foreach($data as $k => $item)
                            <tr>
                                <td style="width: 50px;">{{$k+1}}</td>
                                <td style="width: 50px;">{{$item->wo_number}}</td>
                                <td style="width: 50px;">{{$item->wo_date}}</td>
                                <td style="width: 50px;">{{$item->requester_name}}</td>
                                <td style="width: 50px;">{{$item->business_name}}</td>
                                <td style="width: 50px;">{{$item->email}}</td>
                                <td style="width: 50px;">{{$item->foto_source}}</td>
                                <td style="width: 50px;">{{$item->created_at}}</td>
                             
                                
                            </tr>
                            @php($number--)
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br />
                {{$data->links()}}
            </div>
        </div>
    </div>

</div>



<!-- Modal -->
<div class="modal fade" id="confirm_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-warning"></i> Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <p>Are you want delete this data ?</p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">No</button>
                <button type="button" wire:click="delete()" class="btn btn-danger close-modal">Yes</button>
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