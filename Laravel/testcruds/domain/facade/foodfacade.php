<?php

namespace domain\facade;

use domain\Service\foodservice;
use Illuminate\Support\Facades\Facade;

class foodfacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return foodservice::class;
    }
}
