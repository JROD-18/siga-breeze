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
        Schema::create('juegos', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nombre_juego', 500);
            $table->string('descripcion', 500);
            $table->string('consolas_compatibles', 500);
            $table->integer('ano_juego');
            $table->string('categoria', 45);
            $table->enum('dificultad', ['facil', 'medio', 'dificil']);
            $table->tinyInteger('estatus_juego');
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
