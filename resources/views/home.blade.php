@extends('layouts.master')

@section('title')
    Control panel
@stop

@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

    <style>
        .pen body {
            padding-top:50px;
        }

        .modal.fade:not(.in).right .modal-dialog {
            -webkit-transform: translate3d(50%, 50%, 50%);
            transform: translate3d(25%, 0, 0);
        }

        .modal.right .modal-dialog {
            position:fixed;
            top:50%;
            right:5%;
            margin:0;
        }

        </style>
@endsection
@section('page-header')




    <!-- breadcrumb -->

    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi {{ Auth::user(0)->name }},</h2>
                <p class="mg-b-0">Sales monitoring dashboard template.</p>
            </div>

            <div class="d-flex my-xl-auto right-content">

                <div class="mb-3 mb-xl-0">
                    <div class="btn-group dropdown">
                        <select name="currancy_id" id="currancy_id" class="form-control input-lg dynamic"
                            data-dependent="state">
                            <option value="">Select currency</option>
                            @foreach ($curr as $cu)
                                <option value="{{ $cu->id }}">{{ $cu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>




        </div>


        <!----The btn of model of add copmanies with ajax---->

        <div class="col-sm-6 col-md-4 col-xl-3">
            <a class="btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">
                instructions</a>



        </div>

        <div class="d-flex my-xl-auto right-content">

            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <select name="inventory_id" id="inventory_id" class="form-control input-lg dynamic"
                        data-dependent="state">
                        <option value="">Select Inventory/Sub Inv.</option>

                        <div class="list-group-item border-top-0">
                            {{-- @foreach ($inv as $in)
                                        <option value="{{ $in->id}}">{{ $in->inv_name }}</option>
                                    @endforeach --}}
                            {{-- <i class="fa fa-{{ $inv->inv_name }}"></i>
                            <p>{{ $inv->inv_name }}</p> --}}
                        </div>

                    </select>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">Customer Ratings</label>
							<div class="main-star">
								<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
							</div>
						</div>
						<div>
							<label class="tx-13">Online Sales</label>
							<h5>563,275</h5>
						</div>
						<div>
							<label class="tx-13">Offline Sales</label>
							<h5>783,675</h5>
						</div>
					</div> --}}
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')


    <!-- row -->



    <button type="submit" data-toggle="modal" data-target="#sidebar-right"
    class="btn btn-primary navbar-btn pull-left" hidden>Right Sidebar </button>

<!-- Sidebar Right -->
<div class="modal fade right" id="sidebar-right" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" style="color: red" data-dismiss="modal"><span
                        aria-hidden="true">Close</span> </button>
            </div>
            <div class="modal-body">
                    @foreach ($adv as $ad )
                    <p>{{$ad->link}}</p>
                    @endforeach
                <hr>
                <div class="form-group hide">
                    <div class="input-group">

                        <P>{{$ad->Business_Activity}}</P>

                    </div>
                    <hr>
                    <P>{{$ad->description}}</P>
                </div>

                <div class="form-group has-feedback">
                </div>
                <hr>
                <P>{{$ad->image}}</P>

                <div class="btn-group-vertical center-block">
                    <div class="btn btn-instagram btn-lg"
                        target="_blank"><i class="fa fa-fw fa-instagram"></i></div>
                    <div class="btn btn-twitter btn-lg"
                        target="_blank"><i class="fa fa-fw fa-twitter"></i></div>
                    <div class="btn btn-github btn-lg" target="_blank"><i
                            class="fa fa-fw fa-github"></i></div>
                </div>

            </div>
        </div>
    </div>
</div>

    <!-------------------To detect first time---------------------->

    {{-- @if ($first_time_login == 1)
        <div>
            <h5>
                <font color="2555"> Please click on Instructions Button</font>
            </h5>
        </div>
    @endif --}}


    {{-- @if ($first_time_login == true)
        <div>
            <h5>
                <font color="2855">Please click on Instructions Button</font>
            </h5>
        </div>
    @endif --}}


    <div class="row row-sm" id="topprodect">
        {{-- <div class="col-xl-2 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-primary-gradient">
								<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">{{$value->Product_name}}({{$value->Vendor}})</h6>

									</div>
									{{-- <div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 font-weight-bold mb-1 text-white">

																							{{number_format($value->TotalPrice,2)}}

                                                                                            {{$value->curr->name}}</h4>

																						 <h3 class="mb-0 tx-12 text-white">No.Products : {{$countProduct}}</h3>
																							<p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
											</div>
											<span class="float-right my-auto mr-auto">
												<i class="fas fa-arrow-circle-up text-white"></i>
												<span class="text-white op-7"> %100</span>
											</span>
										</div>
									</div>
								</div>
								<!-- <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span> -->
							</div>
						</div> --}}

        <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                                                  <div class="card overflow-hidden sales-card bg-danger-gradient">
                                                   <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                                    <div class="">
                                                     <h6 class="mb-3 tx-12 text-white">Products</h6>
                                                    </div>
                                                    <div class="pb-0 mt-0">
                                                     <div class="d-flex">
                                                      <div class="">
                                                       <h4 class="tx-20 font-weight-bold mb-1 text-white">$1,230.17</h4>
                                                       <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                                                      </div>
                                                      <span class="float-right my-auto mr-auto">
                                                       <i class="fas fa-arrow-circle-down text-white"></i>
                                                       <span class="text-white op-7"> -23.09%</span>
                                                      </span>
                                                     </div>
                                                    </div>
                                                   </div>
                                                   <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
                                                  </div>
                                                 </div>
                                                 <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                                                  <div class="card overflow-hidden sales-card bg-success-gradient">
                                                   <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                                    <div class="">
                                                     <h6 class="mb-3 tx-12 text-white">TOTAL EARNINGS</h6>
                                                    </div>
                                                    <div class="pb-0 mt-0">
                                                     <div class="d-flex">
                                                      <div class="">
                                                       <h4 class="tx-20 font-weight-bold mb-1 text-white">$7,125.70</h4>
                                                       <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                                                      </div>
                                                      <span class="float-right my-auto mr-auto">
                                                       <i class="fas fa-arrow-circle-up text-white"></i>
                                                       <span class="text-white op-7"> 52.09%</span>
                                                      </span>
                                                     </div>
                                                    </div>
                                                   </div>
                                                   <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
                                                  </div>
                                                 </div>
                                                 <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                                                  <div class="card overflow-hidden sales-card bg-warning-gradient">
                                                   <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                                    <div class="">
                                                     <h6 class="mb-3 tx-12 text-white">PRODUCT SOLD</h6>
                                                    </div>
                                                    <div class="pb-0 mt-0">
                                                     <div class="d-flex">
                                                      <div class="">
                                                       <h4 class="tx-20 font-weight-bold mb-1 text-white">$4,820.50</h4>
                                                       <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                                                      </div>
                                                      <span class="float-right my-auto mr-auto">
                                                       <i class="fas fa-arrow-circle-down text-white"></i>
                                                       <span class="text-white op-7"> -152.3</span>
                                                      </span>
                                                     </div>
                                                    </div>
                                                   </div>
                                                   <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
                                                  </div>
                                                 </div> -->
    </div>
    <!-- row closed -->

    <!-- row opened -->
    {{-- <div class="row row-sm">
					<div class="col-md-12 col-lg-12 col-xl-7">
						<div class="card">
							<div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-0">Order status</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 text-muted mb-0">Order Status and Tracking. Track your order from ship date to arrival. To begin, enter your order number.</p>
							</div>
							<div class="card-body">
								<div class="total-revenue">
									<div>
									  <h4>120,750</h4>
									  <label><span class="bg-primary"></span>success</label>
									</div>
									<div>
									  <h4>56,108</h4>
									  <label><span class="bg-danger"></span>Pending</label>
									</div>
									<div>
									  <h4>32,895</h4>
									  <label><span class="bg-warning"></span>Failed</label>
									</div>
								  </div>
								<div id="bar" class="sales-bar mt-4"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-xl-5">
						<div class="card card-dashboard-map-one">
							<label class="main-content-label">Sales Revenue by Customers in USA</label>
							<span class="d-block mg-b-20 text-muted tx-12">Sales Performance of all states in the United States</span>
							<div class="">
								<div class="vmap-wrapper ht-180" id="vmap2"></div>
							</div>
						</div>
					</div>
				</div> --}}
    <!-- row closed -->

    <!-- row opened -->
    {{-- <div class="row row-sm">
					<div class="col-xl-4 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header pb-1">
								<h3 class="card-title mb-2">Recent Customers</h3>
								<p class="tx-12 mb-0 text-muted">A customer is an individual or business that purchases the goods service has evolved to include real-time</p>
							</div>
							<div class="card-body p-0 customers mt-1">
								<div class="list-group list-lg-group list-group-flush">
									<div class="list-group-item list-group-item-action" href="#">
										<div class="media mt-0">
											<img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/3.jpg')}}" alt="Image description">
											<div class="media-body">
												<div class="d-flex align-items-center">
													<div class="mt-0">
														<h5 class="mb-1 tx-15">Samantha Melon</h5>
														<p class="mb-0 tx-13 text-muted">User ID: #1234 <span class="text-success ml-2">Paid</span></p>
													</div>
													<span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark1" class="wd-100p"></div>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="list-group-item list-group-item-action" href="#">
										<div class="media mt-0">
											<img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/11.jpg')}}" alt="Image description">
											<div class="media-body">
												<div class="d-flex align-items-center">
													<div class="mt-1">
														<h5 class="mb-1 tx-15">Jimmy Changa</h5>
														<p class="mb-0 tx-13 text-muted">User ID: #1234 <span class="text-danger ml-2">Pending</span></p>
													</div>
													<span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark2" class="wd-100p"></div>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="list-group-item list-group-item-action" href="#">
										<div class="media mt-0">
											<img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/17.jpg')}}" alt="Image description">
											<div class="media-body">
												<div class="d-flex align-items-center">
													<div class="mt-1">
														<h5 class="mb-1 tx-15">Gabe Lackmen</h5>
														<p class="mb-0 tx-13 text-muted">User ID: #1234<span class="text-danger ml-2">Pending</span></p>
													</div>
													<span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark3" class="wd-100p"></div>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="list-group-item list-group-item-action" href="#">
										<div class="media mt-0">
											<img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/15.jpg')}}" alt="Image description">
											<div class="media-body">
												<div class="d-flex align-items-center">
													<div class="mt-1">
														<h5 class="mb-1 tx-15">Manuel Labor</h5>
														<p class="mb-0 tx-13 text-muted">User ID: #1234<span class="text-success ml-2">Paid</span></p>
													</div>
													<span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark4" class="wd-100p"></div>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="list-group-item list-group-item-action br-br-7 br-bl-7" href="#">
										<div class="media mt-0">
											<img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/6.jpg')}}" alt="Image description">
											<div class="media-body">
												<div class="d-flex align-items-center">
													<div class="mt-1">
														<h5 class="mb-1 tx-15">Sharon Needles</h5>
														<p class="b-0 tx-13 text-muted mb-0">User ID: #1234<span class="text-success ml-2">Paid</span></p>
													</div>
													<span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark5" class="wd-100p"></div>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-md-12 col-lg-6">
						<div class="card">
							<div class="card-header pb-1">
								<h3 class="card-title mb-2">Sales Activity</h3>
								<p class="tx-12 mb-0 text-muted">Sales activities are the tactics that salespeople use to achieve their goals and objective</p>
							</div>
							<div class="product-timeline card-body pt-2 mt-1">
								<ul class="timeline-1 mb-0">
									<li class="mt-0"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Products</span> <a href="#" class="float-left tx-11 text-muted">3 days ago</a>
										<p class="mb-0 text-muted tx-12">1.3k New Products</p>
									</li>
									<li class="mt-0"> <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Sales</span> <a href="#" class="float-left tx-11 text-muted">35 mins ago</a>
										<p class="mb-0 text-muted tx-12">1k New Sales</p>
									</li>
									<li class="mt-0"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Revenue</span> <a href="#" class="float-left tx-11 text-muted">50 mins ago</a>
										<p class="mb-0 text-muted tx-12">23.5K New Revenue</p>
									</li>
									<li class="mt-0"> <i class="ti-wallet bg-warning-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Profit</span> <a href="#" class="float-left tx-11 text-muted">1 hour ago</a>
										<p class="mb-0 text-muted tx-12">3k New profit</p>
									</li>
									<li class="mt-0"> <i class="si si-eye bg-purple-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Visits</span> <a href="#" class="float-left tx-11 text-muted">1 day ago</a>
										<p class="mb-0 text-muted tx-12">15% increased</p>
									</li>
									<li class="mt-0 mb-0"> <i class="icon-note icons bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Reviews</span> <a href="#" class="float-left tx-11 text-muted">1 day ago</a>
										<p class="mb-0 text-muted tx-12">1.5k reviews</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-md-12 col-lg-6">
						<div class="card">
							<div class="card-header pb-0">
								<h3 class="card-title mb-2">Recent Orders</h3>
								<p class="tx-12 mb-0 text-muted">An order is an investor's instructions to a broker or brokerage firm to purchase or sell</p>
							</div>
							<div class="card-body sales-info ot-0 pt-0 pb-0">
								<div id="chart" class="ht-150"></div>
								<div class="row sales-infomation pb-0 mb-0 mx-auto wd-100p">
									<div class="col-md-6 col">
										<p class="mb-0 d-flex"><span class="legend bg-primary brround"></span>Delivered</p>
										<h3 class="mb-1">5238</h3>
										<div class="d-flex">
											<p class="text-muted ">Last 6 months</p>
										</div>
									</div>
									<div class="col-md-6 col">
										<p class="mb-0 d-flex"><span class="legend bg-info brround"></span>Cancelled</p>
											<h3 class="mb-1">3467</h3>
										<div class="d-flex">
											<p class="text-muted">Last 6 months</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card ">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="d-flex align-items-center pb-2">
											<p class="mb-0">Total Sales</p>
										</div>
										<h4 class="font-weight-bold mb-2">$7,590</h4>
										<div class="progress progress-style progress-sm">
											<div class="progress-bar bg-primary-gradient wd-80p" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
										</div>
									</div>
									<div class="col-md-6 mt-4 mt-md-0">
										<div class="d-flex align-items-center pb-2">
											<p class="mb-0">Active Users</p>
										</div>
										<h4 class="font-weight-bold mb-2">$5,460</h4>
										<div class="progress progress-style progress-sm">
											<div class="progress-bar bg-danger-gradient wd-75" role="progressbar"  aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> --}}
    <!-- row close -->

    <!-- row opened -->
    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">Your stock value with currency</h6>
                <div class="list-group">
                    @foreach ($products as $cr)
                        <div class="list-group-item border-top-0">
                            <i class="fa fa-{{ $cr->name }}"></i>
                            <p>{{ $cr->name }}</p><span>
                                {{ number_format($cr->total, 2, '.', ',') }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-------------------------The action of model ajax--------------->




        <div>


            {{-- <div class="modal-dialog modal-dialog-centered" role="document"> --}}
                <div class="modal fade right" id="modal" tabindex="-1" role="dialog">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
            <div class="modal-content modal-content-demo">
                {{-- <div class="modal-header">
>>>>>>> 9c3d27c6e9f7a06a52cf10945293a782a72b4589
                        <h6 class="modal-title">Change Password</h6><button aria-label="Close" class="Close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <form action="" method="" autocomplete="off" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row row-sm">


                                <div class="card bg-gray-200 bd-0">
                                    <div class="card-body">
                                        <h2 class="card-title tx-dark ">change your Password</h2>
                                        <h6 class="card-subtitle mg-b-15"></h6>
                                        <p class="card-text">To edit your profile and change your info <br>
                                            <br>
                                            please, Got to the management from the side menu
                                        </p><br>
                                        <h6>management -> Edit user</h6>

                                        <a class="card-link" href="{{ url('/' . ($page = 'users.edit1')) }}">Edit
                                            user</a>
                                    </div>
                                    <hr>
                                    <div>
                                        <h4 class="modal-title">To create a product</h4>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title tx-dark ">First step</h5>
                                        <p class="card-subtitle mg-b-15 tx-dark-15">Create your Categories</p>
                                        <p class="card-text">To publish/display your products in the system you must first
                                            do some steps <br> first create your categories & subcategory</p>
                                        <h6>Products -> Categories </h6>
                                        <a class="card-link " href="{{ url('/' . ($page = 'Categories')) }}">Category</a>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title tx-dark ">Second step</h5>
                                        <p class="card-subtitle mg-b-15 tx-dark-15">Create your Subcategories</p>
                                        <p class="card-text">To publish/display your products in the system you must first
                                            do some steps <br> first create your categories & subcategory</p>
                                        <h6>Products -> Subcategories </h6>
                                        <a class="card-link "
                                            href="{{ url('/' . ($page = 'Subcategories')) }}">Subcategory</a>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title tx-dark ">Third step</h5>
                                        <p class="card-subtitle mg-b-15 tx-dark-15">Create your products</p>
                                        <p class="card-text">After creating your categories & subcategory now you can
                                            publish your products in the system</p>
                                        <h6>inventory -> Create Products -> add products </h6>OR<h6> side menu-> add
                                            products</h6>
                                        <a class="card-link " href="{{ url('/' . ($page = 'add-product')) }}">Add
                                            products</a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Confirm</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><a
                                            href="Customer">Close</a></button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /row -->
                </div>
                </div>
=======
                    </div> --}}
                <!-- /row -->
            </div>
            {{-- </div> --}}

            <!-- Container closed -->


        </div>
        @endsection
        @section('js')

        <script>

                $(document).ready(function() {
                    $("#sidebar-right").modal("show");
                });

        </script>



        <script>
            document.getElementById('modaldemo9').style.display = 'block';
        </script>
        {{-- @endif --}}


{{--
            @if ($first_time_login)
                <script>
                    window.addEventListener('DOMContentLoaded', function() {
                        $('#modaldemo8').modal('show');
                    });
                </script>
            @endif --}}
=======


        </div>
    </div>

    </div>

@endsection
@section('js')

    {{-- @if ($isOwner) --}}
    <script>
        document.getElementById('modaldemo9').style.display = 'block';
    </script>
    {{-- @endif --}}



    {{-- @if ($first_time_login) --}}
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $('#modaldemo8').modal('show');
        });
    </script>
    {{-- @endif --}}
>>>>>>> 9c3d27c6e9f7a06a52cf10945293a782a72b4589

    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>


    <script>
        $("document").ready(function() {
            $('select[name="currancy_id"]').on('change', function() {
                var catId = $(this).val();
                if (catId) {
                    $.ajax({
                        url: '/home/fetch/' + catId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log("hello");
                            $('#topprodect').empty();

                            $.each(data, function(key, value) {
                                $('#topprodect').append(
                                    '<div class="col-xl-2 col-lg-6 col-md-6 col-xm-12"><div class="card overflow-hidden sales-card bg-primary-gradient"><div class="pl-3 pt-3 pr-3 pb-2 pt-0"><div class=""><h6 class="mb-3 tx-12 text-white">' +
                                    value["Product_name"] + '(' + value["Vendor"] +
                                    ')</h6></div><div class="pb-0 mt-0"><div class="d-flex"><div class=""><h4 class="tx-20 font-weight-bold mb-1 text-white">' +
                                    parseInt(value["TotalPrice"]).toLocaleString(
                                        'en-US') + ' ' + value["curr"][
                                        "name"
                                    ] +
                                    '</h4></div></div></div></div></div></div>');
                            });
                            console.log("hello2");

                        }

                    })
                } else {
                    $('dev[name="topprodect"]').empty();
                }
            });


        });
    </script>
    {{-- done --}}
@endsection
