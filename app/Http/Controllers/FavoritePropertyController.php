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

    if ($property->isFavoritedBy($user)) {
        $user->favoriteProperties()->detach($property);
        $message = 'vous avez retirer cette proprieté de votre liste';
    } else {
        $user->favoriteProperties()->attach($property);
        $message = 'vous avez ajouter cette proprieté à votre liste';
    }

    return redirect()->back()->withSuccess("$message");
}

    
    

    public function showFavoriteProperties()
    {
        $user = Auth::user();
        $favoriteProperties = $user->favoriteProperties;

        return view('properties.favoriteProperties', compact('favoriteProperties'));
    }
}
