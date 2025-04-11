<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persoon extends Model
{
    use HasFactory;

    protected $table = 'persoons';
    public $timestamps = false;

    protected $fillable = [
        'type_persoon_id',
        'voornaam',
        'tussenvoegsel',
        'achternaam',
        'roepnaam',
        'is_volwassen',
        'is_active',
        'opmerking',
    ];

    protected $casts = [
        'is_volwassen' => 'boolean',
        'is_active' => 'boolean',
        'datum_aangemaakt' => 'datetime',
        'datum_gewijzigd' => 'datetime',
    ];

    public function typePersoon()
    {
        return $this->belongsTo(TypePersoon::class);
    }

    public function reserveringen()
    {
        return $this->hasMany(Reservering::class, 'persoon_id');
    }

    public function getFullNameAttribute()
    {
        return $this->voornaam . ($this->tussenvoegsel ? " {$this->tussenvoegsel}" : "") . " {$this->achternaam}";
    }
}
