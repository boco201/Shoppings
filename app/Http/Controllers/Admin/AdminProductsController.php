<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Category };

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10|max:1000',
            'sku' => 'required',
            'price' => 'required',
            'image'         =>  'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'title'       =>   $request->title,
            'description'        =>   $request->description,
            'sku'        =>   $request->sku,
            'price'        =>   $request->price,
            'category_id'        =>   $request->category_id,
            'image'            =>   $new_name
        );

        Product::create($form_data);

        return redirect()->route('admin.products.index');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'title' => 'required|min:5',
                'description' => 'required|min:10|max:1000',
                'sku' => 'required',
                'price' => 'required',
                'image'         =>  'required|image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'title' => 'required|min:5',
                'description' => 'required|min:10|max:1000',
                'sku' => 'required',
                'price' => 'required'
            ]);
        }

        $form_data = array(
            'title'       =>   $request->title,
            'description'        =>   $request->description,
            'sku'        =>   $request->sku,
            'price'        =>   $request->price,
            'category_id'        =>   $request->category_id,
            'image'            =>   $image_name
        );
  
        Product::whereId($id)->update($form_data);

        return redirect()->route('admin.products.index')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

       return redirect()->route('admin.products.index')->with('success', 'Data is successfully updated');
    }
}


