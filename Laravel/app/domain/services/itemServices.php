<?php



namespace domain\services;

use App\Models\item;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;

class itemServices
{
    protected $item;

    public function __construct(item $item)
    {
        $this->item = $item;
    }

    public function index()
    {
        return $this->item->select('id','name', "des", "image")->get();
    }

    public function store(array $data)
    {
        if (request()->hasFile('image')) {
            $data['image'] = request()->file('image')->store('item', 'public');
        }

        return $this->item->create($data);
    }

    public function edit($id)
    {

        return $this->item->find($id);
    }

    public function update(array $data, $id)
    {

        $item = $this->item->find($id);
        if (request()->hasFile('image')) {
            if ($item->image && Storage::exists('item', 'public')) {
                Storage::delete($item->image);
            }
            $data['image'] = request()->file('image')->store('item', 'public');
        } else {
            unset($data['image']);
        }

        return $item->update($data);
    }

    public function delete($id)
    {
        $item = $this->item->find($id);
        if ($item->image && Storage::exists("public/", $item->image)) {
            Storage::delete('public/' . $item->image);
        }

        return $item->delete($id);
    }
}
