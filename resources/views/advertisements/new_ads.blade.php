@extends('layouts.master')
@section('css')

@endsection
@section('title')
    Create new Advertisements
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Advertisements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Create new advertisments</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div id="list-item-1" style="content:" class="card fieldset border border-muted mt-0">



            <span class="fieldset-tile"></span>
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Create</h6>
                    </div>
                    <div class="card-body">
                        {{-- <form action="" class="row g-3 formvalidate" id="form" enctype="multipart/form-data"> --}}
                        <form action="{{ route('advertisements.create', ['id']) }}" class="row g-3 formvalidate"
                            id="form" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="col-md-4">
                                <label for="name:en" class="form-label">Business_Activity :</label>
                                <input type="text" data-validation="required" data-validation-required="required"
                                    id="type" name="Business_Activity" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Description :</label>
                                <input type="text" data-validation="required" data-validation-required="required"
                                    id="description" name="description" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Link :</label>
                                <input type="link" data-validation="required" data-validation-required="required"
                                    id="link" name="link" class="form-control">
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                            </div>
                            <p></p>
                            <div class="col-md-12">
                                <div>
                                    {{-- <div class="col-sm-12 col-md-12">
                                        <label class="m-2">Images</label>
                                        <input type="file" id="input-file-now-custom-3" class="form-control m-2"
                                            name="images[]" multiple>
                                    </div> --}}

                                    <div class="form-group">


                                        <label class="m-2">Cover Image</label>
                                        <input type="file" id="input-file-now-custom-3" class="form-control m-2"
                                            name="cover">

                                        <p class="text-danger" style="text-align: right">* attached format
                                            pdf, jpeg ,.jpg ,
                                            png,.xlx, .csv, .gif, .svg
                                        </p>
                                        {{-- <label class="m-2">Images</label>
                                        <input type="file" id="input-file-now-custom-3" class="form-control m-2"
                                            name="images[]" multiple> --}}

                                    </div>

                                </div>
                            </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" id="btn-submit" class="btn btn-primary">Create</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>


    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        $('.dropify').dropify();
    </script>
@endsection
