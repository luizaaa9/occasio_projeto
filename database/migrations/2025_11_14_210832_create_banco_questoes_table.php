<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questoes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('disciplina_id')
                ->constrained('disciplinas')
                ->onDelete('cascade');

            $table->foreignId('conteudo_id')
                ->nullable()
                ->constrained('conteudos')
                ->onDelete('set null');

            $table->enum('nivel', ['facil', 'medio', 'dificil'])
                ->default('medio');

            $table->text('enunciado');
            $table->string('imagem')->nullable();

            $table->string('alternativa_a');
            $table->string('alternativa_b');
            $table->string('alternativa_c');
            $table->string('alternativa_d');
            $table->string('alternativa_e');

            $table->enum('correta', ['a','b','c','d','e']);

            $table->text('explicacao')->nullable();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questoes');
    }
};
