<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('extramurals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('set null');

            $table->string('nombre_actividad');
            $table->string('tipo'); // visita, campaña, seguimiento
            $table->date('fecha');
            $table->text('descripcion')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('extramurals');
    }
};
