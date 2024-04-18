<?php


namespace App\Repositories;


interface CaracteristiqueRepositoryInterface
{
    public function createCaracteristique(array $data);
    public function updateCaracteristique(array $data, $id);

}