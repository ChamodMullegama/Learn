<?php

namespace domain\facade;

use domain\service\BlogService;
use Illuminate\Support\Facades\Facade;

class Blogfacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return  BlogService::class;
    }
}
