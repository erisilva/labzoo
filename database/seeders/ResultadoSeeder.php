<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resultados')->insert(['id' => 2,'nome' => 'EM ANDAMENTO', 'descricao' => 'Não realizado']);
        DB::table('resultados')->insert(['id' => 3,'nome' => 'REAGENTE', 'descricao' => 'Valor acima da linha de corte recomendada pelo fabricante']);
        DB::table('resultados')->insert(['id' => 4,'nome' => 'REAGENTE RIFI', 'descricao' => 'Resultado com título igual ou superior a diluição 1:40']);
        DB::table('resultados')->insert(['id' => 6,'nome' => 'NÃO REAGENTE', 'descricao' => 'Resultados sem títulos de anticorpos']);
        DB::table('resultados')->insert(['id' => 7,'nome' => 'INDETERMINADO', 'descricao' => 'Os testes não foram capazes de determinar se é reagente ou não reagente']);
        DB::table('resultados')->insert(['id' => 8,'nome' => 'REATIVO', 'descricao' => 'Reativo - TRI']);
        DB::table('resultados')->insert(['id' => 9,'nome' => 'NAO REATIVO TR', 'descricao' => 'Não reativo - TR DPP']);
        DB::table('resultados')->insert(['id' => 10,'nome' => 'EXAME CANCELADO', 'descricao' => 'Exame cancelado por problemas de amostra ou protocolo']);
        DB::table('resultados')->insert(['id' => 11,'nome' => 'NÃO REATIVO', 'descricao' => 'Não Reativo - TRI']);        
    }
}
