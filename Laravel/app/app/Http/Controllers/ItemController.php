<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemFormRequest;
use App\Models\item;
use domain\facade\itemFacade;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $items = itemFacade::index();

            return view('pages.item.index', compact('items'));
        } catch (\Throwable $th) {
            return back()->with('error', 'data found' . $th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemFormRequest $request)
    {
        try {

            itemFacade::store($request->all());

            return back()->with('success', 'item added successfuly!');
        } catch (\Throwable $th) {
            return back()->with('error', "item not added" . $th->getMessage());
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
            $item = itemFacade::edit($id);
            return view('pages.item.edit', compact('item'));
        } catch (\Throwable $th) {
            return back()->with('error', 'item not found' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemFormRequest $request, $id)
    {
        try {
            itemFacade::update($request->all(), $id);

         return redirect()->route('item.index')->with('success', 'item update successful ');
        } catch (\Throwable $th) {
            return back()->with('error', 'item not update successful!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            itemFacade::delete($id);
            return back()->with('success', 'item delete success ');
        } catch (\Throwable $th) {
            return back()->with('error', 'item not deleted successful!' . $th->getMessage());
        }
    }
}
