{{-- welcome.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container-fluid"   >
    <div class="row flex flex-wrap-reverse"    >
        <div class="col-md-6   mt-md-5 "   >
            <h1 class="display-5 mb-4 fw-bold">Trouvez <span  style="color: #00B98E;">le bien parfaite</span> pour Vous</h1>
            <p class="mb-4 pb-2">Utilisez notre plateforme de recherche avancée pour trouver la maison, la villa, l'appartement ou le commerce parfaitement adapté à vos besoins. </p>
            <a href="{{route('properties')}}" class="btn text-white btncard py-3 " style="background-color: #00B98E;">Liste des properties <i class="fa-solid fa-arrow-right"></i>  </a>
        </div>
        
        <div class="col-md-6 "  >
            <div id="headerCarousel" class="carousel slide " data-bs-ride="carousel"  >
                <div class="carousel-inner "  >
                    <div class="carousel-item active"  >
                        <img class="img-fluid" src="{{ asset('images/logo/carousel-1.jpg') }}" alt="">
                    </div>
                    <div class="carousel-item" >
                        <img class="img-fluid" src="{{ asset('images/logo/carousel-2.jpg') }}" alt="">
                    </div>
                    <div class="carousel-item" >
                        <img class="img-fluid mt-2" src="{{ asset('images/logo/img.webp') }}" alt="">
                    </div>
                </div>
                <button class="carousel-control-prev custom-carousel-control" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next custom-carousel-control" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid py-3 mt-5 wow fadeIn"  style="background-color: #00B98E;" data-wow-delay="0.1s" >
    <div class="container">
        <div class="row g-2">
            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" class="form-control border-0 py-3" placeholder="Search Keyword">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select border-0 py-3">
                            <option selected>Property Type</option>
                            <option value="1">Property Type 1</option>
                            <option value="2">Property Type 2</option>
                            <option value="3">Property Type 3</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select border-0 py-3">
                            <option selected>Location</option>
                            <option value="1">Location 1</option>
                            <option value="2">Location 2</option>
                            <option value="3">Location 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark border-0 w-100 py-3">Search</button>
            </div>
        </div>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Property Types</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <div data-aos="fade-right" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark"  href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-apartment.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Apartment</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div data-aos="fade-left" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-villa.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Villa</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div data-aos="fade-up-right" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-house.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Home</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div data-aos="fade-up-left" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-housing.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Office</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div data-aos="fade-up" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-building.png ') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Building</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div data-aos="fade-down-right" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-neighborhood.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Townhouse</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div data-aos="fade-down-left" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-condominium.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Shop</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div data-aos="flip-left" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none  text-dark " href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-luxury.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Garage</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<section class="thirdSection overflow-x-hidden" >
    <div class="container">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
            <div class="text-center">
                <h2 class="fw-bold">Prix de l'immobilier au Maroc</h2>
                <p class="mx-4">Découvrez le prix du m² autour de vous. Le prix du m2 dans les grandes villes du Maroc.</p>
                <a href="#" class="btn  btn-outline-primary btncard" >Découvrir</a>
            </div>
        </div>
        <div data-aos="flip-right" class="col-md-6 d-flex justify-content-center">
            <img src="{{ asset('images/logo/PrixMaroc.webp') }}" class="img-fluid" alt="Thumbnail">
        </div>
    </div>
    </div>
</section>

<section class="FourSection overflow-x-hidden" >
    <div class="container">
    <div class="row">
        <div data-aos="flip-left" class="col-md-6 d-flex justify-content-center">
            <img src="{{ asset('images/Realtor-bro.svg') }}" class="img-fluid" alt="Thumbnail">
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <div class="text-center">
                <h2 class="fw-bold">Vous êtes agent immobilier ?</h2>
                <p class="mx-4">Découvrez nos solutions pro d’estimations, d’étude de marché et de conseil qui couvrent l’ensemble de la chaîne de valeurs de l’immobilier. Accélerez votre activité et offrez une expérience digitale unique pour vos clients avec Agency</p>
                <a href="#" class="btn  btn-outline-primary btncard" >Découvrir</a>
            </div>
        </div>
        
    </div>
    </div>
</section>

<section class="faqSection overflow-x-hidden" >
    <div class="container">
    <div class="container py-5 " >
        <h2 class="text-center fw-bold mb-5">FAQ</h2>

        <div class="accordion " id="faqAccordion" >
            <div class="accordion-item" style="background-color: rgba(240, 248, 255, 0);" >
                <h3 class="accordion-header" id="question1" >
                    <button class="accordion-button collapsed fw-bold "style="background-color: rgba(240, 248, 255, 0);"  type="button" data-bs-toggle="collapse" data-bs-target="#answer1" aria-expanded="false" aria-controls="answer1">
                        Qu'est-ce que Agency ?
                    </button>
                </h3>
                <div id="answer1" class="accordion-collapse collapse" aria-labelledby="question1" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Agency est une plateforme qui réinvente l'immobilier au Maroc, pour aider chaque personne à vendre, acheter, et se financer plus simplement. Sur Agency, vous pouvez estimer puis vendre votre bien grâce à un suivi personnalisé de votre conseiller. Si vous souhaitez acheter, vous pouvez consulter nos annonces de biens exclusifs puis trouver le meilleur immobilier pour vos rêves.
                    </div>
                </div>
            </div>

            <div class="accordion-item" style="background-color: rgba(240, 248, 255, 0);">
                <h3 class="accordion-header" id="question2">
                    <button class="accordion-button collapsed fw-bold" style="background-color: rgba(240, 248, 255, 0);" type="button" data-bs-toggle="collapse" data-bs-target="#answer2" aria-expanded="false" aria-controls="answer2">
                        Qu'est-ce qu'une estimation immobilière en ligne ?
                    </button>
                </h3>
                <div id="answer2" class="accordion-collapse collapse" aria-labelledby="question2" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        L'estimation immobilière en ligne permet de se faire une première idée du prix de vente d'un bien. L'estimation est calculée automatiquement en fonction des ventes récentes autour du bien estimé. Pour obtenir votre estimation en ligne, il faut localiser le bien à estimer puis renseigner des informations sur les caractéristiques du bien (étage, ancienneté, âge du bien...).
                    </div>
                </div>
            </div>

            <div class="accordion-item" style="background-color: rgba(240, 248, 255, 0);">
                <h3 class="accordion-header" id="question3">
                    <button class="accordion-button collapsed fw-bold" style="background-color: rgba(240, 248, 255, 0);" type="button" data-bs-toggle="collapse" data-bs-target="#answer3" aria-expanded="false" aria-controls="answer3">
                        Comment vendre mon appartement ou ma maison ?
                    </button>
                </h3>
                <div id="answer3" class="accordion-collapse collapse" aria-labelledby="question3" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Pour vendre sur Agency, il vous suffit de compléter le formulaire d'estimation en ligne. Un conseiller vous rappellera pour vous mettre en relation avec l'agence la plus performante de votre quartier, et faire le suivi de la relation jusqu'à la vente de votre bien.
                    </div>
                </div>
            </div>

            <div class="accordion-item" style="background-color: rgba(240, 248, 255, 0);">
                <h3 class="accordion-header" id="question4">
                    <button class="accordion-button collapsed fw-bold" style="background-color: rgba(240, 248, 255, 0);" type="button" data-bs-toggle="collapse" data-bs-target="#answer4" aria-expanded="false" aria-controls="answer4">
                        Puis-je acheter un appartement sur Ageny ?
                    </button>
                </h3>
                <div id="answer4" class="accordion-collapse collapse" aria-labelledby="question4" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Oui, vous pouvez trouver votre nouvel bien dans notre rubrique achat.
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>




@endsection
