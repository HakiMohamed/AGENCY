{{-- welcome.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex flex-wrap-reverse align-items-center">

       

        <div class="col-md-6 mt-md-5 mt-3">
            <h1 class="display-4 mb-4 fw-bold">Trouvez <span style="color: #00B98E;">le bien parfait</span> pour vous</h1>
            <p class="lead mb-4 pb-2">Utilisez notre plateforme de recherche avancée pour trouver la maison, la villa, l'appartement ou le commerce parfaitement adapté à vos besoins.</p>
            <a href="{{route('properties')}}" style="Background-color: #00B98E;" data-aos="flip-left" data-aos-duration="1000" class="btn d-flex justify-content-center   btncard text-white btn-lg  py-3">Consulté les propriétés <i class="fas fa-arrow-right"></i></a>
        </div>

        <div class="col-md-6">
            <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 mt-5" src="{{ asset('images/logo/1381389fa108cd8f6904a8449dbc32f5f1c62f7d-2562x2108.webp') }}" alt="">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 mt-4" src="{{ asset('images/logo/imghero1.jpg') }}" alt="">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 mt-4" src="{{ asset('images/logo/img.webp') }}" alt="">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 mt-5" src="{{ asset('images/logo/hero.e42c1d97.svg') }}" alt="">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>






<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow w-100 fadeInUp" data-wow-delay="0.1s"  >
            <h1 class="mb-3">Property Types</h1>
            <p></p>
        </div>
        <div class="row g-4">
            <div data-aos="fade-right" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a href="{{route('properties')}}" class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark"  href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-apartment.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Appartement</h6>
                        <span>Decouvrir</span>
                    </div>
                </a>
            </div>
            <div data-aos="fade-left" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a href="{{route('properties')}}" class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-villa.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Studio</h6>
                        <span>Decouvrir</span>
                    </div>
                </a>
            </div>
            <div data-aos="fade-up-right" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a href="{{route('properties')}}" class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-house.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Bureau</h6>
                        <span>Decouvrir</span>
                    </div>
                </a>
            </div>
            <div data-aos="fade-up-left" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a href="{{route('properties')}}" class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-housing.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Chambre</h6>
                        <span>Decouvrir</span>
                    </div>
                </a>
            </div>
            <div data-aos="fade-up" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a href="{{route('properties')}}" class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-building.png ') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Local Ecommerce</h6>
                        <span>Decouvrir</span>
                    </div>
                </a>
            </div>
            <div data-aos="fade-down-right" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a href="{{route('properties')}}" class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-neighborhood.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Maison</h6>
                        <span>Decouvrir</span>
                    </div>
                </a>
            </div>
            <div data-aos="fade-down-left" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a href="{{route('properties')}}" class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none text-dark" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-condominium.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Riad</h6>
                        <span>Decouvrir</span>
                    </div>
                </a>
            </div>
            <div data-aos="flip-left" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a href="{{route('properties')}}" class="cat-item d-block bg-light text-center rounded p-3 text-decoration-none  text-dark " href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('images/icon-luxury.png') }}" alt="Icon">
                        </div>
                        <h6 class="fw-bold">Villa</h6>
                        <span>Decouvrir</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<section class="thirdSection overflow-x-hidden" >
    <div class="container">
    <div class="row">
       
        <div data-aos="flip-right" class="col-md-4 d-flex justify-content-center">
            <img src="{{ asset('images/logo/be6931055401de99bc4ccc7e8b466d616bca37b3-2351x2148.webp') }}" class="img-fluid" alt="Thumbnail">
        </div>
        <div data-aos="flip-right" class="col-md-4 d-flex justify-content-center">
            <div class="text-center">
                <h2 class="fw-bold">Estimer vos biens immobilier?</h2>
                <p class="">Découvrez nos solutions pro d’estimations, d’étude de marché et de conseil qui couvrent l’ensemble de la chaîne de valeurs de l’immobilier. Accélerez votre activité et offrez une expérience digitale unique pour vos clients avec Agency</p>
                <a href="{{route('estimer')}}"  data-aos="flip-left" data-aos-duration="1000" style="text-decoration-color: #00B98E;" class="btn border-success  d-flex justify-content-center   btncard text-success   ">Estimation <i class="fas fa-arrow-right"></i></a>
            </div>      
          </div>
        <div data-aos="flip-right" class="col-md-4 d-flex justify-content-center">
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
                <a href="{{route('demandeAgentPage')}}"  data-aos="flip-left" data-aos-duration="1000" style="text-decoration-color: #00B98E;" class="btn border-success  d-flex justify-content-center my-5   btncard text-success   py-3">Découvrir <i class="fas fa-arrow-right"></i></a>
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



