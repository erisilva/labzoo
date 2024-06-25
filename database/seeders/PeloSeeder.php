<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelos')->insert(['id' => 1,'nome' => 'Curto']);
        DB::table('pelos')->insert(['id' => 2,'nome' => 'Longo']);
        DB::table('pelos')->insert(['id' => 3,'nome' => 'Não Informado']);
        DB::table('pelos')->insert(['id' => 4,'nome' => 'Duro']);
    }
}
