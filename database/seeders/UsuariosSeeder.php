<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = [
            [
                'nombre' => 'Fernando',
                'apellido' => 'Vallenas',
                'email' => 'vallenasfernando43@gmail.com',
                'telefono' => '+51984123456',
                'password' => Hash::make('admin123'),
                'rol' => 'admin',
                'estado' => 'activo',
                'empresa' => 'ETC Vallenas',
                'cargo' => 'Director General',
                'email_verified_at' => now(),
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Mendoza',
                'email' => 'admin@etcvallenas.com',
                'telefono' => '+51987654321',
                'password' => Hash::make('admin123'),
                'rol' => 'admin',
                'estado' => 'activo',
                'empresa' => 'ETC Vallenas',
                'cargo' => 'Gerente de Operaciones',
                'email_verified_at' => now(),
            ],
            [
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'email' => 'operador@etcvallenas.com',
                'telefono' => '+51976543210',
                'password' => Hash::make('operador123'),
                'rol' => 'operator',
                'estado' => 'activo',
                'empresa' => 'ETC Vallenas',
                'cargo' => 'Operador de Maquinaria',
                'email_verified_at' => now(),
            ],
            [
                'nombre' => 'María',
                'apellido' => 'García',
                'email' => 'cliente@example.com',
                'telefono' => '+51965432109',
                'password' => Hash::make('cliente123'),
                'rol' => 'client',
                'estado' => 'activo',
                'empresa' => 'Constructora ABC SAC',
                'cargo' => 'Jefe de Proyectos',
                'email_verified_at' => now(),
            ],
            [
                'nombre' => 'Roberto',
                'apellido' => 'Silva',
                'email' => 'roberto.silva@mineraxyz.com',
                'telefono' => '+51974321876',
                'password' => Hash::make('cliente123'),
                'rol' => 'client',
                'estado' => 'activo',
                'empresa' => 'Minera XYZ S.A.',
                'cargo' => 'Supervisor de Operaciones',
                'email_verified_at' => now(),
            ],
            [
                'nombre' => 'Ana',
                'apellido' => 'Rodríguez',
                'email' => 'ana.rodriguez@constructoraperu.com',
                'telefono' => '+51983214567',
                'password' => Hash::make('cliente123'),
                'rol' => 'client',
                'estado' => 'activo',
                'empresa' => 'Constructora Perú SAC',
                'cargo' => 'Directora de Proyectos',
                'email_verified_at' => now(),
            ]
        ];

        foreach ($usuarios as $usuario) {
            Usuario::firstOrCreate(
                ['email' => $usuario['email']],
                $usuario
            );
        }

        $this->command->info('✓ Usuarios de prueba creados exitosamente');
        $this->command->info('  Admin: vallenasfernando43@gmail.com / admin123');
        $this->command->info('  Admin: admin@etcvallenas.com / admin123');
        $this->command->info('  Operador: operador@etcvallenas.com / operador123');
        $this->command->info('  Clientes: cliente@example.com / cliente123');
    }
}
