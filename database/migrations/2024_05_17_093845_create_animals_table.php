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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->enum('genero', ['M', 'F']);
            $table->text('descricao')->nullable();
            $table->string('chip')->nullable();
            $table->foreignId('raca_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('porte_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('cor_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('regional_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('tutor_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('pelo_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropForeign(['raca_id']);
            $table->dropForeign(['porte_id']);
            $table->dropForeign(['cor_id']);
            $table->dropForeign(['regional_id']);
            $table->dropForeign(['tutor_id']);
            $table->dropForeign(['pelo_id']);
        });

        Schema::dropIfExists('animals');
    }
};
