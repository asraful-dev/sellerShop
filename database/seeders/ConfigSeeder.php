<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::create([
            'usd_wallet' => 'TCk8MSJGkPCu9b1BXgwC5CBnasm4v7TAka',
            'bkash_wallet' => '01901000000',
            'nagad_wallet' => '01801223344'
        ]); 
    }
}