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
        Schema::create('medicamentorecetado', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_cita');
            $table->unsignedBigInteger('id_medicamento');
            $table->integer('cantidad');
            $table->double('unidad');
            $table->string('cadacuanto');
            $table->string('porcuantosdias');

            $table->foreign('id_cita')->references('id')->on('citas');
            $table->foreign('id_medicamento')->references('id')->on('medicamentos');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentorecetado');
    }
};
