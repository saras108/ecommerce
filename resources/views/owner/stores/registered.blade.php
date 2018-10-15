@extends('owner.template')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <ul>
                <li> {{ session('success') }}</li>
            </ul>
        </div>
    @endif


    <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{route('owner.root')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('owner.list.stores')}}">Stores</a></li>
        <li class="breadcrumb-item active">Registed Stores</li>
    </ol>

    <div class="Articlelistpagesg">
        <form method="post" action="" name="ownerForm" id="ownerForm">
            {{csrf_field()}}
            <input type="hidden" name="action">
            <div class="Articlepagehms">
                <div class="row">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-7">
                        <div class="Articles_activity">
                            <ul class="list-inline">
                                <li class="list-inline-item publishmks">
                                    <a href="{{route('owner.activate.stores')}}" class="btn-batch-action" data-action="publish">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i> 
                                        @lang('general.batch_publish')
                                    </a>
                                </li>
                                <li class="list-inline-item unpublish">
                                    <a href="{{route('owner.deactivate.stores')}}" class="btn-batch-action" data-action="unpublish">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i> @lang('general.batch_unpublish')
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Page Lists -->
            <div class="Articlepagelimks">
                <div class="table-responsive">
                    <div id="bootstrap-data-table-content_wrapper"
                         class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" width="100%">
                                    <thead>
                                    <tr>
                                        <th width="10%">
                                            <input type="checkbox" id="chk_boxes" label="check all">
                                        </th>
                                        <th class="th-sm">Store Name
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Location
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Owner Name
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Contact NO.
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">E-mail
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Citizenship No.
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Profession
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $confirm_route = '#';  ?>
                                        @foreach($store as $s)
                                            <tr>
                                                <?php $confirm_route = route('owner.store.delete.confirm',$s->id); ?>
                                                <td >
                                                    <input type="checkbox" class="chk_box" label="check me" name="ids[]" value="{{$s->id}}">
                                                </th>
                                                <td>{{$s->store_name}}</td>
                                                <td>{{$s->location}}</td>
                                                <td>{{$s->owner_name}}</td>
                                                <td>{{$s->contact}}</td>
                                                <td>{{$s->email}}</td>
                                                <td>{{$s->citizionship}}</td>
                                                <td>
                                                     @if($s->profession == 'Activate')
                                                        <a href="{{route('owner.profession.stores',$s->id)}}" style="color: white;" type="button" class="badge badge-success">Active</a>
                                                    @else
                                                    <a href="{{route('owner.profession.stores',$s->id)}}" style="color: white;" type="button" class="badge badge-warning">Blocked</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach()
                                    </tbody>
                                   <!--  <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Store Name
                                        </th>
                                        <th>Location
                                        </th>
                                        <th>Owner Name
                                        </th>
                                        <th>Contact NO.
                                        </th>
                                        <th>E-mail
                                        </th>
                                        <th>Citizenship No.
                                        </th>
                                        <th>Profession
                                        </th>
                                    </tr>
                                    </tfoot> -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
              <p>Copyright © 2018. All rights reserved.</p>
            </div>
        </div>
    </div>
@endsection

    <div class="modal fade" id="delete_content" tabindex="-1" role="dialog" aria-labelledby="delete_custom" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="user_delete_confirm_title">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete this Store?
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="{{$confirm_route}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>


@section('header-scripts')
    <link href="{{ asset('backendcp/datatables/css/dataTables.bootstrap.css')}}" rel="stylesheet"/>
    <link href="{{ asset('backendcp/css/pages/tables.css')}}" rel="stylesheet"/>

@endsection
@section('footer-scripts')
    <script src="{{ asset('backendcp/datatables/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('backendcp/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');

            $("#chk_boxes").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        });

            $('.btn-batch-action').click(function(e){
                e.preventDefault();
                
                if($(this).attr('data-action') == "delete" && $('.chk_box:checked').length !== 0){
                        if(!confirm('Are you Sure you want to delete selected items?')){
                            return false;
                        }
                }
                if($('.chk_box:checked').length == 0){
                    alert('Any Item not selected!!');
                    return false;
                }else{
                    $('#ownerForm').prop('action',$(this).prop('href'));
                    $('#ownerForm').submit();
                }
            });
    </script>
@endsection



