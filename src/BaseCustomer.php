<?php


namespace Iyngaran\Customer;


class BaseCustomer
{

    public function configNotPublished()
    {
        return is_null(config('iyngaran'));
    }

    public function driver()
    {
        $driver = config('iyngaran.driver');
        $class = 'Iyngaran\Customer\Drivers\\'.ucfirst($driver)."Driver";
        return new $class;
    }

    /**
     * Get the currently set URI path for the blog.
     *
     * @return string
     */
    public function path()
    {
        return config('iyngaran.path', 'icustomers');
    }
}