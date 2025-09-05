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
        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
          
            $table->string('name',100);
            $table->string('titulo',190);
            $table->string('slogan',100);
            $table->text('descripcion');
            $table->string('seo');
            $table->string('logo');
            $table->string('logo2');
            $table->text('direccion');
            $table->string('celular',11);
            $table->string('email');
            $table->string('favicon',100);
            $table->string('facebook',100)->nullable();
            $table->string('tiktok',100)->nullable();
            $table->string('instagram',100)->nullable();
            $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfils');
    }
};