<?php

namespace App\Http\Controllers;

use App\Models\allin;
use Illuminate\Http\Request;

class AllinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allin = allin::select("id" , "name", "amount")->get();
        return view('pages.item.index' , compact('allin'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        allin::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(allin $allin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(allin $allin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, allin $allin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(allin $allin)
    {
        //
    }
}
