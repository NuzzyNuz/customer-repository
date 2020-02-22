<?php


namespace Iyngaran\Customer\Console;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Iyngaran\Customer\Models\Customer;
use Iyngaran\Customer\Facades\BaseCustomer;
use Iyngaran\Customer\Repositories\CustomerRepository;

class ProcessCommand extends Command
{
    protected $signature = "customer:process";
    
    protected $description = "Update customers";

    public function handle(CustomerRepository $customerRepository)
    {
        if (BaseCustomer::configNotPublished()) {
            return $this->warn('Please publish the config file by ' .
                'running \'php artisan vendor:publish --tag=iyngaran-customer-config\'');
        }

        try {

            $customers = BaseCustomer::driver()->fetchCustomers();

            $this->info("Number of customers: ", count($customers));
            if ($customers) {
                foreach ($customers as $customer) {
                    $customerRepository->save($customer);
                    $this->info('Customer : '.$customer['title'].'.'.$customer['first_name']);
                }
            }

            $this->info("The sample customer data updated...");

        } catch (\Exception $ex) {
            $this->error($ex->getMessage());
        }
    }
}