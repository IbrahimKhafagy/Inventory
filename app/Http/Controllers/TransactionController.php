<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use App\Models\products;
use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function To_inv_select(Request $request, $id)
    {
dd( $request, $id);
    }

    public function confirm(Request $request, $id)
    {
        $product = products::find($id);
        $transaction = new transaction([
            'delivery_QTY' => $request['delivery_QTY'],
            'From_inv' => $request['From_inv'],
            'To_inv' => $request->get('To_inv'),
            'users_id' => auth()->user()->id,
            'transactiontypes_id' => 1,
            'products_id' => $product->id,
            'inventory_id' => $request['id'],
            'Created_by' => $request['Created_by']
        ]);
        $transaction->save();
        $newQty = $product->QTY - $request['delivery_QTY'];
        $product->QTY = $newQty;
        $product->save();
        $product = products::find($id);

        $inventory = inventory::find($request->get('To_inv'));
        if ($inventory) {
            $new_qty = $inventory->QTY + $request['delivery_QTY'];
            $inventory->QTY = $new_qty;
            $inventory->save();
        } else {
            $to_inv_product = products::where('inventory_id', $request->get('To_inv'))
                ->where('id', $product->id)->first();

        // dd($request);
        //     if (!$to_inv_product) {

        //         $to_inv_product = new products([
        //             'product_name' => $product->product_name,
        //             'description' => $product->description,
        //             'price' => $product->price,
        //             'QTY' => $request['delivery_QTY'],
        //             'inventory_id' => $request->get('To_inv'),
        //         ]);
        //         $to_inv_product->save();
        //     } else {

        //         $to_inv_product->QTY += $request['delivery_QTY'];
        //         $to_inv_product->save();
        //     }
        }
        return view('Transferproduct/confirmation', compact('transaction', 'product'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaction $transaction)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaction $transaction)
    {
        //
    }
}
