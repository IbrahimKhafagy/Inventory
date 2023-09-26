@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Transaction</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Abroved</span>
						</div>
					</div>


				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table key-buttons text-md-nowrap">
                                <thead>
                                    <tr class="table-success" style="text-align: center">
                                        <th class="border-bottom-0">ID</th>
                                        <th class="border-bottom-0">From Inventory</th>
                                        {{-- <th class="border-bottom-0">Address</th> --}}
                                        <th class="border-bottom-0">To Inventory</th>
                                        <th class="border-bottom-0">PRODUCT</th>
                                        <th class="border-bottom-0">Stock QTY, Unit </th>
                                        <th class="border-bottom-0">The deliver QTY</th>
                                        <th class="border-bottom-0">Person</th>
                                        <th class="border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr style="text-align: center" id="">
                                            <td>{{$product->id}}</td>
                                            <td>{{ $transaction->From_inv }}</td>
                                            <td>{{ $transaction->To_inv }}</td>
                                            <td>{{ $product->Product_name }}</td>
                                            <td>{{ $product->QTY}}</td>
                                            <td>{{ $transaction->delivery_QTY}}</td>
                                            <td>{{ $product->Created_by}}</td>
                                            <td>{{ $transaction->created_at}}</td>
                                        </tr>
                                </tbody>
                            </table>
                            </form>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

                                <label class="btn btn-outline-primary"><a href="">Cancel</a></label>

                                <label class="btn btn-outline-primary"><a href="">Add Anather
                                        transfer</a></label>



                                <label class="btn btn-outline-primary"><a href="AllProducts"><a
                                            href='/inventory'>Back</a></label>
                            </div>
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" />

                            <!-- End Example Code -->
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
        // استهدف الحقل الذي يحتوي على الكمية المسلمة
        const deliveryQtyInput = document.querySelector('input[name="delivery_QTY"]');

        // استخدم الحدث oninput لبدء تشغيل الكود عند إدخال قيمة في حقل التسليم
        deliveryQtyInput.addEventListener('input', function() {
            // جلب قيمة حقل الكمية
            const qty = {{ $product->QTY }};
            // جلب قيمة حقل التسليم
            const deliveryQty = parseInt(this.value);

            // إذا كانت قيمة حقل التسليم صالحة (أي أنها رقم صحيح)
            if (!isNaN(deliveryQty)) {
                // حساب الكمية المتبقية
                const remainingQty = qty - deliveryQty;
                // استهدف خلية الجدول التي تعرض الكمية المتبقية
                const remainingQtyCell = document.querySelector('.remaining_qty_cell');

                // تحديث نص خلية الجدول الخاصة بالكمية المتبقية
                remainingQtyCell.textContent = remainingQty.toLocaleString();
            }
        });
    </script>
@endsection
