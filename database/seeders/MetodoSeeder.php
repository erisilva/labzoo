<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metodos')->insert(['id' => 1,'nome' => 'ELIZA', 'descricao' => 'Ensaio Imunoenzimático para diagnóstico da LVC']);
        DB::table('metodos')->insert(['id' => 4,'nome' => 'RIFI', 'descricao' => 'Reação de Imunofluorescência Indireta para Leishmania']);
        DB::table('metodos')->insert(['id' => 5,'nome' => 'Teste Rápido', 'descricao' => 'Teste Rápido Imunocromatográfico']);
    }
}
