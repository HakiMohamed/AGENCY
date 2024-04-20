<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChambreRequest;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use App\Services\PropertyService;

class ChambreController extends Controller
{ 

    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function store(StoreChambreRequest $request)
    {
        return $this->propertyService->storeProperty($request, 'Chambres');
        
    }


    public function Update(StoreChambreRequest $request, $id)
{
    return $this->propertyService->updateProperty($request, $id);
}

    public function create()
    {
        $cities = City::all();
        $types = PropertyType::all();
        return view('properties.Create_Chambres',compact('cities','types'));
        
    }

    public function edit($id)
{
    $property = Property::findOrFail($id);
    $cities = City::orderBy('name', 'asc')->get();
    $types = PropertyType::all();
    return view('properties.Update_Chambres',compact('cities','types','property'));
}


    public function destroy($id)
{
    $property = Property::findOrFail($id);
    $type = $property->type->name;
    $property->delete();

    return redirect()->back()->withSuccess("Votre $type a été supprimé.");
}



}
