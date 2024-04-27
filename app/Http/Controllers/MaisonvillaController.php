<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMaisonRequest;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use App\Services\PropertyService;
use App\Services\PropertyServiceInterface;

class MaisonvillaController extends Controller
{ 

    protected $propertyService;

    public function __construct(PropertyServiceInterface $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function store(StoreMaisonRequest $request)
    {
        return $this->propertyService->storeProperty($request, 'Maison_Riad_Villa');
    
    }


    public function Update(StoreMaisonRequest $request,$id)
    {
        return $this->propertyService->updateProperty($request,$id );
    }

    public function create()
    {
        $cities = City::all();
        $types = PropertyType::all();
        return view('properties.Create_MaisonRiadVilla',compact('cities','types'));
        
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $cities = City::orderBy('name', 'asc')->get();
        $types = PropertyType::all();
        return view('properties.Update_MaisonRiadVilla',compact('cities','types','property'));
    }


    public function destroy($id)
{
    $property = Property::findOrFail($id);
    $type = $property->type->name;
    $property->delete();

    return redirect()->back()->withSuccess("Votre $type a été supprimé.");
}



}
