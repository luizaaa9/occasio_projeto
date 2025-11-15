<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('simulados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('tipo',['dia1','dia2']);
            $table->timestamp('inicio')->nullable();
            $table->timestamp('fim')->nullable();
            $table->integer('duracao_minutos')->nullable(); 
            $table->boolean('encerrado')->default(false);
            $table->foreignId('redacao_tema_id')->nullable()->constrained('redacao_temas')->nullOnDelete();
            $table->text('redacao_texto')->nullable();
            $table->integer('nota_redacao')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('simulados');
    }
};
