<?php

namespace domain\service;

use App\Models\Product;
use GuzzleHttp\Psr7\Request;

class ProductService
{
    protected $product;

    public function __construct(Product $product)
    {
       $this->product=$product;
    }

    public function index()
    {
        return $this->product->select('name','des','image')->get();
    }

    public function store(array $data)
    {
        if(request()->hasFile('image')){
            $data['image']=request()->file('image')->store('product' , 'public');
        }

        return $this->product->create($data);
    }
}
