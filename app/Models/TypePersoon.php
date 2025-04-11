<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePersoon extends Model
{
    use HasFactory;

    protected $table = 'type_persoons';
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
    
    public function personen()
    {
        return $this->hasMany(Persoon::class);
    }
}