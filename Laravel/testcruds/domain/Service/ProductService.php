<?php

namespace domain\Service;

use App\Models\Product;

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
         if(request()->hasFile('image'))
         {
            $data['image']=request()->file('image')->store('product','public');
         }

         return $this->product->create();
    }

}
