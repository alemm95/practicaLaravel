<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Actividad;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actividades')->insert([
            'name' => 'Spinning',
            'descripcion' => 'Duración de la clase = 60 min',
            'aforo' => '10',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('actividades')->insert([
            'name' => 'Zumba',
            'descripcion' => 'Duración de la clase = 60 min',
            'aforo' => '15',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('actividades')->insert([
            'name' => 'Natacion',
            'descripcion' => 'Duración de la clase = 60 min',
            'aforo' => '20',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);
    }
}
