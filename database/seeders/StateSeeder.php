<?php

namespace Database\Seeders;

use App\Models\API\V1\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            [
                'country_id' => Country::all()->random()->id,
                'name' => 'San Miguel',
                'code' => 'SM',
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'country_id' => Country::all()->random()->id,
                'name' => 'Usulutan',
                'code' => 'USU',
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'country_id' => Country::all()->random()->id,
                'name' => 'Morazan',
                'code' => 'MOR',
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'country_id' => Country::all()->random()->id,
                'name' => 'La Unión',
                'code' => 'UNI',
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
