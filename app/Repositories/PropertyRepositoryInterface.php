<?php

namespace App\Repositories;

interface PropertyRepositoryInterface
{

    public function createPropertyWithCaracteristiques(array $propertyData, array $caracteristiqueData);

    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function find($id);
    public function all();
}
