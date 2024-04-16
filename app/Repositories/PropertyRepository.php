<?php


namespace App\Repositories;

use App\Models\Property;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function createProperty(array $data)
    {
        return Property::create($data);
    }
}