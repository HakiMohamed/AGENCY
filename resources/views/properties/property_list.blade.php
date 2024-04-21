{{-- property_list.blade.php --}}



@foreach ($properties as $property)
    <div class="col-lg-4 col-md-6 property-item   wow fadeInUp" style="height: 600px;"   data-wow-delay="0.1s">
            <div class="property-item rounded overflow-hidden">
                <div class="position-relative overflow-hidden"> 
                    <div id="carouselProperty{{ $property->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($property->images as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($image->url) }}" class="d-block w-100 " style=" height:300px; object-fit: cover;" alt="Property Image">
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
                    <div style="background-color: rgba(135, 135, 135, 0.432);" class="rounded btn  btn-secodary  text-white position-absolute start-0 top-0 mx-2 mb-1 m-4 ">{{ $property->created_at->locale('fr')->diffForHumans() }}</div>
                    <div style="color: #00b98ec8; border-color: #00b98ec8; background-color:rgb(255, 255, 255);" class="rounded btn  btn-outline fw-bold    position-absolute end-0 top-0 m-4 py-1 px-3">{{ $property->categorie->name }}</div>
                    <div class="bg-white rounded-top  position-absolute start-0 fw-bold bottom-0 mx-4 pt-1 px-3" style="color: #4b13f3;">{{ $property->type->name }}</div>
                    
                </div>

                

                <div class="p-4 pb-0 position-relative" style="height: 200px;">
                    
                    <h5 class="fw-bold mb-3" style="color: #000000;"><span class="text-dark">{{ $property->prix }}</span>  MAD   @if($property->categorie->name =='A LOUER') /Mois @endif</h5>
                    <p class="d-block text-dark h5 mb-2">{{ $property->type->name }} {{$property->categorie->name}} à {{ $property->city->name }}</p>
                    <span class="d-flex justify-content-between "> 
                    <p class="text-dark"><i class="fa fa-map-marker-alt me-2" style="color: #4b13f3;"></i>{{ $property->city->name }}</p>
                    @if($property->caracteristiques->etage)
                    <span class="text-dark">  <i class="fa-solid fa-up-down me-2" style="color: #4b13f3;">  </i>   Etage :   {{$property->caracteristiques->etage}} </span>
                  @endif
              </span>
                     
                    <div class="d-flex " style="justify-content: space-between">
                        <a href="https://api.whatsapp.com/send?phone=+212641725930&amp;text=Bonjour, j'ai vu le bien mis  {{$property->categorie->name}} sur agency ({{ $property->type->name }} {{$property->categorie->name}} à {{ $property->city->name }}), Ref: 12_75MA{{$property->id}}, et je souhaite prendre rendez-vous pour une visite. Merci. %0a{{ route('property.showDetail', $property->id) }}" class="btn mb-3 d-flex justify-content-start btnwhatspp" data-tracking="click" data-value="listing-whatsapp" data-slug="495978" aria-label="Whatsapp" target="_blank" rel="noreferrer nofollow noopener"> 
                          Planifier visite  <i class="fa-brands fa-whatsapp fa-xl" style="color: #ffffff; margin-top:9px; margin-left:8px;"></i>
                        </a>
                                              
                      


                    </div>
                    
                    <div class="favorite-icon position-absolute top-0 end-0 m-3">
                        @guest
                            <a href="{{ route('login') }}" class="btn">
                                <i class="fas fa-heart fa-2xl" style="color: #c1bebe;"></i>
                            </a>
                        @else
                        <span class="d-flex">
                        <span id="favoriteCount">{{ $property->favoritedBy()->count() }}</span> 
                            <form id="toggleFavoriteForm{{$property->id}}" action="{{ route('favorite-properties.toggle', ['propertyId' => $property->id]) }}" method="POST">
                                @csrf
                                <button type="button" class="heart-btn btn">
                                    <i class="fas fa-heart fa-2xl" style="color: {{ Auth::user()->favoriteProperties->contains($property) ? 'red' : '#c1bebe' }};"></i>
                                </button>
                            </form>
                        </span>
                        @endguest
                    </div>
                    
                </div>

                <div class="d-flex border-top" style="height: 50px; background-color:rgb(255, 255, 255);">
                    <small class="flex-fill text-center text-dark border-end py-2"><i class="fa fa-ruler-combined me-2" style="color: #4b13f3;"></i>{{ $property->caracteristiques->surface }} @if($property->type->name =='Terrain Immobilier') Ha @else m² @endif</small>
                    <small class="flex-fill text-center text-dark border-end py-2"><i class="fa fa-bed me-2" style="color: #4b13f3;"></i>{{ $property->caracteristiques->number_rooms }} Chambres</small>
                    <small class="flex-fill text-center text-dark py-2"><i class="fa fa-bath me-2" style="color: #4b13f3;"></i>{{ $property->caracteristiques->number_salleBain }} Bain</small>
                    <small class="flex-fill text-center text-dark py-2"><i class="fa-solid fa-person-booth me-2" style="color: #4b13f3;"></i>{{ $property->caracteristiques->number_sallon }} Salon</small>
                    
                </div>
                <div class="btn d-flex  voirplus text-small text-white justify-content-center align-items-center text-center voirplusbutton    " style="padding:0px;">
                    <a href="{{ route('property.showDetail', $property->id) }}" class="text-decoration-none text-white"  >Voir plus <i class="fa-solid fa-eye" style=" margin-left:5px;"></i>    </a>
                </div>
               
              
            </div>

            
    </div>

   
    
    
@endforeach






   



