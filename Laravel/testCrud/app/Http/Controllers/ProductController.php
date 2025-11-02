<?php

namespace App\Http\Controllers;

use App\Models\Product;
use domain\Facade\ProductFacade;
use Illuminate\Auth\Events\Validated;
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
                return view('pages.products.index' , compact('product'));
           } catch (\Throwable $th) {
            //throw $th;
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
    public function store(Request $request)
    {

        $request -> Validated([

            'name'=>'',
    ]);

        try {
             ProductFacade::store($request->all());
             return back()->with('sus' , 'product added');
        } catch (\Throwable $e) {
               return back()->with('err' , 'product not added' . $e->getMessage());
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
