<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;

class SeatSeeder extends Seeder
{
    public function run()
    {
        // Asientos a la izquierda (numeración única)
        for ($i = 1; $i <= 16; $i++) {
            Seat::create([
                'number' => $i,
                'side' => 'left',
                'status' => 'empty',
                'idreserva' => null,  // Asegúrate de asignar 'null' si es opcional
            ]);
        }

        // Asientos a la derecha (numeración continua después de los de la izquierda)
        for ($i = 17; $i <= 32; $i++) {
            Seat::create([
                'number' => $i,
                'side' => 'right',
                'status' => 'empty',
                'idreserva' => null,  // Asignar 'null' o un valor válido según sea necesario
            ]);
        }

        // Asiento al final del pasillo
        Seat::create([
            'number' => 33,
            'side' => 'back',
            'status' => 'empty',
            'idreserva' => null,  // Asignar 'null' o un valor válido según sea necesario
        ]);
    }
}
