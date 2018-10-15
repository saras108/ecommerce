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
        <li class="breadcrumb-item active">Deleted Stores</li>
    </ol>

    <div class="Articlelistpagesg">
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
                                        @foreach($owner as $o)
                                            <tr>
                                        
                                                <td>{{$o->Name}}</td>
                                                <td>{{$o->contact}}</td>
                                                <td>{{$o->email}}</td>
                                                <td>{{$o->citizionship}}</td>
                                                <td>
                                                     @if($o->profession == 'Activate')
                                                        <a href="#" style="color: white;" type="button" class="badge badge-success">Active</a>
                                                    @else
                                                    <a href="#" style="color: white;" type="button" class="badge badge-warning">Blocked</a>
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
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
              <p>Copyright © 2018. All rights reserved.</p>
            </div>
        </div>
    </div>
@endsection


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
        });
    </script>
@endsection



