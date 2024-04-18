{{-- show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <h1 class="mt-4">{{ $property->type->name }} {{$property->categorie->name}} à {{ $property->city->name }}</h1>
            <p class="fw-bold fs-3" style="color:#00B98E; ">{{ $property->prix }} MAD @if($property->categorie->name == 'A LOUER') /Mois @endif</p>
            <p class="text-muted ">{{ $property->city->name }}</p>
        <div class="col-lg-8">
            
            <div id="carouselProperty{{ $property->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($property->images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <a href="{{ asset($image->url) }}" data-lightbox="property-images">
                                <img src="{{ asset($image->url) }}" class="d-block w-100" alt="Property Image">
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- Carousel controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselProperty{{ $property->id }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselProperty{{ $property->id }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            


            <div class="mt-3">
                <button class="btn my-3 btn-outline btncard border-success text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseImages" aria-expanded="false" aria-controls="collapseImages">Voir toutes les images</button>
                <div class="collapse mt-3" id="collapseImages">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                        @foreach ($property->images as $image)
                            <div class="col">
                                <a href="{{ asset($image->url) }}" data-lightbox="property-images">
                                <img src="{{ asset($image->url) }}" class="rounded-lg shadow-lg object-cover h-100 w-100" alt="Property Image">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            
            <p>{{ $property->description }}</p>
           </div>
        
            
           
        </div>
        
            
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title " style="color: #000000;">Caractéristiques</h3>
                    <ul class="list-unstyled">
                        <li><i style="color:#00B98E; " class="fas fa-home me-2"></i> Surface: {{ $property->caracteristiques->surface }} m²</li>
                        <li><i style="color:#00B98E; " class="fas fa-bed me-2"></i> Chambres: {{ $property->caracteristiques->number_rooms }}</li>
                        <li><i style="color:#00B98E; " class="fas fa-bath me-2"></i> Salles de bain: {{ $property->caracteristiques->number_salleBain }}</li>
                        <li><i style="color:#00B98E; " class="fas fa-building me-2"></i> Étage: {{ $property->caracteristiques->etage }}</li>
                        <li><i style="color:#00B98E; " class="fas fa-elevator me-2"></i> Ascenseur: {{ $property->caracteristiques->ascenseur ? 'Oui' : 'Non' }}</li>
                        <li><i style="color:#00B98E; " class="fas fa-door-open me-2"></i> Rez-de-chaussée: {{ $property->caracteristiques->RezDeChaussé ? 'Oui' : 'Non' }}</li>
                        <li><i style="color:#00B98E; " class="fas fa-door-closed me-2"></i> Balcon: {{ $property->caracteristiques->balcon ? 'Oui' : 'Non' }}</li>
                        <li><i style="color:#00B98E; " class="fas fa-sun me-2"></i> Terrasse: {{ $property->caracteristiques->terrasse ? 'Oui' : 'Non' }}</li>
                        <li><i style="color:#00B98E; " class="fas fa-swimming-pool me-2"></i> Piscine: {{ $property->caracteristiques->piscine ? 'Oui' : 'Non' }}</li>
                        <li><i style="color:#00B98E; " class="fas fa-tree me-2"></i> Jardin: {{ $property->caracteristiques->jardin ? 'Oui' : 'Non' }}</li>
                        <li><i style="color:#00B98E; " class="fas fa-parking me-2"></i> Parking: {{ $property->caracteristiques->parking ? 'Oui' : 'Non' }}</li>
                        <li><i style="color:#00B98E; " class="fas fa-map-marker-alt me-2"></i> Adresse: {{ $property->adresse }}</li>
                        <li><i style="color:#00B98E; " class="fas fa-city me-2"></i> Ville: {{ $property->city->name }}</li>
                        <li><i style="color:#00B98E; " class="fas fa-calendar-alt me-2"></i> Date de construction: {{ $property->date_construction }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body">
                <h3 class="">Informations de contact</h3>
                <ul class="list-unstyled">
                    <li><i class="fas fa-phone me-2"></i> Téléphone: +212641725930</li>
                    <li><i class="fas fa-envelope me-2"></i> Email: Mohamedhaki70@Gmail.com</li>
                    <li><i class="fas fa-map-marker-alt me-2"></i> Adresse: 28000 Rue 7 Octobre Nahdda, TATA, MAROC</li>
                </ul>
                <a class="btn  " style="color:#ffffff; background-color:#00B98E;" data-tracking="click" data-value="listing-whatsapp"  data-slug="495978" aria-label="Whatsapp" target="_blank" rel="noreferrer nofollow noopener" href="https://api.whatsapp.com/send?phone=+212619969568&amp;text=Bonjour, j'ai vu le bien mis en vente sur agency ( {{$property->title}} ), Ref: 12_75MA{{$property->id}}, et je souhaite prendre rendez-vous pour une visite. Merci. %0ahttp://127.0.0.1:8000/Acceuil">Contactez-nous sur Whatsapp <i class="fa-brands fa-whatsapp fa-xl" style="color: #53fa0b;"></i></a>
            </div>
        </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
