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
            return view('pages.item.index', compact('items'));
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

        try {
            itemfacade::store($request->all());
            return back()->with('success', 'item added sus');
        } catch (\Throwable $th) {
            return back()->with('error', 'item now added' . $th->getMessage());
        }
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
        try {
          $item=itemfacade::edit($id);
            return view('pages.item.edit', compact('item'));
        } catch (\Throwable $th) {
            return back()->with('error', 'item not found' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, itemRequests $request)
    {
        try {
            itemfacade::update($request->all(), $id);
             return redirect()->route('item.index')->with('success', 'Blog updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'item not updated' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {
            itemfacade::destroy($id);
            return back()->with('success', 'item delete sus');
        } catch (\Throwable $th) {
            return back()->with('error', 'item not delete' . $th->getMessage());
        }
    }
}
