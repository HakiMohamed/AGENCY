<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristique extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'etage',
        'surface',
        'ascenseur',
        'RezDeChaussé',
        'balcon',
        'terrasse',
        'piscine',
        'jardin',
        'parking',
        'number_rooms',
        'number_sallon',
        'number_salleBain',
    ];

    // Relation
    public function property()
{
    return $this->belongsTo(Property::class);
}
}
