<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grados')->insert([
            //primaria
            ['name' => 'Primero', 'nivel_id' => 1],
            ['name' => 'Segundo', 'nivel_id' => 1],
            ['name' => 'Tercero', 'nivel_id' => 1],
            ['name' => 'Cuarto', 'nivel_id' => 1],
            ['name' => 'Quinto', 'nivel_id' => 1],
            ['name' => 'Sexto', 'nivel_id' => 1],

            //secundaria
            ['name' => 'Primero', 'nivel_id' => 2],
            ['name' => 'Segundo', 'nivel_id' => 2],
            ['name' => 'Tercero', 'nivel_id' => 2],
            ['name' => 'Cuarto', 'nivel_id' => 2],
            ['name' => 'Quinto', 'nivel_id' => 2]
        ]);
    }
}
