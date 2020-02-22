<?php


namespace Iyngaran\Customer\Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Iyngaran\Customer\Models\Customer;
use Iyngaran\Customer\Tests\TestCase;

class CreateCustomerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_customer_can_be_created_with_factory()
    {
        $customer = factory(Customer::class)->create();

        $this->assertCount(1, Customer::all());

    }


}