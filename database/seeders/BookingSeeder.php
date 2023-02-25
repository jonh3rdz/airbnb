<?php

namespace Database\Seeders;

use App\Models\API\V1\Property;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
            [
                'user_id' => User::all()->random()->id,
                'property_id' => Property::all()->random()->id,
                'dateini' => '2023-01-20',
                'datefini' => '2023-01-25',
                'total_days' => 5, //Cantidad de habitaciones
                'price_per_day' => 20, //Cantidad de camas
                'price_for_stay' => 100, //Cantidad de baños
                'cleaning_fee' => 20, ///Precio
                'service_fee' => 25,
                'price_total' => 145, ///Precio
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
