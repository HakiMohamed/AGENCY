@extends('layouts.app')

@section('content')
<div class="container py-5 position-relative overflow-hidden">
    <h1 class="display-4 text-center mt-5">Découvrez vos favoris</h1>

    <div class="table-responsive mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Propertie</th>
                    <th>Prix</th>
                    <th>Type</th>
                    <th>Catégorie</th>
                    <th>Ville</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!isset($favoriteProperties) || !count($favoriteProperties))
                <tr>
                    <td colspan="6" class="text-center">Votre liste de favoris est vide pour le moment. <a href="{{ route("properties") }}">Trouver des propriétés</a></td>
                </tr>
                @else
                @foreach($favoriteProperties as $property)
                <tr>
                    <td><a href="{{ route('property.showDetail', $property->id) }}"><img src="{{ asset($property->images->first()->url) }}" style="width: 120px; height: 80px; object-fit: cover;" alt="Property Image"></a></td>
                    <td>{{ $property->prix }} MAD @if($property->categorie->name =='A LOUER') /Mois @endif</td>
                    <td>{{ $property->type->name }}</td>
                    <td>{{ $property->categorie->name }}</td>
                    <td>{{ $property->city->name }}</td>
                    <td class="d-flex">
                        <a href="{{ route('property.showDetail', $property->id) }}" class="btn btn-outline-success btncard mx-3  text-success">Voir détails</a>
                        @auth
                        
                        <a href="https://api.whatsapp.com/send?phone=+212641725930&amp;text=Bonjour, j'ai vu le bien mis en {{$property->categorie->name}} sur agency ({{ $property->type->name }} {{$property->categorie->name}} à {{ $property->city->name }}), Ref: 12_75MA{{$property->id}}, et je souhaite prendre rendez-vous pour une visite. Merci. %0a{{ route('property.showDetail', $property->id) }}" class="btn mb-3 d-flex justify-content-start btnwhatspp" data-tracking="click" data-value="listing-whatsapp" data-slug="495978" aria-label="Whatsapp" target="_blank" rel="noreferrer nofollow noopener"> 
                            Planifier visite  <i class="fa-brands fa-whatsapp fa-xl" style="color: #ffffff; margin-top:9px;  width:1px;"></i>
                          </a>
                          <form class="mt-3 mx-5 " id="toggleFavoriteForm{{$property->id}}" action="{{ route('favorite-properties.toggle', ['propertyId' => $property->id]) }}" method="POST">
                            @csrf
                            <button id="toggleFavoriteButton{{$property->id}}" data-property-id="{{$property->id}}" type="button" class="heart-btn btn">
                                <i class="fas fa-heart fa-2xl" style="color: {{ Auth::user()->favoriteProperties->contains($property) ? 'red' : '#c1bebe' }};"></i>
                            </button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary p-0">Se connecter pour ajouter aux favoris</a>
                        @endauth
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="position-absolute top-0 d-flex align-items-center w-100 justify-content-center">
        <h2 class="display-1 fw-light text-white">Favoris</h2>
    </div>

    <div class="mobile-scroll-indicator d-md-none">
        <span class="d-flex justify-content-center justify-content-between ">
            <i class="fas fa-arrow-circle-left"></i>
        <i class="fas fa-arrow-circle-right"></i>
        </span>
        
        <p>Faites défiler horizontalement pour voir plus de données</p>
       
    </div>
</div>
@endsection
