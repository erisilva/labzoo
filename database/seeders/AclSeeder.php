<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class AclSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // apaga todas as tabelas de relacionamento
                DB::table('role_user')->delete();
                DB::table('permission_role')->delete();
        
                // recebe os operadores principais principais do sistema
                // utilizo o termo operador em vez de usuário por esse
                // significar usuário do SUS, ou usuário do plano, em vez de pessoa ou cliente
                $administrador = User::where('email','=','adm@mail.com')->get()->first();
                $gerente = User::where('email','=','gerente@mail.com')->get()->first();
                $operador = User::where('email','=','operador@mail.com')->get()->first();
                $leitor = User::where('email','=','leitor@mail.com')->get()->first();
        
                // recebi os perfis
                $administrador_perfil = Role::where('name', '=', 'admin')->get()->first();
                $gerente_perfil = Role::where('name', '=', 'gerente')->get()->first();
                $operador_perfil = Role::where('name', '=', 'operador')->get()->first();
                $leitor_perfil = Role::where('name', '=', 'leitor')->get()->first();
        
                // salva os relacionamentos entre operador e perfil
                $administrador->roles()->attach($administrador_perfil);
                $gerente->roles()->attach($gerente_perfil);
                $operador->roles()->attach($operador_perfil);
                $leitor->roles()->attach($leitor_perfil);
        
                // recebi as permissoes
                // para operadores
                $user_index = Permission::where('name', '=', 'user-index')->get()->first();       
                $user_create = Permission::where('name', '=', 'user-create')->get()->first();      
                $user_edit = Permission::where('name', '=', 'user-edit')->get()->first();        
                $user_delete = Permission::where('name', '=', 'user-delete')->get()->first();      
                $user_show = Permission::where('name', '=', 'user-show')->get()->first();        
                $user_export = Permission::where('name', '=', 'user-export')->get()->first();      
                // para perfis
                $role_index = Permission::where('name', '=', 'role-index')->get()->first();       
                $role_create = Permission::where('name', '=', 'role-create')->get()->first();      
                $role_edit = Permission::where('name', '=', 'role-edit')->get()->first();        
                $role_delete = Permission::where('name', '=', 'role-delete')->get()->first();      
                $role_show = Permission::where('name', '=', 'role-show')->get()->first();        
                $role_export = Permission::where('name', '=', 'role-export')->get()->first();      
                // para permissões
                $permission_index = Permission::where('name', '=', 'permission-index')->get()->first(); 
                $permission_create = Permission::where('name', '=', 'permission-create')->get()->first();
                $permission_edit = Permission::where('name', '=', 'permission-edit')->get()->first();  
                $permission_delete = Permission::where('name', '=', 'permission-delete')->get()->first();
                $permission_show = Permission::where('name', '=', 'permission-show')->get()->first();  
                $permission_export = Permission::where('name', '=', 'permission-export')->get()->first();
                // para logs
                $log_index = Permission::where('name', '=', 'log-index')->get()->first();
                $log_show = Permission::where('name', '=', 'log-show')->get()->first();
                $log_export = Permission::where('name', '=', 'log-export')->get()->first();
                // para raças
                $raca_index = Permission::where('name', '=', 'raca-index')->get()->first();
                $raca_create = Permission::where('name', '=', 'raca-create')->get()->first();
                $raca_edit = Permission::where('name', '=', 'raca-edit')->get()->first();
                $raca_delete = Permission::where('name', '=', 'raca-delete')->get()->first();
                $raca_show = Permission::where('name', '=', 'raca-show')->get()->first();
                // para portes
                $porte_index = Permission::where('name', '=', 'porte-index')->get()->first();
                $porte_create = Permission::where('name', '=', 'porte-create')->get()->first();
                $porte_edit = Permission::where('name', '=', 'porte-edit')->get()->first();
                $porte_delete = Permission::where('name', '=', 'porte-delete')->get()->first();
                $porte_show = Permission::where('name', '=', 'porte-show')->get()->first();
                // para cores
                $cor_index = Permission::where('name', '=', 'cor-index')->get()->first();
                $cor_create = Permission::where('name', '=', 'cor-create')->get()->first();
                $cor_edit = Permission::where('name', '=', 'cor-edit')->get()->first();
                $cor_delete = Permission::where('name', '=', 'cor-delete')->get()->first();
                $cor_show = Permission::where('name', '=', 'cor-show')->get()->first();
                // para regionais
                $regional_index = Permission::where('name', '=', 'regional-index')->get()->first();
                $regional_create = Permission::where('name', '=', 'regional-create')->get()->first();
                $regional_edit = Permission::where('name', '=', 'regional-edit')->get()->first();
                $regional_delete = Permission::where('name', '=', 'regional-delete')->get()->first();
                $regional_show = Permission::where('name', '=', 'regional-show')->get()->first();
                // para pelos
                $pelo_index = Permission::where('name', '=', 'pelo-index')->get()->first();
                $pelo_create = Permission::where('name', '=', 'pelo-create')->get()->first();
                $pelo_edit = Permission::where('name', '=', 'pelo-edit')->get()->first();
                $pelo_delete = Permission::where('name', '=', 'pelo-delete')->get()->first();
                $pelo_show = Permission::where('name', '=', 'pelo-show')->get()->first();
                // para categoria
                $categoria_index = Permission::where('name', '=', 'categoria-index')->get()->first();
                $categoria_create = Permission::where('name', '=', 'categoria-create')->get()->first();
                $categoria_edit = Permission::where('name', '=', 'categoria-edit')->get()->first();
                $categoria_delete = Permission::where('name', '=', 'categoria-delete')->get()->first();
                $categoria_show = Permission::where('name', '=', 'categoria-show')->get()->first();
                // para métodos
                $metodo_index = Permission::where('name', '=', 'metodo-index')->get()->first();
                $metodo_create = Permission::where('name', '=', 'metodo-create')->get()->first();
                $metodo_edit = Permission::where('name', '=', 'metodo-edit')->get()->first();
                $metodo_delete = Permission::where('name', '=', 'metodo-delete')->get()->first();
                $metodo_show = Permission::where('name', '=', 'metodo-show')->get()->first();
                // para resultados
                $resultado_index = Permission::where('name', '=', 'resultado-index')->get()->first();
                $resultado_create = Permission::where('name', '=', 'resultado-create')->get()->first();
                $resultado_edit = Permission::where('name', '=', 'resultado-edit')->get()->first();
                $resultado_delete = Permission::where('name', '=', 'resultado-delete')->get()->first();
                $resultado_show = Permission::where('name', '=', 'resultado-show')->get()->first();
                // para tutors
                $tutor_index = Permission::where('name', '=', 'tutor-index')->get()->first();
                $tutor_create = Permission::where('name', '=', 'tutor-create')->get()->first();
                $tutor_edit = Permission::where('name', '=', 'tutor-edit')->get()->first();
                $tutor_delete = Permission::where('name', '=', 'tutor-delete')->get()->first();
                $tutor_show = Permission::where('name', '=', 'tutor-show')->get()->first();
                $tutor_export = Permission::where('name', '=', 'tutor-export')->get()->first();




        
        
                // salva os relacionamentos entre perfil e suas permissões
                
                // o administrador tem acesso total ao sistema, incluindo
                // configurações avançadas de desenvolvimento
                $administrador_perfil->permissions()->attach($user_index);
                $administrador_perfil->permissions()->attach($user_create);
                $administrador_perfil->permissions()->attach($user_edit);
                $administrador_perfil->permissions()->attach($user_delete);
                $administrador_perfil->permissions()->attach($user_show);
                $administrador_perfil->permissions()->attach($user_export);
                $administrador_perfil->permissions()->attach($role_index);
                $administrador_perfil->permissions()->attach($role_create);
                $administrador_perfil->permissions()->attach($role_edit);
                $administrador_perfil->permissions()->attach($role_delete);
                $administrador_perfil->permissions()->attach($role_show);
                $administrador_perfil->permissions()->attach($role_export);
                $administrador_perfil->permissions()->attach($permission_index);
                $administrador_perfil->permissions()->attach($permission_create);
                $administrador_perfil->permissions()->attach($permission_edit);
                $administrador_perfil->permissions()->attach($permission_delete);
                $administrador_perfil->permissions()->attach($permission_show);
                $administrador_perfil->permissions()->attach($permission_export);
                $administrador_perfil->permissions()->attach($log_index);
                $administrador_perfil->permissions()->attach($log_show);
                $administrador_perfil->permissions()->attach($log_export);
                $administrador_perfil->permissions()->attach($raca_index);
                $administrador_perfil->permissions()->attach($raca_create);
                $administrador_perfil->permissions()->attach($raca_edit);
                $administrador_perfil->permissions()->attach($raca_delete);
                $administrador_perfil->permissions()->attach($raca_show);
                $administrador_perfil->permissions()->attach($porte_index);
                $administrador_perfil->permissions()->attach($porte_create);
                $administrador_perfil->permissions()->attach($porte_edit);
                $administrador_perfil->permissions()->attach($porte_delete);
                $administrador_perfil->permissions()->attach($porte_show);
                $administrador_perfil->permissions()->attach($cor_index);
                $administrador_perfil->permissions()->attach($cor_create);
                $administrador_perfil->permissions()->attach($cor_edit);
                $administrador_perfil->permissions()->attach($cor_delete);
                $administrador_perfil->permissions()->attach($cor_show);
                $administrador_perfil->permissions()->attach($regional_index);
                $administrador_perfil->permissions()->attach($regional_create);
                $administrador_perfil->permissions()->attach($regional_edit);
                $administrador_perfil->permissions()->attach($regional_delete);
                $administrador_perfil->permissions()->attach($regional_show);
                $administrador_perfil->permissions()->attach($pelo_index);
                $administrador_perfil->permissions()->attach($pelo_create);
                $administrador_perfil->permissions()->attach($pelo_edit);
                $administrador_perfil->permissions()->attach($pelo_delete);
                $administrador_perfil->permissions()->attach($pelo_show);
                $administrador_perfil->permissions()->attach($categoria_index);
                $administrador_perfil->permissions()->attach($categoria_create);
                $administrador_perfil->permissions()->attach($categoria_edit);
                $administrador_perfil->permissions()->attach($categoria_delete);
                $administrador_perfil->permissions()->attach($categoria_show);
                $administrador_perfil->permissions()->attach($metodo_index);
                $administrador_perfil->permissions()->attach($metodo_create);
                $administrador_perfil->permissions()->attach($metodo_edit);
                $administrador_perfil->permissions()->attach($metodo_delete);
                $administrador_perfil->permissions()->attach($metodo_show);
                $administrador_perfil->permissions()->attach($resultado_index);
                $administrador_perfil->permissions()->attach($resultado_create);
                $administrador_perfil->permissions()->attach($resultado_edit);
                $administrador_perfil->permissions()->attach($resultado_delete);
                $administrador_perfil->permissions()->attach($resultado_show);
                $administrador_perfil->permissions()->attach($tutor_index);
                $administrador_perfil->permissions()->attach($tutor_create);
                $administrador_perfil->permissions()->attach($tutor_edit);
                $administrador_perfil->permissions()->attach($tutor_delete);
                $administrador_perfil->permissions()->attach($tutor_show);
                $administrador_perfil->permissions()->attach($tutor_export);             



        
        
                // o gerente (diretor) pode gerenciar os operadores do sistema
                $gerente_perfil->permissions()->attach($user_index);
                $gerente_perfil->permissions()->attach($user_create);
                $gerente_perfil->permissions()->attach($user_edit);
                $gerente_perfil->permissions()->attach($user_show);
                $gerente_perfil->permissions()->attach($user_export);
                $gerente_perfil->permissions()->attach($log_show);
                $gerente_perfil->permissions()->attach($log_show);
                $gerente_perfil->permissions()->attach($log_export);
                $gerente_perfil->permissions()->attach($raca_index);
                $gerente_perfil->permissions()->attach($raca_create);
                $gerente_perfil->permissions()->attach($raca_edit);                
                $gerente_perfil->permissions()->attach($raca_show);
                $gerente_perfil->permissions()->attach($porte_index);
                $gerente_perfil->permissions()->attach($porte_create);
                $gerente_perfil->permissions()->attach($porte_edit);
                $gerente_perfil->permissions()->attach($porte_show);
                $gerente_perfil->permissions()->attach($cor_index);
                $gerente_perfil->permissions()->attach($cor_create);
                $gerente_perfil->permissions()->attach($cor_edit);
                $gerente_perfil->permissions()->attach($cor_show);
                $gerente_perfil->permissions()->attach($regional_index);
                $gerente_perfil->permissions()->attach($regional_create);
                $gerente_perfil->permissions()->attach($regional_edit);
                $gerente_perfil->permissions()->attach($regional_show);
                $gerente_perfil->permissions()->attach($pelo_index);
                $gerente_perfil->permissions()->attach($pelo_create);
                $gerente_perfil->permissions()->attach($pelo_edit);
                $gerente_perfil->permissions()->attach($pelo_show);
                $gerente_perfil->permissions()->attach($categoria_index);
                $gerente_perfil->permissions()->attach($categoria_create);
                $gerente_perfil->permissions()->attach($categoria_edit);
                $gerente_perfil->permissions()->attach($categoria_show);
                $gerente_perfil->permissions()->attach($metodo_index);
                $gerente_perfil->permissions()->attach($metodo_create);
                $gerente_perfil->permissions()->attach($metodo_edit);
                $gerente_perfil->permissions()->attach($metodo_show);
                $gerente_perfil->permissions()->attach($resultado_index);
                $gerente_perfil->permissions()->attach($resultado_create);
                $gerente_perfil->permissions()->attach($resultado_edit);
                $gerente_perfil->permissions()->attach($resultado_show);
                $gerente_perfil->permissions()->attach($tutor_index);
                $gerente_perfil->permissions()->attach($tutor_create);
                $gerente_perfil->permissions()->attach($tutor_edit);
                $gerente_perfil->permissions()->attach($tutor_show);
                $gerente_perfil->permissions()->attach($tutor_export);




        
        
                // o operador é o nível de operação do sistema não pode criar
                // outros operadores
                $operador_perfil->permissions()->attach($user_index);
                $operador_perfil->permissions()->attach($user_show);
                $operador_perfil->permissions()->attach($user_export);
                $operador_perfil->permissions()->attach($raca_index);               
                $operador_perfil->permissions()->attach($raca_show);
                $operador_perfil->permissions()->attach($porte_index);
                $operador_perfil->permissions()->attach($porte_show);
                $operador_perfil->permissions()->attach($cor_index);
                $operador_perfil->permissions()->attach($cor_show);
                $operador_perfil->permissions()->attach($regional_index);
                $operador_perfil->permissions()->attach($regional_show);
                $operador_perfil->permissions()->attach($pelo_index);
                $operador_perfil->permissions()->attach($pelo_show);
                $operador_perfil->permissions()->attach($categoria_index);
                $operador_perfil->permissions()->attach($categoria_show);
                $operador_perfil->permissions()->attach($metodo_index);
                $operador_perfil->permissions()->attach($metodo_show);
                $operador_perfil->permissions()->attach($resultado_index);
                $operador_perfil->permissions()->attach($resultado_create);
                $operador_perfil->permissions()->attach($resultado_show);
                $operador_perfil->permissions()->attach($tutor_index);
                $operador_perfil->permissions()->attach($tutor_create);
                $operador_perfil->permissions()->attach($tutor_edit);
                $operador_perfil->permissions()->attach($tutor_show);
                $operador_perfil->permissions()->attach($tutor_export);


        
        
                // leitura é um tipo de operador que só pode ler
                // os dados na tela
                $leitor_perfil->permissions()->attach($user_index);
                $leitor_perfil->permissions()->attach($user_show);
                $leitor_perfil->permissions()->attach($raca_index);               
                $leitor_perfil->permissions()->attach($raca_show);
                $leitor_perfil->permissions()->attach($porte_index);
                $leitor_perfil->permissions()->attach($porte_show);
                $leitor_perfil->permissions()->attach($cor_index);
                $leitor_perfil->permissions()->attach($cor_show);
                $leitor_perfil->permissions()->attach($regional_index);
                $leitor_perfil->permissions()->attach($regional_show);
                $leitor_perfil->permissions()->attach($pelo_index);
                $leitor_perfil->permissions()->attach($pelo_show);
                $leitor_perfil->permissions()->attach($categoria_index);
                $leitor_perfil->permissions()->attach($categoria_show);
                $leitor_perfil->permissions()->attach($metodo_index);
                $leitor_perfil->permissions()->attach($metodo_show);
                $leitor_perfil->permissions()->attach($resultado_index);
                $leitor_perfil->permissions()->attach($resultado_show);
                $leitor_perfil->permissions()->attach($tutor_index);
                $leitor_perfil->permissions()->attach($tutor_show);
        
        
    }
}
