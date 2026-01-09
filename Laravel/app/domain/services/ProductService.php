<?php
 namespace domain\services;

use App\Models\Product;

 class ProductService
 {

    protected $product;


    public function __construct(Product $product)
    {

        $this->product=$product;
     }

    public function index()
    {
        return $this->product->select('id','name', 'description', 'price','image')->get();
    }

    public function store(){
        return $this->product->create(request()->all());


    }


 }

