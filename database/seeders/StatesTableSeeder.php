<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['name' => 'Alabama', 'code' => 'AL', 'country_id' => 1],
            ['name' => 'Alaska', 'code' => 'AK', 'country_id' => 1],
            ['name' => 'British Columbia', 'code' => 'BC', 'country_id' => 2],
        ];
        
        DB::table('states')->insert($states);
    }
}
