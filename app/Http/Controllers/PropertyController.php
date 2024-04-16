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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PropertyController extends Controller
{

    protected $propertyRepository;
    protected $caracteristiqueRepository;

    public function __construct(PropertyRepositoryInterface $propertyRepository,CaracteristiqueRepositoryInterface $caracteristiqueRepository ) {
       
            $this->propertyRepository = $propertyRepository;
            $this->caracteristiqueRepository = $caracteristiqueRepository;

    }



    protected function storeProperty($request, $storagePath)
    {
        
       

    
        try {
            $validatedData = $request->validated();
            $validatedData['user_id'] = auth()->user()->id;
            $property = $this->propertyRepository->createProperty($validatedData);
            $validatedData['property_id'] = $property->id;
            $caracteristique = $this->caracteristiqueRepository->createCaracteristique($validatedData);
            $caracteristique->save();
    
            $images = $request->file('images');
            if ($images) {
                foreach ($images as $image) {
                    $path = $image->store("/$storagePath");
                    $property->images()->create(['url' => $path]);
                }
            }
    
            $nameDisplayAlert = $property->type->name;
            return redirect()->route('properties')->withSuccess("Votre $nameDisplayAlert a été ajouté avec succès !");
        } catch (\Exception $e) {
            logger()->error("Une erreur s'est produite lors de la création de la propriété veuillez réessayer plus tard: " . $e->getMessage());
            return redirect()->back()->withError("Une erreur s'est produite lors de la création de la propriété, veuillez réessayer plus tard.");
        }
    }
    




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

    return $this->storeProperty($request, 'appartement_Studio_Bureau');
}


public function storeMaison(StoreMaisonRequest $request)
{
    return $this->storeProperty($request, 'Maison_Riad_Villa');

}
public function storeChambre(StoreChambreRequest $request)
{
    return $this->storeProperty($request, 'Chambres');
    
}
public function storeLocalCommerce(StoreLocalcommereRequest $request)
{
    return $this->storeProperty($request, 'Local_Commerce');
}
public function TerrainImmobilier(StoreTerrainRequest $request)
{
    return $this->storeProperty($request, 'Terrain_Immobilier');

}


public function showProperties(Request $request)
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

   











public function createLocalCommerce()
{
    $cities = City::orderBy('name', 'asc')->get();
    $types = PropertyType::all();
    return view('properties.Create_LocalCommerce',compact('cities','types'));

}

public function createTerrainImmobilier()
{
    $cities = City::orderBy('name', 'asc')->get();
    $types = PropertyType::all();
    return view('properties.Create_TerrainImmobilier',compact('cities','types'));
}

public function createChambres()
{
    $cities = City::orderBy('name', 'asc')->get();
    $types = PropertyType::all();
    return view('properties.Create_Chambres',compact('cities','types'));
}

}
