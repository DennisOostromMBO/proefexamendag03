<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveringStatus extends Model
{
    use HasFactory;

    protected $table = 'reserveringstatussen';
    public $timestamps = false;

    protected $fillable = [
        'naam',
        'is_active',
        'opmerking',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'datum_aangemaakt' => 'datetime',
        'datum_gewijzigd' => 'datetime',
    ];

    public function reserveringen()
    {
        return $this->hasMany(Reservering::class, 'reservering_status_id');
    }
}
