@extends('layouts.app')

@section('content')
<div class="container py-5 position-relative overflow-hidden">
    <h1 class="display-4 text-center mt-5">Découvrez vos favoris</h1>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @if (!isset($favoriteProperties) || !count($favoriteProperties))
        <div class="col">
            <div class="card shadow-sm border-0 rounded-lg text-center d-flex align-items-center justify-content-center h-100 empty-favorites">
                <i class="fas fa-heart-broken display-1 text-secondary mb-3"></i>
                <p class="h5">Votre liste de favoris est vide pour le moment.</p>
                <a href="{{ route("properties") }}" class="btn btn-outline-success btncard text-success mt-auto">Trouver des propriétés</a>
            </div>
        </div>
        @else
        @foreach($favoriteProperties as $property)
        <div class="col">
            <div class="card shadow-sm border-0 rounded-lg overflow-hidden position-relative">
                <img src="{{ asset($property->images->first()->url) }}" class="card-img-top" style="height: 300px; object-fit: cover;" alt="Property Image">
                <div class="card-body px-4 py-3 d-flex flex-column justify-content-between">
                    <h5 class="fw-bold mb-3" style="color: #333;">
                        <span class="text-dark">{{ $property->prix }}</span> MAD @if($property->categorie->name =='A LOUER') /Mois @endif</h5>

                    <p class="d-block fw-bold text-dark h5 mb-2">{{ $property->type->name }} {{ $property->categorie->name }} à {{ $property->city->name }}</p>
                    <a href="{{ route('property.showDetail', $property->id) }}" class="btn btn-outline-success btncard text-success mt-auto">Voir détails</a>
                </div>
                <div class="favorite-icon position-absolute top-0 end-0 m-3">
                    <form action="{{ route('favorite-properties.toggle', ['propertyId' => $property->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="heart-btn btn">
                            <i class="fas fa-heart fa-2xl" style="color: {{ $property->isFavoritedBy(Auth::user()) ? 'red' : '#c1bebe' }};"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <div class="position-absolute top-0 d-flex align-items-center w-100 justify-content-center">
        <h2 class="display-1 fw-light text-white">Favoris</h2>
    </div>
</div>
@endsection
