<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('redacao_motivadores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tema_id')->constrained('redacao_temas')->cascadeOnDelete();
            $table->text('texto')->nullable();
            $table->string('imagem')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('redacao_motivadores');
    }
};
