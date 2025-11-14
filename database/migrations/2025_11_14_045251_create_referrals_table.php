<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('destino');
            $table->dateTime('fecha'); // <-- CORREGIDO
            $table->text('motivo')->nullable();
            $table->string('tipo')->default('Referencia');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
