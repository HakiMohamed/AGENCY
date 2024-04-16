{{-- properties.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 " style="overflow-x: hidden;">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" style="width: 160px; margin-left:35px;" class="btn d-flex mx-md-4 my-md-0  btn-outline-success btncard">
                <span class="align-items-center">Filter Avancé</span>
                <i class="fa-solid fa-sliders ms-2"></i>
            </button>
            <div class="col-lg-12  my-3 d-flex justify-content-end align-items-end text-lg-end wow slideInRight" data-wow-delay="0.1s">
                
                <form id="filter-form" class="d-flex flex-wrap flex-md-nowrap">
                    <input type="text" name="title" class="form-control px-5 mx-2  mx-md-1  my-md-0 my-1 mx-2 " placeholder="Rechercher un mot clé">
                    <select class="form-select mx-md-3  my-md-0 my-1 mx-2" id="categorie_id" name="categorie_id" aria-label="Filtrer les affichages">
                        <option value="">Toutes categories</option>
                        <option value="1">Hypothécaire</option>
                        <option value="2">A VENDRE</option>
                        <option value="3">A LOUER</option>  
                    </select>
            
                    <select class="form-select mx-md-3  my-md-0 my-1 mx-2" id="city_id" name="city_id" aria-label="Filtrer par ville">
                        <option value="">Toutes les villes</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>

                    <select class="form-select mx-md-3  my-md-0 my-1 mx-2" id="type_id" name="type_id" aria-label="Filtrer par ville">
                        <option value="">Toutes Les Types</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-outline-success  justify-content-center btncard mx-md-1 my-md-0 my-2 mx-2 d-flex flex-grow-1" type="submit">Filtrer   <i class="fa-brands fa-searchengin " style="margin-left: 4px;"></i></button>
                </form>
            </div>

            

 
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center  text-white " style="background-color: #00B98E;">
                            <h5 class="modal-title fw-bold  ml-5 border-2" id="exampleModalLabel">Filtre avancé</h5>
                            <button type="button" class="btn-close "  data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="background-color: #d0f1ea;">
                            <form id="advanced-filter-form">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="categorie_id" class="form-label">Catégorie</label>
                                        <select class="form-select" id="categorie_id" name="categorie_id" aria-label="Filtrer les affichages">
                                            <option value="">Toutes categories</option>
                                            <option value="1">Hypothécaire</option>
                                            <option value="2">A VENDRE</option>
                                             <option value="3">A LOUER</option>  
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="city_id" class="form-label">Ville</label>
                                        <select class="form-select" id="city_id" name="city_id" aria-label="Filtrer par ville">
                                            <option value="">Toutes les villes</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="type_id" class="form-label">Type</label>
                                        <select class="form-select" id="type_id" name="type_id" aria-label="Filtrer par type">
                                            <option value="">Toutes Les Types</option>
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="RezDeChaussé" name="RezDeChaussé" value="1">
                                            <label class="form-check-label" for="RezDeChaussé">Rez-de-chaussée</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="balcon" name="balcon" value="1">
                                            <label class="form-check-label" for="balcon">Balcon</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="terrasse" name="terrasse" value="1">
                                            <label class="form-check-label" for="terrasse">Terrasse</label>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="piscine" name="piscine" value="1">
                                            <label class="form-check-label" for="piscine">Piscine</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <label for="ascenseur" class="form-label">Ascenseur</label>
                                            <input class="form-check-input" type="checkbox" id="ascenseur" name="ascenseur" value="1">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="jardin" name="jardin" value="1">
                                            <label class="form-check-label" for="jardin">Jardin</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="parking" name="parking" value="1">
                                            <label class="form-check-label" for="parking">Parking</label>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="number_rooms" class="form-label">Nombre de chambres</label>
                                        <input type="text" id="number_rooms" name="number_rooms" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="number_sallon" class="form-label">Nombre de salons</label>
                                        <input type="text" id="number_sallon" name="number_sallon" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="number_salleBain" class="form-label">Nombre de salles de bain</label>
                                        <input type="text" id="number_salleBain" name="number_salleBain" class="form-control">
                                    </div>
                                </div>
            
                                <div class="row">
                                   
                                    <div class="col-md-4 mb-3">
                                        <label for="etage" class="form-label">Étage</label>
                                        <input type="text" id="etage" name="etage" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="surface" class="form-label">Surface</label>
                                        <input type="text" id="surface" name="surface" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer text-white" style="background-color:  #00B98E;">
                            <button type="button" class="btn text-white" style="background-color: rgb(255, 196, 0);"  data-bs-dismiss="modal">Fermer</button>
                            <button type="button" class="btn text-white"  style="background-color: rgb(9, 138, 22);"  id="apply-filters">Appliquer</button>
                        </div>
                    </div>
                </div>
            </div>
            
            
            




            
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4 shadow-0 align-items-stretch"  id="property-list">
                    @include('properties.property_list')
                </div>
                
                
                <div class="row g-4 mt-2" id="new-properties">
                    
                </div>
                <div id="loading-indicator" class="text-center" style="display: none;">
                    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Loading...</p>
                </div>
                
                {{-- <div id="pagination-links" class="text-center">
                    <p>{{ $properties->links() }}</p>  
                  </div> --}}
            </div>

        </div>
    </div>
</div>






@endsection





