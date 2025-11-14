<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'reason',
        'diagnosis',
        'status',
    ];

    // Relación con Paciente
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
