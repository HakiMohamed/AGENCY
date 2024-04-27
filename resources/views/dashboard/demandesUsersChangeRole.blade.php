@extends('layoutsDash.app')

@section('content')
<div class=" mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl text-green-400 font-bold mb-4 bg-gray-100 text-center p-2 shadow-lg rounded-lg">demandes des utilisateurs pour etre des agents immobiliers</h1>

    <div class="bg-white overflow-x-auto shadow-md rounded my-6">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-2 text-left">Utilisateur</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Phone</th>
                    <th class="py-3 px-6 text-left">Verso_CIN</th>
                    <th class="py-3 px-6 text-left">Recto_CIN</th>
                    <th class="py-3 px-6 text-left">Adresse</th>
                    <th class="py-3 px-6 text-left">CIN</th>
                    <th class="py-3 px-6 text-left">Statut</th>
                    <th class="py-3 px-6 text-left">Date de demande</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($requests as $request)
                
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $request->user->firstname }}  {{ $request->user->lastname }}</td>
                    <td class="py-3 px-6 text-left">{{ $request->user->email }}</td>
                    <td class="py-3 px-6 text-left " >{{ $request->user->phone }}</td>
                    <td class="py-3 px-6 text-left"> <a href="{{ asset($request->user->VersoIdentite) }}" data-lightbox="property-images"> <img src=" {{ asset($request->user->VersoIdentite) }}" alt="Verso Identite" class="w-20 h-10 rounded"> </a></td>
                    <td class="py-3 px-6 text-left"> <a href="{{ asset($request->user->RectoIdentite) }}" data-lightbox="property-images"> <img src=" {{ asset($request->user->RectoIdentite) }}" alt="Verso Identite" class="w-20 h-10 rounded"> </a></td>
                    <td class="py-3 px-6 text-left">{{ $request->user->CIN }}</td>
                    <td class="py-3 px-6 text-left">{{ $request->user->Adresse }}</td>
                    <td class="py-3 px-6 text-left "> <span class=" {{ $request->status == 'accepted' ? 'bg-green-200' : ($request->status == 'pending' ? 'bg-yellow-200' : 'bg-red-200') }}  p-2 rounded-full "> {{ ucfirst($request->status) }} </span> </td>
                    <td class="py-3 px-6 text-left">{{ Carbon\Carbon::parse($request->created_at)->format('d/m/Y') }}</td>
                    <td class="py-3 px-6 text-center">
                        @if($request->status == 'pending')
                        <form method="POST" action="{{ route('acceptDemande', $request->id) }}" class="inline">
                            @csrf
                            <button type="submit" class="text-green-600 hover:text-green-900 mr-2"><i class="fa-solid fa-check-to-slot fa-xl"></i></button>
                        </form>
                        <form method="POST" action="{{ route('refuseDemande', $request->id) }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-900"><i class="fa-solid fa-xmark fa-xl"></i></button>
                        </form>
                        @endif
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        
        
    </div>
    
</div>
<div id="pagination-links" class="text-center">
    <p>{{ $requests->links() }}</p>  
  </div>
@endsection
