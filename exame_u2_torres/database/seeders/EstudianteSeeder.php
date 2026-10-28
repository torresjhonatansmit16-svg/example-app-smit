<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Estudiante;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    public function run(): void
    {
        $datos = [
            ['carrera' => 'IS001', 'codigo' => 'EST001', 'nombres' => 'Ana María', 'apellidos' => 'Quispe Huamán', 'email' => 'ana.quispe@example.com', 'fecha_nacimiento' => '2004-03-15'],
            ['carrera' => 'IS001', 'codigo' => 'EST002', 'nombres' => 'Luis Alberto', 'apellidos' => 'Mamani Flores', 'email' => 'luis.mamani@example.com', 'fecha_nacimiento' => '2003-07-21'],
            ['carrera' => 'IS001', 'codigo' => 'EST003', 'nombres' => 'Carla Sofía', 'apellidos' => 'Rojas Pérez', 'email' => 'carla.rojas@example.com', 'fecha_nacimiento' => '2004-11-09'],
            ['carrera' => 'IC002', 'codigo' => 'EST004', 'nombres' => 'Diego Andrés', 'apellidos' => 'Soto Cárdenas', 'email' => 'diego.soto@example.com', 'fecha_nacimiento' => '2003-01-18'],
            ['carrera' => 'IC002', 'codigo' => 'EST005', 'nombres' => 'María Fernanda', 'apellidos' => 'Vargas León', 'email' => 'maria.vargas@example.com', 'fecha_nacimiento' => '2004-06-30'],
            ['carrera' => 'IC002', 'codigo' => 'EST006', 'nombres' => 'José Miguel', 'apellidos' => 'Paredes Soto', 'email' => 'jose.paredes@example.com', 'fecha_nacimiento' => '2002-12-04'],
            ['carrera' => 'AD003', 'codigo' => 'EST007', 'nombres' => 'Lucía Isabel', 'apellidos' => 'Chávez Ramos', 'email' => 'lucia.chavez@example.com', 'fecha_nacimiento' => '2004-02-11'],
            ['carrera' => 'AD003', 'codigo' => 'EST008', 'nombres' => 'Pedro Daniel', 'apellidos' => 'García Torres', 'email' => 'pedro.garcia@example.com', 'fecha_nacimiento' => '2003-09-25'],
            ['carrera' => 'AD003', 'codigo' => 'EST009', 'nombres' => 'Rosa Elena', 'apellidos' => 'Huillca Soto', 'email' => 'rosa.huillca@example.com', 'fecha_nacimiento' => '2004-04-02'],
            ['carrera' => 'CO004', 'codigo' => 'EST010', 'nombres' => 'Marco Antonio', 'apellidos' => 'Salas Ríos', 'email' => 'marco.salas@example.com', 'fecha_nacimiento' => '2003-05-17'],
            ['carrera' => 'CO004', 'codigo' => 'EST011', 'nombres' => 'Diana Patricia', 'apellidos' => 'Flores Quispe', 'email' => 'diana.flores@example.com', 'fecha_nacimiento' => '2004-08-12'],
            ['carrera' => 'CO004', 'codigo' => 'EST012', 'nombres' => 'Jorge Luis', 'apellidos' => 'Cruz Huamán', 'email' => 'jorge.cruz@example.com', 'fecha_nacimiento' => '2003-10-07'],
            ['carrera' => 'DE005', 'codigo' => 'EST013', 'nombres' => 'Valeria Milagros', 'apellidos' => 'Puma Sucso', 'email' => 'valeria.puma@example.com', 'fecha_nacimiento' => '2004-01-29'],
            ['carrera' => 'DE005', 'codigo' => 'EST014', 'nombres' => 'Renato Javier', 'apellidos' => 'Arias Mendoza', 'email' => 'renato.arias@example.com', 'fecha_nacimiento' => '2003-06-06'],
            ['carrera' => 'DE005', 'codigo' => 'EST015', 'nombres' => 'Gabriela Nicole', 'apellidos' => 'Sánchez Lima', 'email' => 'gabriela.sanchez@example.com', 'fecha_nacimiento' => '2004-12-19'],
        ];

        foreach ($datos as $dato) {
            $carrera = Carrera::where('codigo', $dato['carrera'])->firstOrFail();
            unset($dato['carrera']);
            Estudiante::updateOrCreate(['codigo' => $dato['codigo']], [
                ...$dato,
                'carrera_id' => $carrera->id,
            ]);
        }
    }
}
