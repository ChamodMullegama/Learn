<?php

namespace domain\Service;

use App\Models\item;
use Illuminate\Support\Facades\Storage;

class itemservice
{
    protected $item;

    public function __construct(item $item)
    {
        $this->item = $item;
    }

    public function index()
    {
        return $this->item->select('id', 'name', 'image')->get();
    }

    public function store(array $data)
    {

        if (request()->hasFile('image')) {
            $data['image'] = request()->file('image')->store('item', 'public/');
        }

        return $this->item->create($data);
    }

    public function edit($id)
    {
        return $this->item->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $item = $this->item->findOrFail($id);

        if (request()->hasFile('image')) {
            if ($item->image && Storage::exists('public/' . $item->image)) {
                Storage::delete('public/' . $item->image);
            } else {
                unset($date['image']);
            }
        }

        return $item->update($data);
    }

    public function delete($id)
    {
        $item = $this->item->findOrFail($id);
        if ($item->image && Storage::exists('public/' . $item->image)) {
            Storage::delete('public/' . $item->image);
        }
    }
}
