<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use domain\facade\Blogfacade;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        try {
            $blog = Blogfacade::index();
            return view("pages.blog.index", compact('blog'));
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to load blogs: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('pages.blog.create'); // Separate page if needed
        } catch (\Throwable $e) {
            return back()->with('error', 'Error loading create page: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'des' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            Blogfacade::store($request->all());
            return back()->with('success', 'Blog added successfully!');
        } catch (\Throwable $e) {
            return back()->with('error', 'An error occurred while adding the blog: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $blog = Blogfacade::edit($id);
            return view('pages.blog.edit', compact('blog'));
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to load edit page: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'des' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            Blogfacade::update($id, $request->all());
            return redirect()->route('blog.index')->with('success', 'Blog updated successfully!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to update blog: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Blogfacade::destroy($id);
            return back()->with('success', 'Blog deleted successfully!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to delete blog: ' . $e->getMessage());
        }
    }
}
