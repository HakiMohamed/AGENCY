{{-- property_list.blade.php --}}



@foreach ($properties as $property)
    <div class="col-lg-4 col-md-6 property-item  wow fadeInUp" data-wow-delay="0.1s">
        <a class="link-underline-opacity-0 text-decoration-none" href="#">
            <div class="property-item rounded overflow-hidden">
                <div class="position-relative overflow-hidden"> 
                    <div id="carouselProperty{{ $property->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($property->images as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($image->url) }}" class="d-block w-100 " style=" height:300px;" alt="Property Image">
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
                    <div style="color: #4b13f3; border-color: #4b13f3;" class="rounded btn  btn-outline fw-bold btncard   position-absolute end-0 top-0 m-4 py-1 px-3">{{ $property->categorie->name }}</div>
                    <div class="bg-white rounded-top  position-absolute start-0 fw-bold bottom-0 mx-4 pt-1 px-3" style="color: #4b13f3;">{{ $property->type->name }}</div>
                </div>

                

                <div class="p-4 pb-0">
                    <h5 class="fw-bold mb-3" style="color: #000000;"><span class="text-dark">{{ $property->prix }}</span>  MAD   @if($property->categorie->name =='A LOUER') /Mois @endif</h5>
                    <p class="d-block text-dark h5 mb-2">{{ $property->title }}</p>
                    <p class="text-dark"><i class="fa fa-map-marker-alt me-2" style="color: #4b13f3;"></i>{{ $property->city->name }}</p>
                    <p class="text-dark text-truncate"><i class="fa-solid fa-file-lines" style="color: #4b13f3;"></i> {{ $property->description }}</p>
                    
                    <div class="d-flex ">
                        <a class="btn mb-3 d-flex justify-content-start" data-tracking="click" data-value="listing-whatsapp" data-slug="495978" aria-label="Whatsapp" target="_blank" rel="noreferrer nofollow noopener" href="https://api.whatsapp.com/send?phone=+212619969568&amp;text=Bonjour, j'ai vu le bien mis en vente sur agency ( {{$property->title}} ), Ref: 12_75MA{{$property->id}}, et je souhaite prendre rendez-vous pour une visite. Merci. %0ahttp://127.0.0.1:8000/properties"> <i class="fa-brands fa-whatsapp fa-xl" style="color: #2f7c0e;"></i></a>
                        <form method="POST" action="" class="">
                            @csrf
                            <input type="hidden" name="property_id" value="">
                            <button type="submit" class="btn d-flex justify-content-end"><i class="fa-regular fa-bookmark fa-lg"></i></button>
                        </form>
                    </div>
                    
                   
                </div>

                <div class="d-flex border-top" style="height: 50px;">
                    <small class="flex-fill text-center text-dark border-end py-2"><i class="fa fa-ruler-combined me-2" style="color: #4b13f3;"></i>{{ $property->caracteristiques->surface }} m²</small>
                    @if($property->type->id !== 8 && $property->type->id !== 9 && $property->type->id !== 13)
                    <small class="flex-fill text-center text-dark border-end py-2"><i class="fa fa-bed me-2" style="color: #4b13f3;"></i>{{ $property->caracteristiques->number_rooms }} Chambres</small>
                    <small class="flex-fill text-center text-dark py-2"><i class="fa fa-bath me-2" style="color: #4b13f3;"></i>{{ $property->caracteristiques->number_salleBain }} Bain</small>
                    <small class="flex-fill text-center text-dark py-2"><i class="fa-solid fa-person-booth me-2" style="color: #4b13f3;"></i>{{ $property->caracteristiques->number_sallon }} Salon</small>
                @endif
                 
                
                </div>
                <a class="btn d-flex text-small text-white justify-content-center align-items-center text-center voirplusbutton    " style="z-index: -9999" >Voir plus <i class="fa-solid fa-eye" style="margin-top: 5px; margin-left:5px;"></i>    </a>
            </div>
            
        </a>
    </div>
    
@endforeach



   



