<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use App\Models\Commission;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commission::create([
            'refer1' => '1',
            'refer2' => ' 2',
            'refer3' => ' 3',
            'refer4' => ' 4',
            'refer5' => ' 5',
            'refer6' => ' 6',
            'refer7' => ' 7',
            'refer8' => ' 8',
            'refer9' => ' 9',
            'refer10' => ' 10',
            'refer11' => ' 11',
            'refer13' => ' 13',
            'refer14' => ' 14',
            'refer15' => ' 15',
            'refer16' => ' 16',
            'refer17' => ' 17',
            'refer18' => ' 18',
            'refer19' => ' 19',
            'refer20' => ' 20',
        ]); 
    }
}
