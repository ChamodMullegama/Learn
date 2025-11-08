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
        return $this->item->select('id', 'name', 'des', 'image')->get();
    }

    public function store(array $item)
    {
        if (request()->hasFile('image')) {
            $item['image'] = request()->file('image')->store('item', 'public');
        }

        return $this->item->create($item);
    }

    public function destroy($id)
    {
        $item = $this->item->findOrFail($id);

        if ($item->image && Storage::exists('public/' . $item->image)) {
            Storage::delete('public/' . $item->image);
        }

        return $item->delete();
    }

    public function edit($id){
         return $this->item->findOrFail($id);
    }


  public function update($id, array $item){
     $item=$this->item->findOrFail($id);

     if(request()->hasFile('image')){
         if($item->image  && Storage::exists('public/' .$item->image)){
            Storage::delete('public/' .$item->image);
         }
         $item['image'] = request()->file('image')->store('public/' . $item->image);
     }else{
        unset($item['image']);
     }

     return $item->update($item);
  }
}
