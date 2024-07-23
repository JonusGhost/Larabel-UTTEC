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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_paciente');
            $table->date('fecha');
            $table->string('observaciones');
            $table->string('estado');
            $table->string('medicamentos');
            $table->unsignedBigInteger('id_consultorio')->nullable();
            $table->unsignedBigInteger('id_doctor')->nullable();
            $table->unsignedBigInteger('id_especialidad');

            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_consultorio')->references('id')->on('consultorios');
            $table->foreign('id_doctor')->references('id')->on('doctores');
            $table->foreign('id_especialidad')->references('id')->on('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
