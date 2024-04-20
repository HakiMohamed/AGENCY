<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppartementRequest;
use App\Http\Requests\StoreChambreRequest;
use App\Http\Requests\StoreLocalcommereRequest;
use App\Http\Requests\StoreMaisonRequest;
use App\Http\Requests\StoreTerrainRequest;
use App\Models\Caracteristique;
use App\Models\Category;
use App\Models\City;
use App\Models\Property;
use App\Models\Image;
use App\Models\PropertyType;
use App\Repositories\CaracteristiqueRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Services\PropertyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PropertyController extends Controller
{

    

public function showProperties()
{
    $properties = Property::with('caracteristiques')->orderBy('created_at', 'desc')->paginate(3);
    $cities = City::orderBy('name', 'asc')->get();
    $types = PropertyType::all();
    return view('properties.show_properties', compact('properties','cities','types'));
}

public function filterProperties(Request $request)
{
    $properties = Property::with('caracteristiques');

    if ($request->filled('categorie_id')) {
        $properties->where('categorie_id', $request->categorie_id);
    }
    if ($request->filled('title')) {
        $properties->where('title', 'like', '%' . $request->title . '%');
    }
    
    if ($request->filled('city_id')) {
        $properties->where('city_id', $request->city_id);
    }
    if ($request->filled('type_id')) {
        $properties->where('type_id', $request->type_id);
        
    }

    if ($request->filled('min_price') && $request->filled('max_price')) {
        $minPrice = $request->min_price;
        $maxPrice = $request->max_price;
        $properties->whereBetween('prix', [$minPrice, $maxPrice]);
    }


    $caracteristiques = [
        'RezDeChaussé', 'balcon', 'terrasse', 'piscine', 'jardin', 'parking', 'number_rooms', 'number_sallon', 'number_salleBain'
    ];
    foreach ($caracteristiques as $caracteristique) {
        if ($request->filled($caracteristique)) {
            $properties->whereHas('caracteristiques', function ($query) use ($request, $caracteristique) {
                $query->where($caracteristique, true)
                      ->orWhere($caracteristique, $request->{$caracteristique}); 
            });
        }
    }
    
    $properties = $properties->paginate(3);
    $cities = City::orderBy('name', 'asc')->get();

    $view = view('properties.property_list', compact('properties', 'cities'))->render();
    return response()->json(['html' => $view]);
}



public function show($id)
{
    $property = Property::findOrFail($id);
    return view('properties.show_details', compact('property'));
}


}
