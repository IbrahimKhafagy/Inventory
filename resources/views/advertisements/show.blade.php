@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">show</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Advertisements
                </span>
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

        <table id="example" class="table key-buttons text-md-nowrap">
            <thead>
                <tr class="table-success" style="text-align: center">
                    <th class="border-bottom-0">ID</th>
                    <th class="border-bottom-0">Business_Activity</th>
                    <th class="border-bottom-0">description</th>
                    <th class="border-bottom-0">image</th>
                    <th class="border-bottom-0">link</th>
                    <th class="border-bottom-0">process</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($advertisements as $adv)
                    <tr style="text-align: center" id="">

                        <td>{{ $adv->id }}</td>
                        <td>{{ $adv->Business_Activity }}</td>
                        <td>{{ $adv->description }}</td>

                        {{-- <td><img src="{{ asset('public/image/' . $adv->image) }}" style="height: 100px; width: 150px;"></td> --}}
                        {{-- <td><img src="{{ url('storage/' . $adv->image) }}" style="height: 100px; width: 150px;"></td> --}}
                        <td><img src="cover/{{ $adv->image }}" class="img-responsive"
                            style="max-height:100px; max-width:100px" alt="" srcset=""></td>

                        </td>
                        <td>{{ $adv->link }}</td>
                        <td><a href="delete/{{ $adv->id }}" class="btn btn-outline-danger">Delete</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
