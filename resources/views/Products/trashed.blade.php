@extends('layouts.master')
@section('css')
@endsection
@section('title')
Trashed
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div>
                        <a class="btn btn-success restore" href="{{ route('products.restore')}}"  > Restore All </a>
                    </div>
                    <p>
                    <div>
                        <a class="btn btn-info" href="{{ url('/' . ($page = 'inventory')) }}"  >Back</a>
                    </div>
                </p>
                    <div class="breadcrumb-header justify-content-between">
                        <div class="my-auto">
                            <div class="d-flex">
                            </div>
                        </div>
                        <div class="d-flex my-xl-auto right-content">
                        </div>
                    </div>


                    <table id="example" class="table key-buttons text-md-nowrap">
                        <thead>
                            <tr class="table-success" style="text-align: center">
                                <td><input type="checkbox" name="product" id="product"></td>
                                <th class="border-bottom-0">ID</th>
                                <th class="border-bottom-0">Inventory name</th>
                                <th class="border-bottom-0">PRODUCT</th>
                                <th class="border-bottom-0">process</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($products))
                                <?php $i = 0; ?>
                                @foreach ($products as $products)
                                    <?php $i++; ?>
                                    <tr style="text-align: center" id="tr_{{ $products->id }}">
                                        <td><input type="checkbox" class="sub_chk" data-id="{{ $products->id }}"></td>
                                        <td>{{ $products->Product_name  }}</td>
                                        <td>{{ $products->Product_name  }}</td>
                                        <td>{{ $products->Product_name  }}</td>
                                        <td><a href="{{ route('products.restore-one', $products->id) }}" class="btn btn-success">Restore</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

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
