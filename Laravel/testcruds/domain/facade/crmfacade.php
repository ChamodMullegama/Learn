<?php

namespace domain\facade;

use domain\Service\crmservice;
use Illuminate\Support\Facades\Facade;

class crmfacade extends Facade
{


    public static function getFacadeAccessor()
    {
        return crmservice::class;
    }
}
