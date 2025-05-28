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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            $table->foreignId('reserva_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict')
                  ->nullable();
            $table->decimal('monto', 10, 2);
            $table->string('metodo_pago', 50); // 'tarjeta', 'transferencia', 'efectivo'
            $table->string('referencia', 100)->nullable(); // N° de transacción
            $table->date('fecha_pago');
            $table->enum('estado', ['pendiente', 'completado', 'rechazado', 'reembolsado']);
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
