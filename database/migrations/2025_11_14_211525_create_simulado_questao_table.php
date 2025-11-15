<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('simulado_questao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('simulado_id')->constrained('simulados')->cascadeOnDelete();
            $table->foreignId('questao_id')->constrained('questoes')->cascadeOnDelete();
            $table->enum('resposta',['a','b','c','d','e'])->nullable();
            $table->boolean('correta')->nullable();
            $table->integer('ordem')->nullable(); 
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('simulado_questao');
    }
};
