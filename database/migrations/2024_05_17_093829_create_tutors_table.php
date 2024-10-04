<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->id();

            # dados pessoais
            $table->string('cpf', 20);
            $table->string('rg', 20)->nullable();      
            $table->string('nome', 180);
            $table->date('nascimento')->nullable();
            
            # logradouro
            $table->string('logradouro', 190);
            $table->string('numero', 10);
            $table->string('bairro', 120);
            $table->string('complemento', 100)->nullable();
            $table->string('cidade', 80)->default('contagem');
            $table->string('uf', 2)->default('MG');
            $table->string('cep', 20);

            # contatos
            $table->string('email', 190)->nullable();
            $table->string('tel', 20)->nullable();
            $table->string('cel', 20);

            # cartão nacional de saúde
            $table->string('cns', 15)->nullable();

            # notas e observações
            $table->text('nota')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutors');
    }
};
