<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            [
                'category_id' => 1,
                'title' => 'Apartamento con servicios incluidos',
                'description' => 'Apartamento con las comodidades habituales de un hotel, atendido por una empresa de administración profesional.',
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'category_id' => 2,
                'title' => 'Cabaña',
                'description' => 'Casa hecha con materiales naturales como la madera y construida en un entorno natural.',
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'category_id' => 2,
                'title' => 'Villa',
                'description' => 'Alojamiento de lujo que puede incluir espacios de interior y exterior, jardines y piscinas.',
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
