<?php

namespace domain\Service;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return $this->product->select('id','name','price','image')->get();
    }

   public function store(array $data)
   {
       if(request()->hasFile('image')){
        $Data['image'] = request()->file('image')->store('product','public');
       }

       return $this->product->create($data);
   }

   public function destroy($id)
   {
      $product = $this->product->findOrFail($id);
      if($product->image && Storage::exists('public/'.$product->image)){
         Storage::delete(['public/', $product->image]);
      }

      return $product->delete();
   }

}
