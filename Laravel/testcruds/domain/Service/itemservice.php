<?php

namespace domain\Service;

use App\Models\item;
use Illuminate\Support\Facades\Storage;

class itemservice
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function index()
    {
        return $this->item->select('id', 'des', 'image', 'name')->get();
    }


    public function store(array $data)
    {

        if (request()->hasFile('image')) {
            $data['image'] = request()->file('image')->store('item', 'public');
        }

        return $this->item->crate($data);
    }

    public function destroy($id)
    {
        $item = $this->item->findOrFail($id);

        if ($item->image && Storage::exists('public/' . $item->image)) {
            Storage::delete('public/' . $item->image);
        }

        return $item->delete();
    }
}
