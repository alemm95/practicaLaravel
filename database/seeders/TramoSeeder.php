<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Tramo;

class TramoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tramos')->insert([
            'dia' => 'Lunes',
            'hora_inicio' => '09:00:00',
            'hora_fin' => '10:00:00',
            'actividad_id' => '1',
            'fecha_alta' => '2021-06-20',
            'fecha_baja' => '2021-07-19',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('tramos')->insert([
            'dia' => 'Martes',
            'hora_inicio' => '11:00:00',
            'hora_fin' => '12:00:00',
            'actividad_id' => '2',
            'fecha_alta' => '2021-06-20',
            'fecha_baja' => '2021-07-19',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('tramos')->insert([
            'dia' => 'Miercoles',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '09:00:00',
            'actividad_id' => '3',
            'fecha_alta' => '2021-06-20',
            'fecha_baja' => '2021-07-19',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('tramos')->insert([
            'dia' => 'Jueves',
            'hora_inicio' => '12:00:00',
            'hora_fin' => '13:00:00',
            'actividad_id' => '1',
            'fecha_alta' => '2021-06-20',
            'fecha_baja' => '2021-07-19',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('tramos')->insert([
            'dia' => 'Viernes',
            'hora_inicio' => '13:00:00',
            'hora_fin' => '14:00:00',
            'actividad_id' => '2',
            'fecha_alta' => '2021-06-20',
            'fecha_baja' => '2021-07-19',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);
    }
}
