<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'name'              => 'Software',
            'amount'            => '60000',
            'trx_id'            => 'trx id'
        ]); 
    }
}