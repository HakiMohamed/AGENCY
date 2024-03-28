<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppartementRequest;
use App\Models\Caracteristique;
use App\Models\Property;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function createMaisonRiadVilla()
{
    return view('properties.Create_MaisonRiadVilla');
}

public function createAppartementStudioBureau()
{
    return view('properties.Create_AppartementStudioBureau');
}

public function storeAppartement(StoreAppartementRequest $request)
{
    $validatedData = $request->validated();
    $validatedData['user'] = 1; 
    $property = Property::create($validatedData);
    $caracteristique = new Caracteristique();
    $caracteristique->etage = $validatedData['etage'];
    $caracteristique->surface = $validatedData['surface'];
    $caracteristique->number_rooms = $validatedData['number_rooms'];
    $caracteristique->number_sallon = $validatedData['number_sallon'];
    $caracteristique->number_salleBain = $validatedData['number_salleBain'];
    $caracteristique->ascenseur = $validatedData['ascenseur'] ?? false;
    $caracteristique->balcon = $validatedData['balcon'] ?? false;
    $caracteristique->terrasse = $validatedData['terrasse'] ?? false;
    $caracteristique->piscine = $validatedData['piscine'] ?? false;
    $caracteristique->jardin = $validatedData['jardin'] ?? false;
    $caracteristique->parking = $validatedData['parking'] ?? false;
    $caracteristique->RezDeChaussé = $validatedData['RezDeChaussé'] ?? false;
    $caracteristique->property()->associate($property);
    $caracteristique->save();
    $images = $request->file('images');
    if ($images) {
        foreach ($images as $image) {
            $path = $image->store('/appartements');
            $property->images()->create(['url' => $path]);
        }
    }
    return redirect()->route('create.appartement-studio-bureau');
}


public function showProperties(Request $request)
{
    $properties = Property::with('caracteristiques');

    if ($request->filled('categorie_id')) {
      $properties =  Property::with('caracteristiques')->where('categorie_id', $request->categorie_id);
      return view('properties.show_properties', compact('properties'));
    }

    $properties = $properties->paginate(10);

    if ($request->ajax()) {
        return response()->json([
            'view' => view('properties.show_properties', compact('properties'))->render(),
            'next_page_url' => $properties->nextPageUrl()
        ]);
    }

    return view('properties.show_properties', compact('properties'));
}




public function createLocalCommerce()
{
    return view('properties.Create_LocalCommerce');
}

public function createTerrainImmobilier()
{
    return view('properties.Create_TerrainImmobilier');
}

public function createChambres()
{
    return view('properties.Create_Chambres');
}

}
