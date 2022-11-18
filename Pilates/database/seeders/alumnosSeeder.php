<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class alumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumnos')->insert([
            'nombre' => 'Javi',
            'telefono' => '12345',
            'cumpleaños' => '2000-01-21',
            'padecimiento' => 'Esta chiquito',
        ]);
    }
}
