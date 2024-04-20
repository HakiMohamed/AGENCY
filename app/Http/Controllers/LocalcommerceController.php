<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLocalcommereRequest;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use App\Services\PropertyService;

class LocalcommerceController extends Controller
{ 

    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function store(StoreLocalcommereRequest $request)
    {
        return $this->propertyService->storeProperty($request, 'Local_Commerce');
    }

    public function Update(StoreLocalcommereRequest $request,$id)
    {
        return $this->propertyService->updateProperty($request,$id );
    }

    public function create()
    {
        $cities = City::orderBy('name', 'asc')->get();
        $types = PropertyType::all();
        return view('properties.Create_LocalCommerce',compact('cities','types'));
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $cities = City::orderBy('name', 'asc')->get();
        $types = PropertyType::all();
        return view('properties.Update_LocalCommerce',compact('cities','types','property'));
    }


    public function destroy($id)
{
    $property = Property::findOrFail($id);
    $type = $property->type->name;
    $property->delete();

    return redirect()->back()->withSuccess("Votre $type a été supprimé.");
}



}
