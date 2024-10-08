<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(ThemeSeeder::class);

        $this->call(PerpageSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(PermissionSeeder::class);

        $this->call(RoleSeeder::class);

        $this->call(RacaSeeder::class);

        $this->call(PorteSeeder::class);

        $this->call(CorSeeder::class);

        $this->call(RegionalSeeder::class);

        $this->call(PeloSeeder::class);

        $this->call(CategoriaSeeder::class);


            //

        $this->call(MetodoSeeder::class);

        $this->call(ResultadoSeeder::class);



        $this->call(AclSeeder::class);


        // \App\Models\User::factory(50)->create();

        // \App\Models\Permission::factory(50)->create();

        // \App\Models\Role::factory(50)->create();
    }
}
