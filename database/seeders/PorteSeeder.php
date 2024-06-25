<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PorteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('portes')->insert(['id' => 1,'nome' => 'Não Informado']);
        DB::table('portes')->insert(['id' => 2,'nome' => 'Pequeno']);
        DB::table('portes')->insert(['id' => 3,'nome' => 'Médio']);
        DB::table('portes')->insert(['id' => 4,'nome' => 'Grande']);
    }
}
