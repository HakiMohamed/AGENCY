<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppartementRequest;
use App\Http\Requests\StoreChambreRequest;
use App\Http\Requests\StoreLocalcommereRequest;
use App\Http\Requests\StoreMaisonRequest;
use App\Models\Caracteristique;
use App\Models\Category;
use App\Models\City;
use App\Models\Property;
use App\Models\Image;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function createMaisonRiadVilla()
{
    $cities = City::all();
    $types = PropertyType::all();
    return view('properties.Create_MaisonRiadVilla',compact('cities','types'));
}

public function createAppartementStudioBureau()
{
    $cities = City::all();
    $types = PropertyType::all();
    return view('properties.Create_AppartementStudioBureau',compact('cities','types'));
    
}

public function storeAppartement(StoreAppartementRequest $request)
{
    $validatedData = $request->validated();
    $validatedData['user_id'] = auth()->user()->id; 
    $property = Property::create($validatedData);
    $caracteristique = new Caracteristique();
    $caracteristique->fill($validatedData);
    $caracteristique->property()->associate($property);
    $caracteristique->save();
    $images = $request->file('images');
    if ($images) {
        foreach ($images as $image) {
            $path = $image->store('/appartements');
            $property->images()->create(['url' => $path]);
        }    
    }
 
    $NameDisplayAlert = $property->type->name;
    return redirect()->route('create.appartement-studio-bureau')->withSuccess("Votre $NameDisplayAlert a été ajouté avec succès !");

}


public function storeMaison(StoreMaisonRequest $request)
{
    $validatedData = $request->validated();
    $validatedData['user_id'] = auth()->user()->id; 
    $property = Property::create($validatedData);
    $caracteristique = new Caracteristique();
    $caracteristique->fill($validatedData);
    $caracteristique->property()->associate($property);
    $caracteristique->save();
    $images = $request->file('images');
    if ($images) {
        foreach ($images as $image) {
            $path = $image->store('/appartements');
            $property->images()->create(['url' => $path]);
        }    
    }
    $NameDisplayAlert = $property->type->name;
    return redirect()->route('create.maison-riad-villa')->withSuccess("Votre $NameDisplayAlert a été ajouté avec succès !");;
}
public function storeChambre(StoreChambreRequest $request)
{
    $validatedData = $request->validated();
    $validatedData['user_id'] = auth()->user()->id; 
    $property = Property::create($validatedData);
    $caracteristique = new Caracteristique();
    $caracteristique->fill($validatedData);
    $caracteristique->property()->associate($property);
    $caracteristique->save();
    $images = $request->file('images');
    if ($images) {
        foreach ($images as $image) {
            $path = $image->store('/appartements');
            $property->images()->create(['url' => $path]);
        }    
    }
    $NameDisplayAlert = $property->type->name;
    return redirect()->route('create.maison-riad-villa')->withSuccess("Votre $NameDisplayAlert a été ajouté avec succès !");;
}
public function storeLocalCommerce(StoreLocalcommereRequest $request)
{
    $validatedData = $request->validated();
    $validatedData['user_id'] = auth()->user()->id; 
    $property = Property::create($validatedData);
    $caracteristique = new Caracteristique();
    $caracteristique->fill($validatedData);
    $caracteristique->property()->associate($property);
    $caracteristique->save();
    $images = $request->file('images');
    if ($images) {
        foreach ($images as $image) {
            $path = $image->store('/appartements');
            $property->images()->create(['url' => $path]);
        }    
    }
    $NameDisplayAlert = $property->type->name;
    return redirect()->route('create.maison-riad-villa')->withSuccess("Votre $NameDisplayAlert a été ajouté avec succès !");;
}


public function showProperties(Request $request)
{
    $properties = Property::with('caracteristiques')->orderBy('created_at', 'desc')->paginate(3);
    $cities = City::all();
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
    $cities = City::all(); 

    $view = view('properties.property_list', compact('properties', 'cities'))->render();

    return response()->json(['html' => $view]);
}

   











public function createLocalCommerce()
{
    $cities = City::all();
    $types = PropertyType::all();
    return view('properties.Create_LocalCommerce',compact('cities','types'));

}

public function createTerrainImmobilier()
{
    $cities = City::all();
    $types = PropertyType::all();
    return view('properties.Create_TerrainImmobilier',compact('cities','types'));
}

public function createChambres()
{
    $cities = City::all();
    $types = PropertyType::all();
    return view('properties.Create_Chambres',compact('cities','types'));
}

}
