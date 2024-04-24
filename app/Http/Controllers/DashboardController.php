<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FavoriteProperty;
use App\Models\Property;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{


    public function showProperties()
{
    $properties = Property::all();
    return view('properties.show_properties', compact('properties'));
}


    public function showUsers()
    {
        $admin = Auth::user();
        $roles = Role::all();
        $listeUsers = User::orderBy('created_at','desc')->where('id','!=',$admin->id)->paginate(10);
        return view('dashboard.users',compact('admin','listeUsers','roles') );
    }


    public function updateUsers(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $ValidatedData= $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'role_id' => 'nullable|integer',
            'email' => 'nullable|email|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $path = $avatar->store("userProfile");
            $user->avatar = $path;
        }
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->route('showUsers')->with('success', 'user updated successfully.');
    }

    public function DeleteUsers($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('showUsers')->with('success', 'user Deleted successfully.');
    }


    public function Statistiques()
    {
        $nbProperties = Property::count();
        $admin = Auth::user();

        $nbCategories = Category::count();      
        $nbUsers = User::count();
         $topProperties = Property::withCount('favoritedBy')
         ->orderByDesc('favorited_by_count')
         ->take(6)
         ->get();
          $countPropertiesPlusFavoris = $topProperties->count();


        return view('dashboard.dashboard', compact('nbProperties','countPropertiesPlusFavoris','admin','topProperties', 'nbCategories','nbUsers'));
    }
}
