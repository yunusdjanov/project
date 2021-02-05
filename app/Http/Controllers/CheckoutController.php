<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $item = Cart::content()->all();
//        $total = Cart::total();
//        dd($total);
//        $order = newOrder();
//        $order->username = Auth::user()->name;
//        $order->number = Auth::user()->name;
//        $order->address = Auth::user()->name;
//        $order->email = Auth::user()->name;
//        $order->total = $total;
//        $order->username = Auth::user()->id;
//        $order->save();
//
//        foreach (Cart::content() as $item) {
//            $orderproduct = new OrderProduct();
//            $orderproduct->order_id = $order_id;
//            $orderproduct->product_id = $item->model->id;
//            $orderproduct->quantity = $item->qty;
//            $orderproduct->save();
//        }
//
//
//        foreach ($item as $prod) {
//            $rowId = $prod->rowId;
//            $id = $prod->id;
//            $product = Product::find($id);
//            $soldqty = $prod->qty;
//            $qty = $product->quantity;
//            $actualqty = $qty - $soldqty;
//            $product->quantity = $actualqty;
//            $product->save();
//        }
//        Cart::destroy($rowId);
//        return redirect('/')->with('success', 'ваш заказ передан в обработку');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
