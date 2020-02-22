<?php


namespace Iyngaran\Customer\Facades;


use Illuminate\Support\Facades\Facade;

class BaseCustomer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'BaseCustomer';
    }
}