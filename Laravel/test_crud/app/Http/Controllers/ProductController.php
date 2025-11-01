<?php

namespace App\Http\Controllers;

use App\Models\Product;
use domain\facade\ProductFacade;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
          $product = ProductFacade::index();
          return view('pages.product.index' , compact('product'));
        } catch (\Throwable $th) {
          return back()->with('error', 'fali to fatch data');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'string|required',
             'des'=>'string|required',
             'image'=>'required|image',
        ]);

        try {
             ProductFacade::store($request->all());
             return back()->with('success','Product added success');
        } catch (\Throwable $e) {
             return back()->with('error','Product added success'  . $e->getMessage());
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
