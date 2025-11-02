<?php

namespace domain\Service;

use App\Models\Product;

class ProductService
{

    protected $product;

    public function __construct(Product $product)
    {
       $this->product=$product;
    }

    public function index(){

        return $this->product->select('is','name' ,'des' ,'image')->get();
    }

     public function index(array $data){

        
    }


}
