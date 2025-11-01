<?php

namespace domain\service;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogService
{

    protected $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function index()
    {
        return $this->blog->select('id', 'name', 'des', 'image')->get();
    }

    public function edit($id)
    {
        return $this->blog->findOrFail($id);
    }

  public function update($id, array $data)
    {
        $blog = $this->blog->findOrFail($id);

        // Handle image upload if present
        if (request()->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image && Storage::exists($blog->image)) {
                Storage::delete($blog->image);
            }

            // Store new image
            $data['image'] = request()->file('image')->store('blogs', 'public');
        } else {
            // Keep existing image if no new image uploaded
            unset($data['image']);
        }

        return $blog->update($data);
    }

    public function store(array $data)
    {
        if (request()->hasFile('image')) {
            $data['image'] = request()->file('image')->store('blogs', 'public');
        }
        return $this->blog->create($data);
    }

    public function destroy($id)
    {

        $blog = $this->blog->findOrFail($id);

        if ($blog->image && Storage::exists('public/' . $blog->image)) {
            Storage::delete('public/' . $blog->image);
        }
        return $blog->delete();
    }
}
