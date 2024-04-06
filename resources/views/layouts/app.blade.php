{{-- app.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Agency</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div class="container">
    <nav  class="navbar navbar-expand-lg w-100    navbar-light bg-light  fixed-top shadow-sm h-lg-25" style="top: -5;" >
        <div class="container">
            <a href="/" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="{{asset('images/logo/icon-deal.png')}}" alt="Icon" style="width: 30px; height: 30px;">
                </div>
                <h5 class="m-0 " style="color: #00B98E;">Agency</h5>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Acheter
                        </a>
                        <ul class="dropdown-menu above position-absolute   " aria-labelledby="navbarDropdown" style="width: 999px;  margin-right:50px;">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mx-3 text-muted">Annonces</p>
                                    <ul class="list-unstyled mx-3" >
                                        <li><a class="dropdown-item fw-bold" href="#">Toutes les annonces <i class="fa-solid fa-arrow-right"></i></a></li>
                                        <li><a class="dropdown-item fw-bold" href="#">Immobilier Neuf <i class="fa-solid fa-arrow-right"></i></a></li>
                                        <li><a class="dropdown-item fw-bold" href="#">Investir dans un studio <i class="fa-solid fa-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <p class="mx-3 text-muted">Ressources</p>
                                    <ul class="list-unstyled mx-3">
                                        <li><a class="dropdown-item fw-bold" href="#">Le guide de l'acheteur au Maroc <i class="fa-solid fa-arrow-right"></i></a></li>
                                        <li><a class="dropdown-item fw-bold" href="#">Demander une expertise agréée <i class="fa-solid fa-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Vendre
                        </a>
                        <ul class="dropdown-menu above position-absolute  " aria-labelledby="navbarDropdown" style="width: 999px;  margin-right:50px;">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mx-3 text-muted">Mes options</p>
                                    <ul class="list-unstyled mx-3">
                                        <li><a class="dropdown-item fw-bold" href="#">Vendre rapidement avec agency <i class="fa-solid fa-arrow-right"></i> </a></li>
                                        <li><a class="dropdown-item fw-bold" href="#">Vendre tout seul <i class="fa-solid fa-arrow-right"></i></a></li>
                                        <li><a class="dropdown-item fw-bold" href="#">Trouver un agent <i class="fa-solid fa-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <p class="mx-3 text-muted">Ressources</p>
                                    <ul class="list-unstyled mx-3">
                                        <li><a class="dropdown-item fw-bold" href="#">Combien coûte ma maison ? <i class="fa-solid fa-arrow-right"></i></a></li>
                                        <li><a class="dropdown-item fw-bold" href="#">Le guide du crédit <i class="fa-solid fa-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Crédit immobilier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Prix immobilier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Louer</a>
                    </li>
                    
                </ul>
                <div class="navbar-nav  ">
                    <li class="nav-item me-3  mb-3 mb-md-0">
                        <div class="btn-group " style="display: block;">
                            <button type="button" class="btn   dropdown-toggle dropdown-toggle-split text-white"  style="background-color: #00B98E;"  data-bs-toggle="dropdown" aria-expanded="false">
                                Publier une annonce
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item btncard" href="{{route('create.maison-riad-villa')}}">Maison, Riad ou Villa <i class="fa-solid fa-arrow-right"></i></a></li>
                              <li><a class="dropdown-item btncard" href="{{route('create.appartement-studio-bureau')}}">Appartement, Studio, ou bureau<i class="fa-solid fa-arrow-right"></i></a></li>
                              <li><a class="dropdown-item btncard" href="{{route('create.local-commerce')}}">local commerce <i class="fa-solid fa-arrow-right"></i></a></li>
                              <li><a class="dropdown-item btncard" href="{{route('create.Chambres')}}">Chambres <i class="fa-solid fa-arrow-right"></i></a></li>
                              <li><a class="dropdown-item btncard" href="{{route('create.terrain-immobilier')}}">Terain <i class="fa-solid fa-arrow-right"></i></a></li>
                            </ul>
                          </div>
                                              
                    </li>
                    @guest
                    <li class="nav-item">
                        <a href="{{route('register')}}" class="btn btn-outline-dark btncard"  style=" color: rgb(9, 135, 238); border-color: rgb(9, 177, 244);">Connexion <i class="fa-regular fa-user"></i></a>
                    </li>

                    
                    @endguest
                    

                    @auth
                    <div class="btn-group " style="display: block;">
                        <button type="button"  style=" color: rgb(9, 135, 238); border-color: rgb(9, 177, 244); " class="btn  btn-outline-dark btncard  dropdown-toggle dropdown-toggle-split "  data-bs-toggle="dropdown" aria-expanded="false">
                             <i class="fa-regular fa-user"></i>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Dashboard</a></li>
                          <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                          <li><a class="dropdown-item" href="{{route('logout') }}">Log Out</a></li>
                          <li> <form action="{{route('logout') }}" method="post" class="dropdown-item">
                            @csrf
                            @method('post')
                            <button type="submit"
                                class="  btn">Logout</button>
                        </form></li>
                        </ul>
                      </div>
            @endauth
                </div>
                
            </div>
        </div>
    </nav>
</div>

    <div class="container" style="margin-top: 78px;   overflow: hidden;  "> 
        @yield('content')
    </div>

    <footer class="text-center p-3 px-4  text-sm-start" >
        <hr class="mt-0 " style="border-color:  rgba(230, 212, 245, 0.783);">

        <div class="row">
                <div class="col-lg-4 col-md-12 mb-md-0 " style="background-color: rgba(206, 172, 236, 0);">
                    <h5 class="text-uppercase fw-bold">À propos</h5>
                    <p class="small" style="font-size:10px;">Agency a pour mission de rendre le marché immobilier au Maroc plus transparent et d'offrir des solutions d’analyse pour ceux qui cherchent à acheter, vendre ou obtenir une estimation du prix immobilier. Notre équipe unique au Maroc, composée d'experts immobiliers et de data-scientists, conçoit des outils innovants pour permettre à nos clients de prendre des décisions immobilières éclairées, d’accélérer leur activité, et d'obtenir les meilleures estimations de prix immobilier.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-md-0 " >
                    <h5 class="text-uppercase fw-bold">Nos données</h5>
                    <p class="small " style="font-size:10px;" >Nous collectons, analysons et structurons en continu des données liées au marché de l’immobilier au Maroc, notamment les offres, les transactions, les données cadastrales, socio-démographiques, et bien plus encore, afin de fournir une estimation précise à ceux qui souhaitent acheter ou vendre des propriétés.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-md-0 " >
                    <h5 class="text-uppercase fw-bold">Notre technologie</h5>
                    <p class="small" style="font-size :10px;">Nos data-scientists utilisent des algorithmes de Machine Learning pour développer les solutions d’estimations de prix immobilier les plus précises au Maroc, garantissant ainsi une excellente base de décision pour acheter ou vendre.</p>
                </div>
            </div>
            <div class="row "  >
                <div class="col-md-12">
                    <hr class="mt-0 mb-4" style="border-color: rgba(39, 4, 39, 0.982);">
                    <a href="/" class="navbar-brand d-flex align-items-center text-center">
                        <div class="icon p-2 me-2">
                            <img class="img-fluid" src="{{asset('images/logo/icon-deal.png')}}" alt="Icon" style="width: 30px; height: 30px;">
                        </div>
                        <h5 class="m-0 text-primary">Agency</h5>
                    </a>
                   
                    <div class="social-icons d-flex justify-content-center gap-5">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f fa-lg"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin fa-lg"></i>
                        </a>
                       
                       
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="social-icon">
                            <img src="{{asset('images/logo/Verified by Visa.svg')}}" style="height: 90px; width:90px;" alt="">
                        </a>
                        <a href="#" class="social-icon">
                            <img src="{{asset('images/logo/MasterCard SecureCode Grey.svg')}}" style="height: 90px; width:90px;" alt="">
                        </a>
                    </div>
                    <p class="small my-4 d-flex justify-content-end" style="color: rgb(0, 0, 0);">© 2024 Agency</p>
                   
                </div>
                
            </div>
            <hr class="mt-0 " style="border-color: rgba(184, 15, 184, 0.982);">

    </footer>
    
    
    
    

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        AOS.init();
      </script>

      <script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
     });
      </script>



<script>
     $(document).ready(function(){
     $('#filter-form').submit(function(e){
         e.preventDefault(); 
         var formData = $(this).serialize(); 
         $.ajax({
             url: "{{ route('properties.filter') }}", 
             method: 'POST', 
             data: formData, 
             success: function(response){ 
                 $('#property-list').html(response.html); 
             },
             error: function(xhr, status, error){ 
                 console.error(error); 
             }
         });
         return false; 
     });
 });


 </script>


<script>

$('#apply-filters').click(function() {
    var formData = $('#advanced-filter-form').serialize();
    $.ajax({
        url: "{{ route('properties.filter') }}",
        method: 'POST',
        data: formData,
        success: function(response) {
            $('#property-list').html(response.html);
            $('#exampleModal').modal('hide');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});

</script>



<script>
    var page = 1;
    var loading = false;
    var lastProperty = false;

    function loadMoreProperties() {
        if (loading || lastProperty) return;

        var scrollTop = $(window).scrollTop();
        var windowHeight = $(window).height();
        var documentHeight = $(document).height();

        if (scrollTop + windowHeight >= $('#new-properties').last().offset().top) {
            loading = true;
            page++;

            $('#loading-indicator').show();

            setTimeout(function() {
                $.ajax({
                    url: "{{ route('properties.filter') }}",
                    type: "POST",
                    data: $('#filter-form').serialize() + '&page=' + page,
                    success: function(response) {
                        if (response.html.trim() != '') {
                            $('#new-properties').append(response.html);
                            loading = false;
                        } else {
                            lastProperty = true; 
                        }
                        $('#loading-indicator').hide();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        loading = false;
                        $('#loading-indicator').hide();
                    }
                });
            }, 500); 
        }
    }

    $(window).on('scroll', loadMoreProperties);
</script>






</body>
</html>