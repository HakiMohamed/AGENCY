{{-- welcome.blade.php --}}
@extends('layouts.app')

@section('content')
<section class="primarySection overflow-x-hidden" style="background-image: linear-gradient(to bottom, rgba(247, 237, 246, 0.82), rgba(215, 186, 240, 0.783));">
    <div class="row flex-wrap-reverse">
        <div class="col-md-6   mb-4" style="background-color: rgba(255, 255, 255, 0);">
            <h1 class="fw-bold px-4">Cherchez plus simplement votre nouvel bien immobilier</h1>
            <form class="px-4">
                <div class="mb-3">
                    <label for="propertyType" class="form-label fw-semibold">Type de bien</label>
                    <select id="propertyType" class="form-select  fw-bold" style="background-color: #b07cdd44;">
                        <option  value="buy">À vendre</option>
                        <option  value="rent">À louer</option>
                        <option  value="mortgage">Hypothèque</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label fw-semibold" >Localisation</label>
                    <input type="text" class="form-control " style="background-color: #b07cdd44;" id="location" placeholder="Entrez la localisation">
                </div>
                <div class="mb-3">
                    <label for="propertyCategory" class="form-label fw-semibold">Catégorie de bien immobilier</label>
                    <select id="propertyCategory" class="form-select  fw-bold" style="background-color: #b07cdd44;">
                        <option value="house">Maison</option>
                        <option value="villa">Villa</option>
                        <option value="apartment">Appartement</option>
                        <option value="commerce">Commerce</option>
                        <option value="room">Chambre</option>
                    </select>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label for="minBeds" class="form-label fw-semibold">chambres</label>
                        <input type="number" style="background-color: #b07cdd44;" class="form-control" id="minBeds" placeholder="Nombre de chambres minimum">
                    </div>
                    <div class="col">
                        <label for="minBaths" class="form-label fw-semibold">salles bain</label>
                        <input type="number" style="background-color: #b07cdd44;" class="form-control" id="minBaths" placeholder="Nombre de salles de bain minimum">
                    </div>
                    <div class="col">
                        <label for="minPrice" class="form-label fw-semibold">Prix min</label>
                        <input type="number" style="background-color: #b07cdd44;" class="form-control" id="minPrice" placeholder="Prix minimum">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label for="maxPrice" class="form-label fw-semibold">Prix max</label>
                        <input type="number" style="background-color: #b07cdd44;" class="form-control" id="maxPrice" placeholder="Prix maximum">
                    </div>
                    <div class="col">
                        <label for="minArea" class="form-label fw-semibold">Surface min</label>
                        <input type="number" style="background-color: #b07cdd44;" class="form-control" id="minArea" placeholder="Surface minimum">
                    </div>
                    <div class="col">
                        <label for="maxArea" class="form-label fw-semibold">Surface max</label>
                        <input type="number" style="background-color: #b07cdd44;" class="form-control" id="maxArea" placeholder="Surface maximum">
                    </div>
                    <button type="submit" class="btn text-white mt-3" style="background-color: rgb(92, 57, 197);">Rechercher</button>

                </div>
            </form>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <img src="{{ asset('images/logo/img.webp') }}" class="img-fluid" alt="Thumbnail">
        </div>
    </div>
</section>

<section class="secondSection overflow-x-hidden" style="background-image: linear-gradient(to bottom, rgba(215, 186, 240, 0.804), rgba(255,255,255,0.9));">
    <div class="row">
        <div class="col-md-4 mb-5 ">
            <div class="card h-100 border-0 card-left" style="background-color: rgba(240, 248, 255, 0);">
                <img src="{{ asset('images/logo/For sale-amico.svg') }}" class="card-img-top" alt="Image 1">
                <div class="card-body h-100 mx-4 d-flex flex-column align-items-center">
                    <h4 class="card-title fw-bold mb-4">Vendez votre bien plus simplement</h4>
                    <p class="card-text">Confiez-nous la vente de votre bien immobilier et profitez d'une expérience sans souci. Notre équipe experte s'occupe de tout, de la mise en valeur de votre propriété à la conclusion de la vente, pour des résultats rapides et probants.</p>
                    <div class="mt-auto">
                    <a href="#" class="btn btn-outline btncard " style=" color: rgb(73, 33, 194); border-color: rgb(73, 33, 194);" >Découvrir nos services</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card border-0 h-100 card-center" style="background-color: rgba(240, 248, 255, 0);">
                <img src="{{ asset('images/logo/House searching-pana.svg') }}" class="card-img-top" alt="Image 2">
                <div class="card-body h-100 mx-4 d-flex flex-column align-items-center">
                    <h4 class="card-title fw-bold mb-4" style="margin-right: 30px;">Trouvez votre bien idéal</h4>
                    <p class="card-text">Utilisez notre plateforme de recherche avancée pour trouver la maison, la villa, l'appartement ou le commerce parfaitement adapté à vos besoins. Avec notre outil intuitif, vous pouvez filtrer les résultats selon vos critères spécifiques, tels que le nombre de chambres, les commodités incluses, la localisation et bien plus encore</p>
                    <div class="mt-auto">
                    <a href="#" class="btn btn-outline btncard " style=" color: rgb(73, 33, 194); border-color: rgb(73, 33, 194);" >Parcourir nos annonces</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5 ">
            <div class="card border-0 h-100 card-right" style="background-color: rgba(240, 248, 255, 0);">
                <img src="{{ asset('images/logo/Realtor-amico.svg') }}" class="card-img-top" alt="Image 3">
                <div class="card-body h-100 mx-4 d-flex flex-column align-items-center">
                    <h4 class="card-title fw-bold mb-4" style="margin-right: 30px;">Estimation du prix</h4>
                    <p class="card-text">Utilisez notre service d'estimation en ligne pour obtenir une évaluation rapide et précise de votre bien immobilier. Notre outil vous fournira gratuitement le prix de votre maison ou de votre appartement, ainsi que le loyer de marché, le tout mis à jour régulièrement pour refléter les tendances du marché immobilier</p>
                    <div class="mt-auto">
                    <a href="{{route('estimer')}}" class="btn btn-outline btncard " style=" color: rgb(73, 33, 194); border-color: rgb(73, 33, 194);" >Estimation du prix</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="thirdSection overflow-x-hidden" style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.9)  , rgba(206, 172, 236, 0.804));">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
            <div class="text-center">
                <h2 class="fw-bold">Prix de l'immobilier au Maroc</h2>
                <p class="mx-4">Découvrez le prix du m² autour de vous. Le prix du m2 dans les grandes villes du Maroc.</p>
                <a href="#" class="btn  btn-outline btncard" style=" color: rgb(73, 33, 194); border-color: rgb(73, 33, 194);">Découvrir</a>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <img src="{{ asset('images/logo/PrixMaroc.webp') }}" class="img-fluid" alt="Thumbnail">
        </div>
    </div>
</section>

<section class="FourSection overflow-x-hidden" style="background-image: linear-gradient(to bottom , rgba(206, 172, 236, 0.804), rgba(224, 190, 219, 0.9));">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            <img src="{{ asset('images/logo/Realtor (1).gif') }}" class="img-fluid" alt="Thumbnail">
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <div class="text-center">
                <h2 class="fw-bold">Vous êtes agent immobilier ?</h2>
                <p class="mx-4">Découvrez nos solutions pro d’estimations, d’étude de marché et de conseil qui couvrent l’ensemble de la chaîne de valeurs de l’immobilier. Accélerez votre activité et offrez une expérience digitale unique pour vos clients avec Agency</p>
                <a href="#" class="btn  btn-outline btncard" style=" color: rgb(73, 33, 194); border-color: rgb(73, 33, 194);">Découvrir</a>
            </div>
        </div>
        
    </div>
</section>

<section class="faqSection overflow-x-hidden" style="background-image: linear-gradient(to bottom, rgba(224, 190, 219, 0.9), rgba(206, 172, 236, 0.804));">
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
</section>



@endsection
