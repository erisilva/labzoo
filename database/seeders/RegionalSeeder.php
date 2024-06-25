<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regionals')->insert(['id' => 1,'nome' => 'Industrial', 'sigla' => 'ID']);
        DB::table('regionals')->insert(['id' => 2,'nome' => 'Eldorado', 'sigla' => 'EL']);
        DB::table('regionals')->insert(['id' => 3,'nome' => 'Ressaca', 'sigla' => 'RS']);
        DB::table('regionals')->insert(['id' => 4,'nome' => 'Nacional', 'sigla' => 'NA']);
        DB::table('regionals')->insert(['id' => 5,'nome' => 'Vargem Das Flores', 'sigla' => 'VF']);
        DB::table('regionals')->insert(['id' => 6,'nome' => 'Petrolândia', 'sigla' => 'PT']);
        DB::table('regionals')->insert(['id' => 7,'nome' => 'Sede', 'sigla' => 'SE']);
        DB::table('regionals')->insert(['id' => 8,'nome' => 'Centro De Controle De Zoonoses', 'sigla' => 'CCZ']);
        DB::table('regionals')->insert(['id' => 9,'nome' => 'Riacho', 'sigla' => 'RC']);
        DB::table('regionals')->insert(['id' => 10,'nome' => 'Unidade De Vigilancia De Zoonoses', 'sigla' => 'UVZ']);
        DB::table('regionals')->insert(['id' => 11,'nome' => 'Centro De Controle De Zoonoses', 'sigla' => 'XX']);
        DB::table('regionals')->insert(['id' => 12,'nome' => 'Bombeiros', 'sigla' => 'BO']);

    }
}
