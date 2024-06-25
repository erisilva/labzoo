<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert(['id' => 2,'nome' => 'Recoleta De Amostra']);
        DB::table('categorias')->insert(['id' => 3,'nome' => 'Castração']);
        DB::table('categorias')->insert(['id' => 4,'nome' => 'Eutanásia']);
        DB::table('categorias')->insert(['id' => 6,'nome' => 'Demandas']);
        DB::table('categorias')->insert(['id' => 7,'nome' => 'Inquérito Censitário']);
        DB::table('categorias')->insert(['id' => 8,'nome' => 'Inquérito Amostral']);
        DB::table('categorias')->insert(['id' => 9,'nome' => 'Raio Humano']);
        DB::table('categorias')->insert(['id' => 10,'nome' => 'Repetição De Indeterminado']);
        DB::table('categorias')->insert(['id' => 11,'nome' => 'Denúncia']);
        DB::table('categorias')->insert(['id' => 12,'nome' => 'Cão Em Observação Ccz']);
        DB::table('categorias')->insert(['id' => 13,'nome' => 'Contra-Prova']);
        DB::table('categorias')->insert(['id' => 14,'nome' => 'Recoleta Devido Hemólise']);
        DB::table('categorias')->insert(['id' => 15,'nome' => 'Recusa De Realizar Recoleta']);
        
    }
}
