{{-- app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <link rel="shortcut icon" href="{{ asset('images/logo/icon-deal.png')}}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div class="container">
    <nav  class="navbar navbar-expand-lg w-100    navbar-light bg-light  fixed-top shadow-sm h-lg-25" style="top: -5;" >
        <div class="container">
            <a href="/Acceuil" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="{{asset('images/logo/icon-deal.png')}}" alt="Icon" style="width: 30px; height: 30px;">
                </div>
                <h5 class="m-0 " style="color: #00B98E;">Agency</h5>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" mx-5 collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto ">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route("welcome") }}">Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('properties') ? 'active' : '' }}" href="{{ route("properties") }}">Proprietées</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('estimer') ? 'active' : '' }}" href="{{ route("estimer") }}">Estimation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('favorite-properties') ? 'active' : '' }}" href="{{route("favorite-properties")}}">Favorites</a>
                    </li>
                    
                </ul>
                <div class="navbar-nav  ">
                    <li class="nav-item me-3  mb-3 mb-md-0">
                        <div class="btn-group " style="display: block;">
                            <button type="button" class="btn   dropdown-toggle dropdown-toggle text-white"  style="background-color: #00B98E;"  data-bs-toggle="dropdown" aria-expanded="false">
                                Publier une annonce
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item btncard {{ request()->routeIs('maisons.create') ? 'primaryRoute' : '' }} "  href="{{ route('maisons.create') }}">Maison, Riad ou Villa <i class="fa-solid fa-arrow-right"></i></a></li>
                                <li><a class="dropdown-item btncard  {{ request()->routeIs('appartements.create') ? 'primaryRoute' : '' }} " href="{{ route('appartements.create') }}">Appartement, Studio, ou bureau<i class="fa-solid fa-arrow-right"></i></a></li>
                                <li><a class="dropdown-item btncard {{ request()->routeIs('localcommerces.create') ? 'primaryRoute' : '' }} " href="{{ route('localcommerces.create') }}">local commerce <i class="fa-solid fa-arrow-right"></i></a></li>
                                <li><a class="dropdown-item btncard  {{ request()->routeIs('chambres.create') ? 'primaryRoute' : '' }}  " href="{{ route('chambres.create') }}">Chambres <i class="fa-solid fa-arrow-right"></i></a></li>
                                <li><a class="dropdown-item btncard {{ request()->routeIs('terrains-immobiliers.create') ? 'primaryRoute' : '' }}  " href="{{ route('terrains-immobiliers.create') }}">Terain <i class="fa-solid fa-arrow-right"></i></a></li>
                            </ul>
                          </div>
                                              
                    </li>
                    @guest
                    <li class="nav-item">
                        <a href="{{route('register')}}" class="btn btn-outline-dark btncard"  style=" color: rgb(9, 135, 238); border-color: rgb(9, 177, 244);">Connexion <i class="fa-regular fa-user"></i></a>
                    </li>

                    
                    @endguest
                    

                    @auth
                    <div class="btn-group" style="display: block;">
                        <button type="button" style="color: rgb(9, 135, 238); border-color: rgb(9, 177, 244);" class="btn btn-outline-dark btncard dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-user"></i> {{ auth()->user()->firstname . " " . auth()->user()->lastname }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Edit Profile</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post" class="dropdown-item">
                                    @csrf
                                    <button type="submit" class="btn ">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
                
                </div>
                
            </div>
        </div>
    </nav>
</div>


    <div class="container element" style="margin-top: 78px;   overflow: hidden;  "> 
       
        
       
        
        
        @yield('content')
    </div>

    <footer class="text-center p-4 shadow-sm" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase fw-bold">À propos</h5>
                    <p class="small">Agency a pour mission de rendre le marché immobilier au Maroc plus transparent et d'offrir des solutions d’analyse pour ceux qui cherchent à acheter, vendre ou obtenir une estimation du prix immobilier.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase fw-bold">Nos données</h5>
                    <p class="small">Nous collectons, analysons et structurons en continu des données liées au marché de l’immobilier au Maroc, notamment les offres, les transactions, les données cadastrales, socio-démographiques, et bien plus encore.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase fw-bold">Notre technologie</h5>
                    <p class="small">Nos data-scientists utilisent des algorithmes de Machine Learning pour développer les solutions d’estimations de prix immobilier les plus précises au Maroc.</p>
                </div>
            </div>
            <hr class="my-4" style="border-color: rgba(0, 0, 0, 0.429);">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <a href="/Acceuil" class="navbar-brand d-flex align-items-center justify-content-center">
                        <div class="icon p-2 me-2">
                            <img class="img-fluid" src="{{ asset('images/logo/icon-deal.png') }}" alt="Icon" style="width: 30px; height: 30px;">
                        </div>
                        <h5 class="m-0 text-primary">Agency</h5>
                    </a>
                </div>
                
                <div class="col-md-3 mb-4">
                    <div class="social-icons d-flex justify-content-center gap-3 ">
                        <a href="https://www.facebook.com/had.Lien.KHATIIIIR.Matdirch.lih.copie.hhhhhhhhhhhh/" class="social-icon">
                            <i class="fab fa-facebook-f fa-lg"></i>
                        </a>
                        <a href="https://twitter.com/ElExperto19" class="social-icon">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a href="https://www.instagram.com/mohamed_haki70/" class="social-icon">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/mohamed-haki-64534a204/" class="social-icon">
                            <i class="fab fa-linkedin fa-lg"></i>
                        </a>
                    </div>
                </div>
                  <div class="col-md-3 mb-4">
                    <div class="d-flex justify-content-center">
                        <a href="#" class="social-icon">
                            <img src="{{ asset('images/logo/Verified by Visa.svg') }}" style="height: 40px; width: 40px;" alt="">
                        </a>
                        <a href="#" class="social-icon">
                            <img src="{{ asset('images/logo/MasterCard SecureCode Grey.svg') }}" style="height: 40px; width: 40px;" alt="">
                        </a>
                    </div>

                </div>
                  <div class="col-md-3 mb-4">
                    <div class="d-flex justify-content-center">
                        <p class="small my-3" style="color: rgba(0, 0, 0, 0.7);">© 2024 Agency</p>

                    </div>

                </div>

            </div>


           
            
            
        </div>
    </footer>
    
    
   
  
    
    
</body>
</html>
    
    

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
    $(document).ready(function() {
    $('.heart-btn').click(function() {
        var propertyId = $(this).closest('form').attr('id').replace('toggleFavoriteForm', '');
        var form = $('#toggleFavoriteForm'+propertyId);

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.message.includes('ajouté')) {
                    $('#toggleFavoriteForm'+propertyId+' i').css('color', 'red');
                } else {
                    $('#toggleFavoriteForm'+propertyId+' i').css('color', '#c1bebe');
                }
            },
            error: function(xhr, status, error) {
                console.error('Une erreur s\'est produite lors de la requête.');
                console.error(xhr.responseText);
            }
        });
    });
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








