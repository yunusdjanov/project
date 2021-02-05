<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('carts.index')->with('success', 'item is already added');
        }


        Cart::add($request->id, $request->title, 1, $request->price, ['branch' => $request->branch, 'thumbnail' => $request->thumbnail])
            ->associate('App\Models\Product');

        return 1;
    }


    /**
     * Add product to a wishlist
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function wishlist($id)
    {
//        $item = Cart::get($id);
//
//
//        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
//            return $rowId === $id;
//        });
//
//        if ($duplicates->isNotEmpty()) {
//            return redirect()->route('carts.index')->with('success', 'Item is already Saved For Later!');
//        }
//
//        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
//            ->associate('App\Models\Product');
//
//        return redirect()->route('carts.index')->with('success', 'Item has been Saved For Later!');
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

    }


    /**
     * Update the count in cart.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateqty(Request $request)
    {
        Cart::update($request->id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true, 'qty' => $request->quantity]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success', 'item removed');
    }

    public function clear()
    {
        Cart::destroy();
        return back()->with('success', 'cart cleared');
    }
}
