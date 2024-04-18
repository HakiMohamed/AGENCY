<?php


namespace App\Repositories;

use App\Models\Property;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function createProperty(array $data)
    {
        return Property::create($data);
    }

    public function updateProperty(array $data, $id)
    {
        $property = Property::findOrFail($id);
        $property->update($data);
        return $property;
    }
}