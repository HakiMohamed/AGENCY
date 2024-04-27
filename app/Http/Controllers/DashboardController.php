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
    $admin = Auth::user();
    $properties = Property::paginate(10);
    return view('dashboard.properties', compact('properties','admin'));
}


    public function showUsers()
    {
        $admin = Auth::user();
        $roles = Role::all();
        $listeUsers = User::orderBy('created_at','desc')->where('id','!=',$admin->id)->paginate(10);
        return view('dashboard.users',compact('admin','listeUsers','roles') );
    }


    public function updateUsers(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $validatedData = $request->validate([
                'firstname' => 'nullable|string|max:255',
                'lastname' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:255',
                'role_id' => 'nullable|integer',
                'email' => 'nullable|email|max:255',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $path = $avatar->store("userProfile");
                $validatedData['avatar'] = $path; 
            }
            $user->fill($validatedData);
            $user->save();
            return redirect()->route('showUsers')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating user.');
        }
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


    public function updatePropertyStatus(Request $request, $id)
{
    try {
        $property = Property::findOrFail($id);
        $property->status = $request->status;
        $property->save();
        return redirect()->route('showProperties')->with('success', 'Property status updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while updating property status.');
    }
}

public function updatePropertyPublication(Request $request, $id)
{
    try {
        $property = Property::findOrFail($id);
        $property->Publication = $request->Publication;
        $property->save();
        return redirect()->back()->with('success', 'Property publication updated successfully.');
    } catch (\Exception $e) {
        logger()->error("An error occurred while updating property publication: " . $e->getMessage());

        return redirect()->back()->with('error', 'An error occurred while updating property publication.');
    }
}

}
