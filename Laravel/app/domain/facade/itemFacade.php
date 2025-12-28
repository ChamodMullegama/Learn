<?php

namespace domain\facade;

use domain\services\itemServices;
use Illuminate\Support\Facades\Facade;

class itemFacade extends Facade{

    public static function getFacadeAccessor(){
      return itemServices::class;
    }
}

