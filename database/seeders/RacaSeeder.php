<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RacaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('racas')->insert(['id' => 3,'nome' => 'Akita']);
        DB::table('racas')->insert(['id' => 4,'nome' => 'Pastor Alemao']);
        DB::table('racas')->insert(['id' => 6,'nome' => 'Srd']);
        DB::table('racas')->insert(['id' => 7,'nome' => 'Afghan Hound']);
        DB::table('racas')->insert(['id' => 9,'nome' => 'Basset Hound']);
        DB::table('racas')->insert(['id' => 10,'nome' => 'Beagle']);
        DB::table('racas')->insert(['id' => 11,'nome' => 'Bichon Frise']);
        DB::table('racas')->insert(['id' => 12,'nome' => 'Border Colie']);
        DB::table('racas')->insert(['id' => 13,'nome' => 'Boxer']);
        DB::table('racas')->insert(['id' => 14,'nome' => 'Buldogue']);
        DB::table('racas')->insert(['id' => 15,'nome' => 'Bulmastife']);
        DB::table('racas')->insert(['id' => 16,'nome' => 'Bulterrier']);
        DB::table('racas')->insert(['id' => 17,'nome' => 'Chihuahua']);
        DB::table('racas')->insert(['id' => 18,'nome' => 'Chow Chow']);
        DB::table('racas')->insert(['id' => 19,'nome' => 'Cocker Spaniel']);
        DB::table('racas')->insert(['id' => 20,'nome' => 'Colie']);
        DB::table('racas')->insert(['id' => 21,'nome' => 'Dalmata']);
        DB::table('racas')->insert(['id' => 23,'nome' => 'Dogue Alemao']);
        DB::table('racas')->insert(['id' => 24,'nome' => 'Dogue Argentino']);
        DB::table('racas')->insert(['id' => 25,'nome' => 'Dogue Brasileiro']);
        DB::table('racas')->insert(['id' => 26,'nome' => 'Fila Brasileiro']);
        DB::table('racas')->insert(['id' => 27,'nome' => 'Fox Terrier']);
        DB::table('racas')->insert(['id' => 28,'nome' => 'Fox Paulistinha']);
        DB::table('racas')->insert(['id' => 29,'nome' => 'Golden Retriever']);
        DB::table('racas')->insert(['id' => 30,'nome' => 'Husky Siberiano']);
        DB::table('racas')->insert(['id' => 31,'nome' => 'Labrador']);
        DB::table('racas')->insert(['id' => 32,'nome' => 'Lhasa Apso']);
        DB::table('racas')->insert(['id' => 33,'nome' => 'Maltes']);
        DB::table('racas')->insert(['id' => 34,'nome' => 'Mastife Ingles']);
        DB::table('racas')->insert(['id' => 35,'nome' => 'Mantim Napolitano']);
        DB::table('racas')->insert(['id' => 37,'nome' => 'Pastor Belga']);
        DB::table('racas')->insert(['id' => 38,'nome' => 'Pequines']);
        DB::table('racas')->insert(['id' => 39,'nome' => 'Pinscher']);
        DB::table('racas')->insert(['id' => 40,'nome' => 'Pointer']);
        DB::table('racas')->insert(['id' => 41,'nome' => 'Poodle']);
        DB::table('racas')->insert(['id' => 42,'nome' => 'Pug']);
        DB::table('racas')->insert(['id' => 43,'nome' => 'Rottweiler']);
        DB::table('racas')->insert(['id' => 44,'nome' => 'Sao Bernardo']);
        DB::table('racas')->insert(['id' => 45,'nome' => 'Schnauzer']);
        DB::table('racas')->insert(['id' => 46,'nome' => 'Seter']);
        DB::table('racas')->insert(['id' => 47,'nome' => 'Shih Tzu']);
        DB::table('racas')->insert(['id' => 48,'nome' => 'Shar Pei']);
        DB::table('racas')->insert(['id' => 49,'nome' => 'Nao Informada']);
        DB::table('racas')->insert(['id' => 50,'nome' => 'Dachshund']);
        DB::table('racas')->insert(['id' => 51,'nome' => 'Weimaraner']);
        DB::table('racas')->insert(['id' => 52,'nome' => 'Yorkshire']);
        DB::table('racas')->insert(['id' => 53,'nome' => 'Doberman']);
        DB::table('racas')->insert(['id' => 54,'nome' => 'Pitbull']);
        DB::table('racas')->insert(['id' => 55,'nome' => 'Perdigueiro']);
        DB::table('racas')->insert(['id' => 56,'nome' => 'Sheepdog']);
        DB::table('racas')->insert(['id' => 57,'nome' => 'Outra']);
        DB::table('racas')->insert(['id' => 58,'nome' => 'American Bully']);
    }
}
