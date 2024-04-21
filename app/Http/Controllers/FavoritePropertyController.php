<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritePropertyController extends Controller
{
    public function toggleFavoriteProperty($propertyId)
    {
        $user = Auth::user();
        $property = Property::findOrFail($propertyId);
    
        if ($user) {
            $user->favoriteProperties()->toggle($property);
            $message = $user->favoriteProperties->contains($property)
                ? 'ajouté'
                : 'retiré';
            
            $favoriteCount = $property->favoritedBy()->count(); // Compter le nombre d'utilisateurs qui ont ajouté cette propriété à leurs favoris
        } else {
            $message = 'Vous devez être connecté pour ajouter des propriétés à vos favoris.';
        }
    
        return response()->json(['message' => $message, 'favoriteCount' => $favoriteCount]);
    }
    
    public function showFavoriteProperties()
{
    $user = Auth::user();
    $favoriteProperties = $user ? $user->favoriteProperties : [];

    return view('properties.favoriteProperties', compact('favoriteProperties'));
}

}
