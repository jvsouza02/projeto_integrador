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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id("idReserva");
            $table->foreignId('idCliente')->nullable()->references('idCliente')->on('clientes')->onDelete('cascade');
            $table->foreignId('idMesa')->references('idMesa')->on('mesas');
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->date('data');
            $table->string('hora');
            $table->string('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
