<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'prix',
        'categorie_id',
        'type_id',
        'status',
        'Publication',
        'city_id',
        'adresse',
        'user',
        'date_construction',
    ];

    public function caracteristiques()
    {
        return $this->hasOne(Caracteristique::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function type()
    {
        return $this->belongsTo(PropertyType::class, 'type_id');
    }

    public function city()
{
    return $this->belongsTo(City::class, 'city_id');
}

   

    public function user()
{
    return $this->belongsTo(User::class, 'user');
}
}
