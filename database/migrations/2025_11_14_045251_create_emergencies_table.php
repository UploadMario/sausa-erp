<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('patient_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->dateTime('fecha'); // <-- ESTA ES LA QUE FALTABA
            $table->text('diagnostico');
            $table->string('estado');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emergencies');
    }
};
