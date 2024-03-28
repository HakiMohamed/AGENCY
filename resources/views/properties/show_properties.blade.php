{{-- properties.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 " style="overflow-x: hidden;">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Liste des Propriétés</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit diam justo sed rebum.</p>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <p class="me-2"><i class="fas fa-filter" style="color: #00B98E;"></i> Filtrage</p>
                <form>
                    <select class="form-select" id="categorie_id" name="categorie_id" aria-label="Filtrer les affichages">
                        <option id="categorie_id" value="">Toutes</option>
                        <option id="categorie_id" value="3">Hypothécaire</option>
                        <option id="categorie_id" value="2">A Louer</option>
                        <option id="categorie_id" value="1">A Vendre</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4" id="property-list">
                    @foreach ($properties as $property)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <a class="link-underline-opacity-0 text-decoration-none" href="#">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden"> 
                                        <div id="carouselProperty{{ $property->id }}" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($property->images as $key => $image)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                        <img src="{{ asset($image->url) }}" class="d-block w-100" alt="Property Image">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProperty{{ $property->id }}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProperty{{ $property->id }}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div> 
                                        <div style="background-color: rgba(135, 135, 135, 0.432);" class="rounded btn  btn-secodary  text-white position-absolute start-0 top-0 m-4 ">{{ $property->created_at->locale('fr')->diffForHumans() }}</div>
                                        <div style="color: #00B98E; border-color: #00B98E;" class="rounded btn  btn-outline fw-bold btncard  text-white position-absolute end-0 top-0 m-4 py-1 px-3">{{ $property->categorie->name }}</div>
                                        <div class="bg-white rounded-top  position-absolute start-0 fw-bold bottom-0 mx-4 pt-1 px-3" style="color: #4b13f3;">{{ $property->type->name }}</div>
                                    </div>

                                    <div class="p-4 pb-0">
                                        <h5 class="fw-bold mb-3" style="color: #000000;"><span class="text-dark">{{ $property->prix }}</span>  MAD</h5>
                                        <p class="d-block text-dark h5 mb-2">{{ $property->title }}</p>
                                        <p class="text-dark"><i class="fa fa-map-marker-alt me-2" style="color: #4b13f3;"></i>{{ $property->city->name }}</p>
                                        <a class="btn d-flex justify-content-end align-items-end mb-3" data-tracking="click" data-value="listing-whatsapp" data-slug="495978" aria-label="Whatsapp" target="_blank" rel="noreferrer nofollow noopener" href="https://api.whatsapp.com/send?phone=+212619969568&amp;text=Bonjour, j'ai vu le bien mis en vente sur agency ( {{$property->title}} ), Ref: 12_75MA{{$property->id}}, et je souhaite prendre rendez-vous pour une visite. Merci. %0ahttp://127.0.0.1:8000/properties"> <i class="fa-brands fa-whatsapp fa-2xl" style="color: #2f7c0e;"></i></a>
                                    </div>

                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center text-dark border-end py-2"><i class="fa fa-ruler-combined me-2" style="color: #4b13f3;"></i>{{ $property->caracteristiques->surface }} m²</small>
                                        <small class="flex-fill text-center text-dark border-end py-2"><i class="fa fa-bed me-2" style="color: #4b13f3;"></i>{{ $property->caracteristiques->number_rooms }} Chambres</small>
                                        <small class="flex-fill text-center text-dark py-2"><i class="fa fa-bath me-2" style="color: #4b13f3;"></i>{{ $property->caracteristiques->number_salleBain }} Bain</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var categorieSelect = document.getElementById('categorie_id');

        categorieSelect.addEventListener('change', function () {
            var categorieId = categorieSelect.value;
            console.log(categorieId);
            var url = "{{ route('properties') }}";
            if (categorieId !== '') {
                url += '?categorie_id=' + categorieId;
                console.log(url);
            }

            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        document.getElementById('property-list').innerHTML = response.view;
                    } else {
                        console.error('Une erreur s\'est produite.');
                    }
                }
            };

            xhr.send();
        });
    });
</script>
@endsection