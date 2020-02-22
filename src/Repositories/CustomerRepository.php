<?php


namespace Iyngaran\Customer\Repositories;


use Iyngaran\Customer\Models\Customer;

class CustomerRepository
{

    public function save($customer)
    {
        Customer::create($customer);
    }
}