<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('altas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->dateTime('fecha_salida'); // <-- CORREGIDO
            $table->text('motivo')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('altas');
    }
};
