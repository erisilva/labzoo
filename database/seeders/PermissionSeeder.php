<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // permission list for users table
        DB::table('permissions')->insert([
            'name' => 'user-index',
            'description' => 'Lista de operadores',
        ]);
        DB::table('permissions')->insert([
            'name' => 'user-create',
            'description' => 'Registrar novo operador',
        ]);
        DB::table('permissions')->insert([
            'name' => 'user-edit',
            'description' => 'Alterar dados do operador',
        ]);
        DB::table('permissions')->insert([
            'name' => 'user-delete',
            'description' => 'Excluir operador',
        ]);
        DB::table('permissions')->insert([
            'name' => 'user-show',
            'description' => 'Mostrar dados do operador',
        ]);
        DB::table('permissions')->insert([
            'name' => 'user-export',
            'description' => 'Exportação de dados dos operadores',
        ]);


        // permission list for roles table
        DB::table('permissions')->insert([
            'name' => 'role-index',
            'description' => 'Lista de perfis',
        ]);
        DB::table('permissions')->insert([
            'name' => 'role-create',
            'description' => 'Registrar novo perfil',
        ]);
        DB::table('permissions')->insert([
            'name' => 'role-edit',
            'description' => 'Alterar dados do perfil',
        ]);
        DB::table('permissions')->insert([
            'name' => 'role-delete',
            'description' => 'Excluir perfil',
        ]);
        DB::table('permissions')->insert([
            'name' => 'role-show',
            'description' => 'Alterar dados do perfil',
        ]);
        DB::table('permissions')->insert([
            'name' => 'role-export',
            'description' => 'Exportação de dados dos perfis',
        ]);

        // permission list for permissions table
        DB::table('permissions')->insert([
            'name' => 'permission-index',
            'description' => 'Lista de permissões',
        ]);
        DB::table('permissions')->insert([
            'name' => 'permission-create',
            'description' => 'Registrar nova permissão',
        ]);
        DB::table('permissions')->insert([
            'name' => 'permission-edit',
            'description' => 'Alterar dados da permissão',
        ]);
        DB::table('permissions')->insert([
            'name' => 'permission-delete',
            'description' => 'Excluir permissão',
        ]);
        DB::table('permissions')->insert([
            'name' => 'permission-show',
            'description' => 'Mostrar dados da permissão',
        ]);
        DB::table('permissions')->insert([
            'name' => 'permission-export',
            'description' => 'Exportação de dados das permissões',
        ]);

        // permission list for logs table
        DB::table('permissions')->insert([
            'name' => 'log-index',
            'description' => 'Lista de permissões',
        ]);
        DB::table('permissions')->insert([
            'name' => 'log-show',
            'description' => 'Mostrar dados da permissão',
        ]);
        DB::table('permissions')->insert([
            'name' => 'log-export',
            'description' => 'Exportação de dados das permissões',
        ]);

        //raças
        DB::table('permissions')->insert([
            'name' => 'raca-index',
            'description' => 'Lista de raças',
        ]);
        DB::table('permissions')->insert([
            'name' => 'raca-create',
            'description' => 'Registrar nova raça',
        ]);
        DB::table('permissions')->insert([
            'name' => 'raca-edit',
            'description' => 'Alterar dados da raça',
        ]);
        DB::table('permissions')->insert([
            'name' => 'raca-delete',
            'description' => 'Excluir raça',
        ]);
        DB::table('permissions')->insert([
            'name' => 'raca-show',
            'description' => 'Mostrar dados da raça',
        ]);

        //porte
        DB::table('permissions')->insert([
            'name' => 'porte-index',
            'description' => 'Lista de portes dos animais',
        ]);
        DB::table('permissions')->insert([
            'name' => 'porte-create',
            'description' => 'Registrar novo porte',
        ]);
        DB::table('permissions')->insert([
            'name' => 'porte-edit',
            'description' => 'Alterar dados do porte',
        ]);
        DB::table('permissions')->insert([
            'name' => 'porte-delete',
            'description' => 'Excluir porte do animal',
        ]);
        DB::table('permissions')->insert([
            'name' => 'porte-show',
            'description' => 'Mostrar dados do porte',
        ]);

        //cor
        DB::table('permissions')->insert([
            'name' => 'cor-index',
            'description' => 'Lista de cores dos animais',
        ]);
        DB::table('permissions')->insert([
            'name' => 'cor-create',
            'description' => 'Registrar nova cor',
        ]);
        DB::table('permissions')->insert([
            'name' => 'cor-edit',
            'description' => 'Alterar dados da cor do animal',
        ]);
        DB::table('permissions')->insert([
            'name' => 'cor-delete',
            'description' => 'Excluir cor do animal',
        ]);
        DB::table('permissions')->insert([
            'name' => 'cor-show',
            'description' => 'Mostrar dados de uma cor do animal',
        ]);

        //regional
        DB::table('permissions')->insert([
            'name' => 'regional-index',
            'description' => 'Lista de regionais',
        ]);
        DB::table('permissions')->insert([
            'name' => 'regional-create',
            'description' => 'Registrar nova regional',
        ]);
        DB::table('permissions')->insert([
            'name' => 'regional-edit',
            'description' => 'Alterar dados de uma regional',
        ]);
        DB::table('permissions')->insert([
            'name' => 'regional-delete',
            'description' => 'Excluir regional',
        ]);
        DB::table('permissions')->insert([
            'name' => 'regional-show',
            'description' => 'Mostrar dados de uma regional',
        ]);

        //pelo
        DB::table('permissions')->insert([
            'name' => 'pelo-index',
            'description' => 'Lista de tipos de pelagens',
        ]);
        DB::table('permissions')->insert([
            'name' => 'pelo-create',
            'description' => 'Registrar novo tipo de pelagem',
        ]);
        DB::table('permissions')->insert([
            'name' => 'pelo-edit',
            'description' => 'Alterar dados de um tipo de pelagem',
        ]);
        DB::table('permissions')->insert([
            'name' => 'pelo-delete',
            'description' => 'Excluir um tipo de pelagem',
        ]);
        DB::table('permissions')->insert([
            'name' => 'pelo-show',
            'description' => 'Mostrar dados de um tipo de pelagem',
        ]);

        //categoria
        DB::table('permissions')->insert([
            'name' => 'categoria-index',
            'description' => 'Lista de categorias',
        ]);
        DB::table('permissions')->insert([
            'name' => 'categoria-create',
            'description' => 'Registrar nova categoria',
        ]);
        DB::table('permissions')->insert([
            'name' => 'categoria-edit',
            'description' => 'Alterar dados de uma categoria',
        ]);
        DB::table('permissions')->insert([
            'name' => 'categoria-delete',
            'description' => 'Excluir categoria',
        ]);
        DB::table('permissions')->insert([
            'name' => 'categoria-show',
            'description' => 'Mostrar dados de uma categoria',
        ]);

        //metodo
        DB::table('permissions')->insert([
            'name' => 'metodo-index',
            'description' => 'Lista de métodos',
        ]);
        DB::table('permissions')->insert([
            'name' => 'metodo-create',
            'description' => 'Registrar nova método',
        ]);
        DB::table('permissions')->insert([
            'name' => 'metodo-edit',
            'description' => 'Alterar dados de um método',
        ]);
        DB::table('permissions')->insert([
            'name' => 'metodo-delete',
            'description' => 'Excluir método',
        ]);
        DB::table('permissions')->insert([
            'name' => 'metodo-show',
            'description' => 'Mostrar dados de um método',
        ]);

        //resultado
        DB::table('permissions')->insert([
            'name' => 'resultado-index',
            'description' => 'Lista de resultados',
        ]);
        DB::table('permissions')->insert([
            'name' => 'resultado-create',
            'description' => 'Registrar nova resultado',
        ]);
        DB::table('permissions')->insert([
            'name' => 'resultado-edit',
            'description' => 'Alterar dados de um resultado',
        ]);
        DB::table('permissions')->insert([
            'name' => 'resultado-delete',
            'description' => 'Excluir resultado',
        ]);
        DB::table('permissions')->insert([
            'name' => 'resultado-show',
            'description' => 'Mostrar dados de um resultado',
        ]);

        // tutores
        DB::table('permissions')->insert([
            'name' => 'tutor-index',
            'description' => 'Lista de tutores',
        ]);
        DB::table('permissions')->insert([
            'name' => 'tutor-create',
            'description' => 'Registrar novo tutor',
        ]);
        DB::table('permissions')->insert([
            'name' => 'tutor-edit',
            'description' => 'Alterar dados do tutor',
        ]);
        DB::table('permissions')->insert([
            'name' => 'tutor-delete',
            'description' => 'Excluir tutor',
        ]);
        DB::table('permissions')->insert([
            'name' => 'tutor-show',
            'description' => 'Mostrar dados do tutor',
        ]);
        DB::table('permissions')->insert([
            'name' => 'tutor-export',
            'description' => 'Exportação de dados das tutores',
        ]);

    }
}
