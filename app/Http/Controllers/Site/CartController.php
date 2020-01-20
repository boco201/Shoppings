<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $product = Product::find($request->id);

        Cart::add($product->id, $product->title, $product->price, 1, $product->quantity, array());

        return redirect()->route('site.products.index')->with('success', "$product->name has successfuly beed added to the shopping");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        //echo "string";
        $products = Product::all();
       
        return view('site.products.cart', compact('products'));
    }

     public function removeItem($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect()->route('site.products.index');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

     /**
     * Show the form for creating a new resource.
     *
    * @return \Illuminate\Http\Response
     */

   public function clear()
    {
        Cart::clear();

        return back()->with('success', "has shopping cart has successfuly beed added to the shopping ");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


