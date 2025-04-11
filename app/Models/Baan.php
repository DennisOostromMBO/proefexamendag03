<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baan extends Model
{
    use HasFactory;

    protected $table = 'baans';
    public $timestamps = false;
    
    protected $fillable = [
        'nummer',
        'heeft_hek',
        'is_active',
        'opmerking',
    ];

    protected $casts = [
        'nummer' => 'integer',
        'heeft_hek' => 'boolean',
        'is_active' => 'boolean',
        'datum_aangemaakt' => 'datetime',
        'datum_gewijzigd' => 'datetime',
    ];
    
    public function reserveringen()
    {
        return $this->hasMany(Reservering::class, 'baan_id');
    }
}