<?php

namespace App\Http\Controllers;

use App\Http\Requests\itemRequests;
use App\Models\item;
use domain\Facade\itemfacade;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $items = itemfacade::index();
            return view('pages.item.index' , compact('items'));
        } catch (\Throwable $th) {

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
    public function store(itemRequests $request)
    {
        itemfacade::store($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        itemfacade::edit($id);
        return view('pages.item.edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id , itemRequests $item)
    {
        itemfacade::update(request()->all() , $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        itemfacade::destroy($id);
    }
}
