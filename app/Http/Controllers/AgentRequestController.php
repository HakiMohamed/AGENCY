<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgentRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AgentRequestController extends Controller
{


    public function devenirAgent()
{
    
    
    $user =  auth()->user();

    
    $demandesEnattent = AgentRequest::where('user_id',$user->id)->first();
    return view('pages.demandeAgent',compact('demandesEnattent','user'));
}


    public function demandeetreAgent()
    {
        $user = auth()->user();
        if($user->phone == null || $user->Adresse ==null || $user->VersoIdentite == null || $user->VersoIdentite == null || $user->RectoIdentite == null || $user->CIN == null  ){
            $alertCompleterProfile = 1;
            return redirect()->route('profile.show',compact('alertCompleterProfile'))->withWarning("Veuillez compléter votre profile !");
        }
        $usersDemandes = AgentRequest::where('user_id', auth()->user()->id)
        ->where('status', 'pending')
        ->first();

        if ($usersDemandes) {
        return redirect()->back()->with('error', 'Vous avez déjà une demande en attente.');
      }


        AgentRequest::create([
            'user_id' => auth()->user()->id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Votre demande a été envoyée avec succès.');
    }





    public function showAgentRequests()
    {
        $requests = AgentRequest::with('user')->orderBy('created_at','desc')->paginate(10);
        $admin = Auth::user();
        return view('dashboard.demandesUsersChangeRole', compact('requests','admin'));
    }

    public function acceptAgentRequest($requestId)
    {
        $request = AgentRequest::find($requestId);
        if ($request) {
            $request->status = 'accepted';
            $request->save();

            $user = User::find($request->user_id);
            if ($user) {
                $user->role_id = 3;
                $user->save();
            }

            return redirect()->back()->with('success', 'Demande acceptée avec succès.');
        }

        return redirect()->back()->with('error', 'La demande n\'existe pas.');
    }

    public function rejectAgentRequest($requestId)
    {
        $request = AgentRequest::find($requestId);
        if ($request) {
            $request->status = 'rejected';
            $request->save();
            return redirect()->back()->with('success', 'Demande rejetée avec succès.');
        }

        return redirect()->back()->with('error', 'La demande n\'existe pas.');
    }

   
}
