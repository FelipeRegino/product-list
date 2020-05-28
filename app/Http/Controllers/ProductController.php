<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::get();
      return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::orderBy('id', 'desc')->get();
      return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'resume' => 'required|max:255',
        'description' => 'required',
        'reference' => 'required|max:255',
        'quantity' => 'required|integer',
        'price' => 'required|regex:/^\d+([.,]\d{1,X})?$]/',
        'active' => 'required',
        'category_id' => 'required',
      ]);

      if ($request->hasFile('image')) {
        $product = Product::create($request->all())->setRequestImage($request->image);
      }else {
        $product = Product::create($request->all());
      }
      return redirect()->route('product.index');
    }

    /**
     * Display the specified product.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      $categories = Category::orderBy('id', 'desc')->get();
      return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'resume' => 'required|max:255',
        'description' => 'required',
        'reference' => 'required|max:255',
        'quantity' => 'required|integer',
        'price' => 'required|regex:/^\d+([.,]\d{1,X})?$]/',
        'active' => 'required',
        'category_id' => 'required',
      ]);

      if ($request->hasFile('image')) {
        $product->setRequestImage($request->image)->update($request->toArray());
      }else {
        $product->update($request->toArray());
      }
      return redirect()->route('product.index');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->delete();
      return redirect()->route('product.index');
    }
}
