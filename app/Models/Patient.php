<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dni',
        'age',
        'phone',
        'address'
    ];

    // === Relaciones con los módulos ===

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }

    public function emergencies()
    {
        return $this->hasMany(Emergency::class);
    }

    public function extramurals()
    {
        return $this->hasMany(Extramural::class);
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }

    public function altas()
    {
        return $this->hasMany(Alta::class);
    }
}
