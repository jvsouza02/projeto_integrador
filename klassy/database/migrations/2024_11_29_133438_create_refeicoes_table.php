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
        Schema::create('refeicoes', function (Blueprint $table) {
            $table->id("idRefeicao");
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->string('categoria');
            $table->decimal('preco', 10, 2);
            $table->boolean('disponivel')->default(false);
            $table->string('imagem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refeicoes');
    }
};
