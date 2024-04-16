<?php


namespace App\Repositories;


use App\Models\Caracteristique;

class CaracteristiqueRepository implements CaracteristiqueRepositoryInterface
{
    public function createCaracteristique(array $data)
    {
        return Caracteristique::create($data);
    }
}