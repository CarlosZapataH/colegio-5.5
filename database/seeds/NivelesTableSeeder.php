<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('niveles')->insert([
            ['name' => 'Primaria'],
            ['name' => 'Secundaria']
        ]);
    }
}
