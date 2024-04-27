<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
       
        $properties = Property::with('caracteristiques')->orderBy('created_at', 'desc')->where('user_id',$user->id)->paginate(10);
       
       $alertCompleterProfile = false ;
        return view('profile.show', compact('user','properties','alertCompleterProfile'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            
            $user->avatar = $request->file('avatar')->store("avatars");
        
        }

        if ($request->hasFile('VersoIdentite')) {
        $user->VersoIdentite = $request->file('VersoIdentite')->store("CINs");
        }

        if ($request->hasFile('RectoIdentite')) {
        $user->RectoIdentite = $request->file('RectoIdentite')->store("CINs");

        }

        $user->update($request->only(['firstname', 'lastname', 'phone', 'email', 'CIN', 'Adresse']));

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }

    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        return redirect()->route('home')->with('success', 'User deleted successfully.');
    }


    
}
