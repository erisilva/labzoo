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
        Schema::create('exames', function (Blueprint $table) {
            $table->id();
            $table->date('validade');
            $table->date('conclusao')->nullable();
            $table->string('partida');
            $table->foreignId('amostra_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('metodo_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('resultado_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exames', function (Blueprint $table) {
            $table->dropForeign(['amostra_id']);
            $table->dropForeign(['metodo_id']);
            $table->dropForeign(['resultado_id']);
        });

        Schema::dropIfExists('exames');
    }
};
