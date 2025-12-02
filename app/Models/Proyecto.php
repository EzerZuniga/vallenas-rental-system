<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $fillable = [
        'nombre',
        'codigo',
        'tipo',
        'descripcion',
        'cliente',
        'contacto_cliente',
        'email_cliente',
        'telefono_cliente',
        'ubicacion',
        'direccion',
        'coordenadas',
        'fecha_inicio',
        'fecha_fin',
        'fecha_estimada_fin',
        'duracion_dias',
        'estado',
        'prioridad',
        'presupuesto',
        'costo_actual',
        'moneda',
        'responsable_id',
        'responsable_nombre',
        'equipo',
        'maquinaria_ids',
        'maquinaria_detalles',
        'servicios_incluidos',
        'hitos',
        'avance_porcentaje',
        'imagenes',
        'documentos',
        'notas',
        'riesgos',
        'certificaciones_requeridas',
    ];

    protected function casts(): array
    {
        return [
            'coordenadas' => 'array',
            'fecha_inicio' => 'datetime',
            'fecha_fin' => 'datetime',
            'fecha_estimada_fin' => 'datetime',
            'presupuesto' => 'decimal:2',
            'costo_actual' => 'decimal:2',
            'equipo' => 'array',
            'maquinaria_ids' => 'array',
            'maquinaria_detalles' => 'array',
            'servicios_incluidos' => 'array',
            'hitos' => 'array',
            'imagenes' => 'array',
            'documentos' => 'array',
            'notas' => 'array',
            'riesgos' => 'array',
            'certificaciones_requeridas' => 'array',
            'avance_porcentaje' => 'integer',
            'duracion_dias' => 'integer',
        ];
    }

    public function getMainImageAttribute(): string
    {
        if (!empty($this->imagenes) && isset($this->imagenes[0])) {
            return asset('storage/proyectos/' . $this->imagenes[0]);
        }

        return asset('assets/images/proyecto-placeholder.jpg');
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->estado) {
            'planificacion' => 'bg-info',
            'en_progreso' => 'bg-primary',
            'pausado' => 'bg-warning',
            'completado' => 'bg-success',
            'cancelado' => 'bg-danger',
            default => 'bg-secondary',
        };
    }

    public function getPriorityBadgeClassAttribute(): string
    {
        return match ($this->prioridad) {
            'alta' => 'bg-danger',
            'media' => 'bg-warning',
            'baja' => 'bg-info',
            default => 'bg-secondary',
        };
    }

    public function getBudgetStatusAttribute(): string
    {
        if (!$this->presupuesto || !$this->costo_actual) {
            return 'sin_datos';
        }

        $percentage = ($this->costo_actual / $this->presupuesto) * 100;

        if ($percentage <= 75) {
            return 'en_presupuesto';
        } elseif ($percentage <= 90) {
            return 'proximo_limite';
        } else {
            return 'sobre_presupuesto';
        }
    }

    public function getDaysRemainingAttribute(): ?int
    {
        if (!$this->fecha_estimada_fin) {
            return null;
        }

        return now()->diffInDays($this->fecha_estimada_fin, false);
    }

    public function responsable()
    {
        return $this->belongsTo(Usuario::class, 'responsable_id');
    }

    public function maquinaria()
    {
        return $this->belongsToMany(Maquinaria::class, null, 'proyecto_ids', 'maquinaria_ids');
    }

    public function isActive(): bool
    {
        return $this->estado === 'en_progreso';
    }

    public function isCompleted(): bool
    {
        return $this->estado === 'completado';
    }

    public function isDelayed(): bool
    {
        if (!$this->fecha_estimada_fin) {
            return false;
        }

        return now()->greaterThan($this->fecha_estimada_fin) && !$this->isCompleted();
    }

    public function scopeActive($query)
    {
        return $query->where('estado', 'en_progreso');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('tipo', $type);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('estado', $status);
    }
}
