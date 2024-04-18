<?php

namespace App\Repositories;


interface PropertyRepositoryInterface
{
    public function createProperty(array $data);
    public function updateProperty(array $data, $id);

}
