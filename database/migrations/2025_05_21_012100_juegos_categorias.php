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
        Schema::create('juegos_has_categorias', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreignId('juego_id')  
                  ->constrained('juegos')  
                  ->onUpdate('cascade');
            $table->foreignId('categoria_id')  
                  ->constrained('categorias') 
                  ->onUpdate('cascade');
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
