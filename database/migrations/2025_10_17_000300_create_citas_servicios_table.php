<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('citasServicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('citaId');
            $table->unsignedBigInteger('servicioId');

            $table->foreign('citaId')->references('id')->on('citas')->cascadeOnDelete();
            $table->foreign('servicioId')->references('id')->on('servicios')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citasServicios');
    }
};
