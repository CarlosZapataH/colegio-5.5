<?php

use Illuminate\Database\Seeder;

class SeccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secciones')->insert([
            //primaria
            ['name' => 'A', 'grado_id' => 1],
            ['name' => 'A', 'grado_id' => 2],
            ['name' => 'A', 'grado_id' => 3],
            ['name' => 'A', 'grado_id' => 4],
            ['name' => 'A', 'grado_id' => 5],
            ['name' => 'A', 'grado_id' => 6],
            //secundaria
            ['name' => 'A', 'grado_id' => 7],
            ['name' => 'A', 'grado_id' => 8],
            ['name' => 'A', 'grado_id' => 9],
            ['name' => 'A', 'grado_id' => 10],
            ['name' => 'A', 'grado_id' => 11],
        ]);
    }
}
