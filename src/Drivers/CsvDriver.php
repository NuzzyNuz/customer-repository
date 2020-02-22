<?php


namespace Iyngaran\Customer\Drivers;


use Illuminate\Support\Facades\File;
use Iyngaran\Customer\Exceptions\CsvDriverDirectoryNotFoundException;

class CsvDriver extends Driver
{
    public function fetchCustomers()
    {
        $handle = fopen(__DIR__ . "/../../sample-data/".$this->config['customers_sample_data_file'], "r");
        $header = true;
        while ($csvLine = fgetcsv($handle, 1000, ",")) {

            if ($header) {
                $header = false;
            } else {
                $this->customers[] = [
                    'title' => $csvLine[0],
                    'first_name' => $csvLine[1],
                    'last_name' => $csvLine[2],
                ];
            }
        }

        return $this->customers;
    }

    /**
     * Instantiates the CsvFileParser and build up an array of customers.
     *
     * @throws \Iyngaran\Customer\Exceptions\FileDriverDirectoryNotFoundException
     *
     * @return void
     */
    protected function validateSource()
    {
        if ( ! File::exists(__DIR__ . "/../../sample-data/".$this->config['customers_sample_data_file'])) {
            throw new CsvDriverDirectoryNotFoundException(
                'Director: at \'' . $this->config['customers_sample_data_file'] . '\' does not exist. ' .
                'Check the directory path in the config file.'
            );
        }
    }
}