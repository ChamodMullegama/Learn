<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFromRequest;
use App\Models\Product;
use domain\Facade\ProductFacade;
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
            return view('pages.product.index', compact('product'));
        } catch (\Throwable $th) {
            return back()->with('err', 'product not added');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFromRequest $request)
    {
        try {
            ProductFacade::store($request->all());
            return back()->with('sus', 'product  added');
        } catch (\Throwable $th) {
            return back()->with('err', 'product not added');
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
