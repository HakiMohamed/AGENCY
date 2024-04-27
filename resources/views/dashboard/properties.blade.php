@extends('layoutsDash.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Liste des Propriétés</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-sm">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categorie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publication</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Modifier Status</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Modifier Publicatin</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($properties as $property)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $property->type->name  }} {{ $property->categorie->name }} à {{ $property->city->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $property->prix }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $property->categorie->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $property->type->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $property->status }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $property->Publication }}</td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('updatePropertyStatus', $property->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" id="status" class="bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="disponible" {{ $property->status === 'disponible' ? 'selected' : '' }}>Disponible</option>
                                        <option value="nondisponible" {{ $property->status === 'nondisponible' ? 'selected' : '' }}>Non Disponible</option>
                                    </select>
                                    <button type="submit" class="ml-2 px-4 py-2 bg-green-500 hover:bg-green-700 text-white font-bold rounded">Enregistrer</button>
                                </form>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('updatePropertyPublication', $property->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <select name="Publication" id="publication" class="bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="publier" {{ $property->publication === 'publier' ? 'selected' : '' }}>Publier</option>
                                        <option value="encoursTraitement" {{ $property->publication === 'encoursTraitement' ? 'selected' : '' }}>En Cours de Traitement</option>
                                    </select>
                                    <button type="submit" class="ml-2 px-4 py-2 bg-green-500 hover:bg-green-700 text-white font-bold rounded">Enregistrer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
    <div id="pagination-links" class="text-center">
        <p>{{ $properties->links() }}</p>  
      </div>
@endsection
