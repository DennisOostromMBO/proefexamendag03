<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uitslag extends Model
{
    use HasFactory;

    protected $table = 'uitslag'; // Specify the table name
    protected $primaryKey = 'id'; // Specify the primary key
    public $timestamps = false; // Disable timestamps if not used

    protected $fillable = [
        'SpelId',
        'Aantalpunten',
    ];
}
