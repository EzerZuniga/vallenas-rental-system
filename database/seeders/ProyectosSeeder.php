<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;

class ProyectosSeeder extends Seeder
{
    public function run(): void
    {
        $proyectos = [
            [
                'codigo' => 'PRO-2024-001',
                'nombre' => 'Construcción Centro Comercial Mall Plaza',
                'cliente' => 'Constructora ABC SAC',
                'tipo' => 'construccion',
                'descripcion' => 'Construcción de centro comercial de 5 niveles en San Isidro',
                'ubicacion' => 'San Isidro, Lima',
                'fecha_inicio' => '2024-01-15',
                'fecha_estimada_fin' => '2024-12-31',
                'estado' => 'en_progreso',
                'presupuesto' => 5500000.00,
                'progreso' => 65,
            ],
            [
                'codigo' => 'PRO-2024-002',
                'nombre' => 'Excavación Proyecto Minero Toquepala',
                'cliente' => 'Minera XYZ S.A.',
                'tipo' => 'mineria',
                'descripcion' => 'Trabajos de excavación y movimiento de tierras en zona minera',
                'ubicacion' => 'Tacna',
                'fecha_inicio' => '2024-03-01',
                'fecha_estimada_fin' => '2025-06-30',
                'estado' => 'en_progreso',
                'presupuesto' => 8900000.00,
                'progreso' => 45,
            ],
            [
                'codigo' => 'PRO-2023-015',
                'nombre' => 'Carretera Interoceánica Tramo 3',
                'cliente' => 'Gobierno Regional de Cusco',
                'tipo' => 'infraestructura',
                'descripcion' => 'Construcción y asfaltado de 25km de carretera',
                'ubicacion' => 'Cusco',
                'fecha_inicio' => '2023-06-01',
                'fecha_estimada_fin' => '2024-05-31',
                'fecha_fin' => '2024-06-15',
                'estado' => 'completado',
                'presupuesto' => 12000000.00,
                'progreso' => 100,
            ],
            [
                'codigo' => 'PRO-2024-008',
                'nombre' => 'Complejo Habitacional Los Jardines',
                'cliente' => 'Inmobiliaria Horizonte',
                'tipo' => 'construccion',
                'descripcion' => 'Construcción de 8 torres residenciales',
                'ubicacion' => 'Surco, Lima',
                'fecha_inicio' => '2024-04-15',
                'fecha_estimada_fin' => '2025-12-31',
                'estado' => 'en_progreso',
                'presupuesto' => 15000000.00,
                'progreso' => 35,
            ],
            [
                'codigo' => 'PRO-2024-011',
                'nombre' => 'Remodelación Hospital Nacional',
                'cliente' => 'Ministerio de Salud',
                'tipo' => 'infraestructura',
                'descripcion' => 'Remodelación y ampliación de infraestructura hospitalaria',
                'ubicacion' => 'Arequipa',
                'fecha_inicio' => '2024-07-01',
                'fecha_estimada_fin' => '2025-03-31',
                'estado' => 'en_progreso',
                'presupuesto' => 6500000.00,
                'progreso' => 25,
            ],
        ];

        foreach ($proyectos as $proyecto) {
            Proyecto::create($proyecto);
        }

        $this->command->info('✓ Proyectos creados exitosamente');
        $this->command->info('  ' . count($proyectos) . ' proyectos registrados');
    }
}
