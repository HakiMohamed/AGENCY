<?php



namespace App\Services;

interface PropertyServiceInterface
{
    public function storeProperty($request, $storagePath);
    public function updateProperty($request, $id);
}
