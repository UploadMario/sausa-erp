<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'destino',
        'fecha_referencia',
        'motivo',
        'tipo',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
