<?php

namespace domain\Service;

use App\Models\Food;

class foodservice
{


    protected $food;

    public function __construct(Food $food)
    {
        $this->$food = $food;
    }

    public function index()
    {
        return $this->
    }

}
