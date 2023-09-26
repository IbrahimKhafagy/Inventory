@extends('layouts.master')
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Empty</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">


        <div class="container" id="home">
            <div class="page-header">
                <h1>Home</h1>
                <p class="lead">Modified Bootstrap Modals make great Sidebar Menus; or Side Drawer Menus, depending on
                    your preferred Framework.</p>
            </div>
            <img class="img-responsive" src="https://unsplash.it/1600/1000?image=818">
        </div>

        <div class="container">
            <div id="services" class="page-header">
                <h1>Services</h1>
            </div>

            <div class="row">
                <div class="col-sm-offset-1 col-sm-11">



                    <hr>



                    <hr>



                </div>
            </div>

            <div id="about" class="page-header">
                <h1>About</h1>
            </div>



        </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $("#sidebar-right").modal("show");
    });
</script>
{{-- <script>
$ (document).ready (function () {
	$ (".modal a").not (".dropdown-toggle").on ("click", function () {
		$ (".modal").modal ("hide");
	});
});
</script> --}}

@endsection
