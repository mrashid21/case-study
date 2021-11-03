<?php

use Illuminate\Database\Seeder;
use App\Model\Address;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $addresses = [
            [
                'name' => 'worksmartly',
                'address' => 'Kuala Lumpur',
                'created_by' => 1
            ],
            [
                'name' => 'worksmartly v2',
                'address' => 'Selangor',
                'created_by' => 1
            ],
        ];

        foreach ($addresses as $key => $address) {
            // code...
            Address::create($address);
        }
    }
}
