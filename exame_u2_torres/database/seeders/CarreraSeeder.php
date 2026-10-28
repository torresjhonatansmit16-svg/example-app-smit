<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    public function run(): void
    {
        $carreras = [
            ['nombre' => 'Ingeniería de Sistemas', 'codigo' => 'IS001', 'facultad' => 'Ingeniería y Arquitectura', 'duracion_semestres' => 10],
            ['nombre' => 'Ingeniería Civil', 'codigo' => 'IC002', 'facultad' => 'Ingeniería y Arquitectura', 'duracion_semestres' => 10],
            ['nombre' => 'Administración', 'codigo' => 'AD003', 'facultad' => 'Ciencias Económicas, Administrativas y Contables', 'duracion_semestres' => 10],
            ['nombre' => 'Contabilidad', 'codigo' => 'CO004', 'facultad' => 'Ciencias Económicas, Administrativas y Contables', 'duracion_semestres' => 10],
            ['nombre' => 'Derecho', 'codigo' => 'DE005', 'facultad' => 'Ciencias Sociales y Humanidades', 'duracion_semestres' => 12],
        ];

        foreach ($carreras as $carrera) {
            Carrera::updateOrCreate(['codigo' => $carrera['codigo']], $carrera);
        }
    }
}
