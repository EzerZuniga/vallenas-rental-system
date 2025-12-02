<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServiciosSeeder extends Seeder
{
    public function run(): void
    {
        $servicios = [
            [
                'codigo' => 'SER-ALQ-0001',
                'nombre' => 'Alquiler de Maquinaria Pesada',
                'tipo' => 'alquiler_maquinaria',
                'categoria' => 'Principal',
                'descripcion_corta' => 'Alquiler de equipos de construcción y minería con operadores certificados',
                'descripcion_completa' => 'Ofrecemos una amplia flota de maquinaria pesada para alquiler con operadores altamente capacitados. Nuestros equipos están en óptimas condiciones y cumplen con todos los estándares de seguridad.',
                'precio_base' => 120.00,
                'precio_por_hora' => 150.00,
                'precio_por_dia' => 1000.00,
                'precio_por_semana' => 6000.00,
                'precio_por_mes' => 22000.00,
                'disponibilidad' => 'disponible',
                'estado' => 'activo',
                'caracteristicas' => json_encode([
                    'Operadores certificados',
                    'Mantenimiento incluido',
                    'Seguro incluido',
                    'Soporte 24/7'
                ]),
                'beneficios' => json_encode([
                    'Equipos en óptimas condiciones',
                    'Flexibilidad en períodos de alquiler',
                    'Asesoría técnica gratuita'
                ]),
                'requisitos' => json_encode([
                    'Documento de identidad',
                    'Comprobante de domicilio',
                    'Garantía bancaria o depósito'
                ]),
                'tiempo_respuesta_horas' => 24,
                'zonas_cobertura' => json_encode(['Lima', 'Callao', 'Arequipa', 'Cusco']),
            ],
            [
                'codigo' => 'SER-OPE-0001',
                'nombre' => 'Servicio de Operadores Certificados',
                'tipo' => 'operador',
                'categoria' => 'Personal',
                'descripcion_corta' => 'Personal capacitado para operación de maquinaria pesada',
                'descripcion_completa' => 'Contamos con operadores certificados con amplia experiencia en manejo de maquinaria pesada para construcción y minería.',
                'precio_por_hora' => 45.00,
                'precio_por_dia' => 350.00,
                'precio_por_semana' => 2100.00,
                'precio_por_mes' => 7500.00,
                'disponibilidad' => 'disponible',
                'estado' => 'activo',
                'caracteristicas' => json_encode([
                    'Certificados vigentes',
                    'Experiencia comprobada',
                    'Seguro de responsabilidad civil'
                ]),
                'tiempo_respuesta_horas' => 48,
                'zonas_cobertura' => json_encode(['Lima', 'Callao']),
            ],
            [
                'codigo' => 'SER-MAN-0001',
                'nombre' => 'Mantenimiento Preventivo y Correctivo',
                'tipo' => 'mantenimiento',
                'categoria' => 'Soporte',
                'descripcion_corta' => 'Servicio de mantenimiento especializado para maquinaria pesada',
                'descripcion_completa' => 'Realizamos mantenimiento preventivo y correctivo para todo tipo de maquinaria pesada, garantizando su óptimo funcionamiento.',
                'precio_base' => 200.00,
                'precio_por_hora' => 80.00,
                'disponibilidad' => 'disponible',
                'estado' => 'activo',
                'caracteristicas' => json_encode([
                    'Técnicos certificados',
                    'Repuestos originales',
                    'Diagnóstico computarizado'
                ]),
                'tiempo_respuesta_horas' => 12,
                'zonas_cobertura' => json_encode(['Lima', 'Callao', 'Ica']),
            ],
            [
                'codigo' => 'SER-TRA-0001',
                'nombre' => 'Transporte de Maquinaria',
                'tipo' => 'transporte',
                'categoria' => 'Logística',
                'descripcion_corta' => 'Servicio de transporte especializado para equipos pesados',
                'descripcion_completa' => 'Transportamos maquinaria pesada con camas bajas especializadas y todos los permisos necesarios.',
                'precio_base' => 500.00,
                'disponibilidad' => 'disponible',
                'estado' => 'activo',
                'caracteristicas' => json_encode([
                    'Camas bajas especializadas',
                    'Permisos vigentes',
                    'Seguro de carga'
                ]),
                'tiempo_respuesta_horas' => 48,
                'zonas_cobertura' => json_encode(['Lima', 'Callao', 'Ica', 'Arequipa']),
            ],
            [
                'codigo' => 'SER-CON-0001',
                'nombre' => 'Consultoría y Asesoramiento',
                'tipo' => 'consultoria',
                'categoria' => 'Servicios Profesionales',
                'descripcion_corta' => 'Asesoría especializada en proyectos de construcción',
                'descripcion_completa' => 'Brindamos consultoría técnica para optimizar el uso de maquinaria en proyectos de construcción y minería.',
                'precio_por_hora' => 150.00,
                'precio_por_dia' => 1000.00,
                'disponibilidad' => 'limitado',
                'estado' => 'activo',
                'caracteristicas' => json_encode([
                    'Ingenieros especializados',
                    'Análisis de rentabilidad',
                    'Optimización de recursos'
                ]),
                'tiempo_respuesta_horas' => 72,
                'zonas_cobertura' => json_encode(['Todo el Perú']),
            ],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }

        $this->command->info('✓ Servicios creados exitosamente');
        $this->command->info('  ' . count($servicios) . ' servicios registrados');
    }
}
