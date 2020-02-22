<?php


namespace Iyngaran\Customer\Drivers;


abstract class Driver
{
    protected $config;

    protected $customers = [];

    public function __construct()
    {
        $this->setConfig();
        $this->validateSource();
    }

    /**
     * Fetch and parse all of the customers for the given source.
     *
     * @return mixed
     */
    public abstract function fetchCustomers();

    protected function setConfig()
    {
        $this->config = config('iyngaran.'.config('iyngaran.driver'));
    }

    protected function validateSource()
    {
        return true;
    }
}