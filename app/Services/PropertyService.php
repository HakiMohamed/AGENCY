<?php



namespace App\Services;

use App\Services\PropertyServiceInterface;
use App\Models\Property;
use App\Repositories\CaracteristiqueRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class PropertyService implements PropertyServiceInterface
{
    protected $propertyRepository;
    protected $caracteristiqueRepository;

    public function __construct(PropertyRepositoryInterface $propertyRepository, CaracteristiqueRepositoryInterface $caracteristiqueRepository
    ) {$this->propertyRepository = $propertyRepository;
       $this->caracteristiqueRepository = $caracteristiqueRepository;
    }

    public function storeProperty($request, $storagePath)
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

    public function updateProperty($request, $id)
    {
        try {
            $validatedData = $request->validated();
            $property = Property::findOrFail($id);
            if ($property->user_id !== auth()->user()->id) {
                return redirect()->back()->withError("Vous n'êtes pas autorisé à modifier cette propriété.");
            }
            $type = $property->type->name;
            $property->update($validatedData);

            if ($property->caracteristique) {
                $property->caracteristique->update($validatedData);
            }

            $images = $request->file('images');
            if ($images) {
                $property->images()->delete();
                foreach ($images as $image) {
                    $path = $image->store("properties");
                    $property->images()->create(['url' => $path]);
                }
            }

            return redirect()->route('properties')->withSuccess("La propriété $type a été mise à jour avec succès !");
        } catch (\Exception $e) {
            logger()->error("Une erreur s'est produite lors de la mise à jour de la propriété : " . $e->getMessage());
            return redirect()->back()->withError("Une erreur s'est produite lors de la mise à jour de la propriété.");
        }
    }
}
