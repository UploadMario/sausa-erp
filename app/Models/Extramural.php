<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extramural extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'nombre_actividad',
        'tipo',
        'fecha',
        'descripcion'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
