<?php

namespace domain\Facade;

use domain\Service\itemservice;
use Illuminate\Support\Facades\Facade;

class itemfacade extends Facade
{

public static function getFacadeAccessor()
{
    return itemservice::class;
}
}
