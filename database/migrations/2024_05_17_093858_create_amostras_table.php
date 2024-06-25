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
        Schema::create('amostras', function (Blueprint $table) {
            $table->id();
            $table->string('descricao')->nullable();
            $table->date('entrada');
            $table->date('coleta');
            $table->string('numero');
            $table->string('idade')->nullable();
            $table->string('tipo')->nullable();
            $table->foreignId('categoria_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('animal_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('amostras', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
            $table->dropForeign(['animal_id']);
        });

        Schema::dropIfExists('amostras');
    }
};
