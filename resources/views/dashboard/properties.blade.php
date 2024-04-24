@extends('layoutsDash.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold my-8">Liste des propriétés</h1>
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Titre</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Prix</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                    <tr>
                        <td class="border px-4 py-2">{{ $property->title }}</td>
                        <td class="border px-4 py-2">{{ $property->description }}</td>
                        <td class="border px-4 py-2">{{ $property->prix }}</td>
                        <td class="border px-4 py-2">
                            <!-- Suppression -->
                            <button @click="showDeleteModal = true" class="text-red-500">Supprimer</button>
                            <modal v-if="showDeleteModal" @close="showDeleteModal = false">
                                <h3 class="text-lg font-bold mb-4">Êtes-vous sûr de vouloir supprimer cette propriété ?</h3>
                                <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Supprimer</button>
                                </form>
                            </modal>

                            <!-- Modification du statut de publication -->
                            <button @click="showStatusModal = true">Changer Publication</button>
                            <modal v-if="showStatusModal" @close="showStatusModal = false">
                                <h3 class="text-lg font-bold mb-4">Modifier le statut de publication</h3>
                                <form action="{{ route('properties.update', $property->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="Publication" id="Publication">
                                        <option value="publier">Publier</option>
                                        <option value="encoursTraitement">En cours de traitement</option>
                                    </select>
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
                                </form>
                            </modal>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
