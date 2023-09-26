@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
    Dashboard_adminstration
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Advertisements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
                    /Dashboard_adminstration</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">

            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>

                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    <div class="row">

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        <div class="my-auto">
            <div class="d-flex">
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>

    <div class="card-body">
        <div class="table-responsive">

            <table id="example" class="table key-buttons text-md-nowrap">
                <thead>
                    <tr style="text-align: center" class="table-success">
                        <th><input type="checkbox" id="cheCheckAll"></th>
                        <th class="border-bottom-0">Business Activity</th>
                        <th class="border-bottom-0">Company Name</th>
                        <th class="border-bottom-0">Person Name</th>
                        <th class="border-bottom-0">Process</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('allselect') }}" id="confirmForm">
                        @foreach ($Dashbord as $d)
                            <tr style="text-align: center" id="tr_{{ $d->id }}">
                                <td><input type="checkbox" class="checkboxclass" name="selected_ids[]"
                                        value="{{ $d->id }}"></td>
                                <td>{{ $d->Business_Activity }}</td>
                                <td>{{ $d->Company_name }}</td>
                                <td>{{ $d->Person_Name }}</td>
                                <td><a href="Company-edit/{{ $d->id }}" class="btn btn-danger">Edit</td>
                            </tr>
                        @endforeach

                        <button type="submit" class="btn btn-success" id="Allselected">CONFIRM</button>
                        {{-- <a href="{{ route('allselect')}}" class="btn btn-success" id="Allselected"> CONFIRM3 </a> --}}
                        <p></p>
                    </form>
                </tbody>
            </table>

        </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed  -->
@endsection
@section('js')
<!-- Internal Data tables -->
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script> --}}
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@endsection
