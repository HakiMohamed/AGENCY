<?php

namespace App\Http\Controllers;

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
       
       
        return view('profile.show', compact('user','properties'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            $path = $avatar->store("avatars");
           
            $user->avatar = $path;
        }

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }

    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        return redirect()->route('home')->with('success', 'User deleted successfully.');
    }


    
}
