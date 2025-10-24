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
    Schema::create('exercicios', function (Blueprint $table) {
        $table->id();
        $table->foreignId('conteudo_id')->constrained('conteudos')->onDelete('cascade');
        $table->enum('nivel_dificuldade', ['Fácil', 'Médio', 'Difícil']);
        $table->text('enunciado');
        $table->string('opcao_a');
        $table->string('opcao_b');
        $table->string('opcao_c');
        $table->string('opcao_d');
        $table->string('opcao_e');
        $table->enum('resposta', ['A', 'B', 'C', 'D', 'E']); 
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercicios');
    }
};
