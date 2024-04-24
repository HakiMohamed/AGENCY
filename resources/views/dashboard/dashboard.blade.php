@extends('layoutsDash.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl text-green-400 font-bold mb-4">Statistiques</h1>

    <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-red-700 rounded-lg shadow-md p-4">
            <h2 class="text-lg text-white font-semibold mb-2">Total des Utilisateurs</h2>
            <p class="text-3xl font-bold text-white">{{ $nbUsers }}</p>
        </div>

        <div class="bg-green-700 rounded-lg shadow-md p-4">
            <h2 class="text-lg text-white font-semibold mb-2">Total des Propriétés</h2>
            <p class="text-3xl font-bold text-white">{{ $nbProperties }}</p>
        </div>

        <div class="bg-gray-700 rounded-lg shadow-md p-4">
            <h2 class="text-lg text-white font-semibold mb-2">Catégories</h2>
            <p class="text-3xl font-bold text-white">{{$nbCategories}}</p>
        </div>

        <div class="bg-blue-700 rounded-lg shadow-md p-4">
            <h2 class="text-lg text-white font-semibold mb-2">Top Favorite</h2>
            <ul class="list-disc list-inside">
                <p class="text-3xl font-bold text-white">{{$countPropertiesPlusFavoris}}</p>
            </ul>
        </div>
    </div>
</div>

<div class="bg-white shadow-md rounded-lg p-4">
    <h2 class="text-lg font-semibold text-white bg-green-400 shadow-lg rounded-lg text-center p-4">Propriétés les mieux classées cette semaine <i class="fa-solid fa-chart-line fa-lg"></i></h2>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-4 gap-4">
    @foreach ($topProperties as $property)
    
    <div class="bg-gray-300 shadow-xl item-center rounded-lg p-4">
        <a href="{{ route('property.showDetail', $property->id) }}"><img src="{{ asset($property->images->first()->url) }}" class="item-center" style="width: 120px; height: 80px; object-fit: cover;" alt="Property Image"></a>
        <h2 class="text-lg font-semibold">{{ $property->type->name }} {{ $property->categorie->name }} à {{ $property->city->name }}</h2>
        <p class="text-sm text-gray-500">Prix: {{ $property->prix }} MAD</p>
        <a href="{{ route('property.showDetail', $property->id) }}" class=" mt-5 btn  text-green-700"><i class="fa-solid fa-eye fa-lg" > </i> Decouvrir</a>
    </div>
    @endforeach
</div>
</div>
@endsection
