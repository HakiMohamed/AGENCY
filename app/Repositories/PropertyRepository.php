<?php


namespace App\Repositories;

use App\Models\Property;

class PropertyRepository implements PropertyRepositoryInterface
{
    protected $model;

    public function __construct(Property $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $property = $this->find($id);
        $property->update($data);
        return $property;
    }

    public function delete($id)
    {
        $property = $this->find($id);
        $property->delete();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function all()
    {
        return $this->model->all();
    }
}
