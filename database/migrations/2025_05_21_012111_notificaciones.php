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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id()->unique();
            $table->enum('tipo_notificacion', ['reserva_confirmada', 'reserva_cancelada', 'pago_confirmado']);
            $table->string('mensaje', 300);
            $table->enum('metodo_envio', ['email', 'sms']);
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
