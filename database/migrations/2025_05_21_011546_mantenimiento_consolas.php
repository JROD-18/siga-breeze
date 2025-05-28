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
  
Schema::create('mantenimiento_consolas', function (Blueprint $table) {
    $table->id()->unique()->unique();
    $table->foreignId('consola_id')  
          ->constrained('consolas')  
          ->onUpdate('cascade');
    $table->foreignId('empleado_id') 
          ->constrained('empleados') 
          ->onUpdate('cascade');
    $table->date('fecha_mantenimiento');
    $table->string('descripcion_mantenimiento', 500);
    $table->tinyInteger('estatus_mantenimiento');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
