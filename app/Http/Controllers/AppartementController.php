<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppartementRequest;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use App\Services\PropertyService;
use App\Services\PropertyServiceInterface;

class AppartementController extends Controller
{ 

    protected $propertyService;

    public function __construct(PropertyServiceInterface $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function store(StoreAppartementRequest $request)
{

    return $this->propertyService->storeProperty($request, 'appartement_Studio_Bureau');
}


    public function Update(StoreAppartementRequest $request,$id)
    {
        return $this->propertyService->updateProperty($request,$id );
    }

    public function create()
    {
        $cities = City::all();
        $types = PropertyType::all();
        return view('properties.Create_AppartementStudioBureau',compact('cities','types'));
        
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $cities = City::orderBy('name', 'asc')->get();
        $types = PropertyType::all();
        return view('properties.Update_AppartementStudioBureau',compact('cities','types','property'));
    }


    public function destroy($id)
{
    $property = Property::findOrFail($id);
    $type = $property->type->name;
    $property->delete();

    return redirect()->back()->withSuccess("Votre $type a été supprimé.");
}



}
