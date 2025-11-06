<?php

namespace domain\Facade;

use domain\Service\ProductService;
use Illuminate\Support\Facades\Facade;

class ProductFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return ProductService::class;
    }
}
