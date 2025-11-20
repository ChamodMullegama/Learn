<?php

namespace App\Http\Controllers;

use App\Http\Requests\crmformrequest;
use App\Models\crm;
use domain\facade\crmfacade;
use Illuminate\Http\Request;

class CrmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        
        try {
            $crms = crmfacade::index();
            return view('pages.crm.index', compact('crms'));
        } catch (\Throwable $th) {
            return back()->with('success', 'crm not fount' . $th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(crmformrequest $request)
    {

        try {
            crmfacade::store($request->all());
            return back()->with('success', 'crm added success');
        } catch (\Throwable $th) {
            return back()->with('success', 'crm not added' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(crm $crm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $crm =  crmfacade::edit($id);
            return view('pages.crm.edit', compact('crm'));
        } catch (\Throwable $th) {
            return back()->with('success', 'crm not added' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(crmformrequest $request, $id)
    {


        try {
            crmfacade::update($request->all(), $id);
            return back()->with('success', 'crm update success');
        } catch (\Throwable $th) {
            return back()->with('success', 'crm not update' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            crmfacade::delete($id);
            return back()->with('success', 'crm delete success');
        } catch (\Throwable $th) {
            return back()->with('success', 'crm not delete' . $th->getMessage());
        }
    }
}
