<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservering extends Model
{
    use HasFactory;
// Wassim
    protected $table = 'reserveringen';
    public $timestamps = false;

    protected $fillable = [
        'persoon_id',
        'openingstijd_id',
        'baan_id',
        'pakketoptie_id',
        'reservering_status',
        'reserveringsnummer',
        'datum',
        'aantal_uren',
        'begin_tijd',
        'eind_tijd',
        'aantal_volwassen',
        'aantal_kinderen',
    ];

    protected $casts = [
        'datum' => 'date',
        'begin_tijd' => 'datetime',
        'eind_tijd' => 'datetime',
        'aantal_uren' => 'integer',
        'aantal_volwassen' => 'integer',
        'aantal_kinderen' => 'integer',
        'datum_aangemaakt' => 'datetime',
        'datum_gewijzigd' => 'datetime',
    ];

    public function persoon()
    {
        return $this->belongsTo(Persoon::class, 'persoon_id');
    }

    public function openingsTijd()
    {
        return $this->belongsTo(OpeningsTijd::class, 'openingstijd_id');
    }

    public function baan()
    {
        return $this->belongsTo(Baan::class, 'baan_id');
    }

    public function pakketOptie()
    {
        return $this->belongsTo(PakketOptie::class, 'pakketoptie_id');
    }

    public function isBevestigd()
    {
        return $this->reservering_status === 'Bevestigd';
    }
}
