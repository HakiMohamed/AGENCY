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

        if ($property->favoritedBy($user)) {
            $user->favoriteProperties()->detach($property);
            return response()->json(['success' => true, 'message' => 'Property removed from favorites.']);
        } else {
            $user->favoriteProperties()->attach($property);
            return response()->json(['success' => true, 'message' => 'Property added to favorites.']);
        }
    }

    public function showFavoriteProperties()
    {
        $user = Auth::user();
        $favoriteProperties = $user->favoriteProperties;

        return view('favorite_properties.index', compact('favoriteProperties'));
    }
}
