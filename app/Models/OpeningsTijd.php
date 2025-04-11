<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningsTijd extends Model
{
    use HasFactory;

    protected $table = 'openings_tijds';
    public $timestamps = false;

    protected $fillable = [
        'dag_naam',
        'begin_tijd',
        'eind_tijd',
        'is_active',
        'opmerking',
    ];

    protected $casts = [
        'begin_tijd' => 'datetime',
        'eind_tijd' => 'datetime',
        'is_active' => 'boolean',
        'datum_aangemaakt' => 'datetime',
        'datum_gewijzigd' => 'datetime',
    ];

    public function reserveringen()
    {
        return $this->hasMany(Reservering::class, 'openingstijd_id');
    }
}
