@extends('layouts.app')

@section('content')
<section  >
<div class=" container  mt-4 py-5" >
    <h1 class="fw-bold mb-5 px-4"  style="color: #00B98E;">Editer Votre Maison, Villa, Riad plus simplement </h1>
    <div class="row mx-3 ">
           @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        
        <div class="col-md-6 " >

         
            
            

            <form  enctype="multipart/form-data" id="uploadForm" action="{{ route('update_maison-villa-riad',$property->id) }}" method="POST">
                
            
                @csrf
                @method('PUT')
                <div class="mb-3 ">
                    <label for="title" class="form-label fw-bold">Titre<span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" type="text" value="{{$property->title}}" class="form-control" id="title" placeholder="Exemple: Appartement à vendre Casablanca - Burger" name="title" required>
                    <span id="titleError" class="text-danger">{{ $errors->first('title') }}</span>
                </div>
                
                <div class="mb-3 ">
                    <label for="description" class="form-label fw-bold">Description<span class="text-danger">*</span></label>
                    <textarea style="background-color: rgba(248, 247, 249, 0.719);" name="description" class="form-control" placeholder="Exemple: Appartement à vendre au sein de quartier les princesses à Casablanca.... place de parking attribuée-- Un box titré.." id="description" required>{{$property->description}}</textarea>
                    <span id="descriptionError" class="text-danger">{{ $errors->first('description') }}</span>
                </div>
                

                <div class="mb-3 ">
                    <label for="prix" class="form-label fw-bold">Prix<span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" type="text" class="form-control" id="prix" placeholder="Exemple: 890 000 DH" value="{{$property->prix}}" name="prix" required>
                    <span id="prixError" class="text-danger">{{ $errors->first('prix') }}</span>
                </div>
                
                <div class="mb-3 ">
                    <label for="imageInput" class="form-label fw-bold">Sélectionner 9 Images Max<span class="text-danger">*</span> </label>
                    <input  style="background-color: rgba(255, 255, 255, 0.386);" type="file" class="form-control" id="imageInput" name="images[]"   accept="image/*" multiple required >
                    <span id="imageInputError" class="text-danger">{{ $errors->first('images.*') }}</span>
                </div>
                
                <div id="imagePreview" class="mb-3" ></div>

                <div class="mb-3 ">
                    <label for="categorie" class="form-label fw-bold">Catégorie<span class="text-danger">*</span></label>
                    <select style="background-color: rgba(248, 247, 249, 0.719);"class="form-select"  id="categorie" name="categorie_id" required>
                        <option value="1">Hypothécaire</option>
                        <option value="2">A VENDRE</option>
                        <option value="3">A LOUER</option>    
                    </select>
                    @error('categorie_id')
                    <div class="alert alert-sm alert-danger alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @enderror
                 <span id="categorieError" class="text-danger"></span>
                </div>

                <div class="mb-3 ">
                    <label for="type" class="form-label fw-bold">Type<span class="text-danger">*</span></label>
                    <select style="background-color: rgba(248, 247, 249, 0.719);"class="form-select" id="type" name="type_id" required>
                        <option value="6">Maison</option>    
                        <option value="8">Villa</option>    
                        <option value="7">Riad</option>    


                    </select>
                    @error('type_id')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                 @enderror
                 <span id="typeError" class="text-danger"></span>
                </div>
        
                
        
                <div class="mb-3 ">
                    <label for="city" class="form-label fw-bold">Ville<span class="text-danger">*</span></label>
                    <select style="background-color: rgba(248, 247, 249, 0.719);"class="form-select" value="{{$property->city_id}}" id="city" name="city_id" required>
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ $city->id == $property->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <div class="alert alert-sm alert-danger alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @enderror
                 <span id="cityError" class="text-danger"></span>

                </div>

            

            
        
                <div class="mb-3 ">
                    <label for="adresse" class="form-label fw-bold">Adresse<span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" value="{{$property->adresse}}" placeholder="Exemple: Rue Mohamed Jazouli B.P. 35, Rabat " type="text" class="form-control" id="adresse" name="adresse" required>
                    <span id="adresseError" class="text-danger">{{ $errors->first('adresse') }}</span>
                </div>
                
        
            </div>
            <div class="col-md-6">
        
                <div class="mb-3 ">
                    <label for="date_construction" class="form-label fw-bold">Date de construction<span class="text-danger">*</span></label>
                    <input  style="background-color: rgba(248, 247, 249, 0.719);" type="date" class="form-control" id="date_construction" value="{{$property->date_construction}}" name="date_construction" required>
                    <span id="dateConstructionError" class="text-danger">{{ $errors->first('date_construction') }}</span>
                </div>
            
                
        
                <div class="mb-3 ">
                    <label for="surface" class="form-label fw-bold">Surface<span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" placeholder="Exemple : 120m²" type="text" class="form-control" id="surface" value="{{$property->caracteristiques->surface}}" name="surface" required>
                    <span id="surfaceError" class="text-danger">{{ $errors->first('surface') }}</span>
                </div>
        
                <div class="mb-3 ">
                    <label class="form-check-label fw-bold">Équipements <span class="text-danger">*</span></label><br>
                   
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="balcon" name="balcon" value="1" {{ $property->caracteristiques->balcon == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="balcon">Balcon</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="terrasse" name="terrasse" value="1" {{ $property->caracteristiques->terrasse == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="terrasse">Terrasse</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="piscine" name="piscine" value="1" {{ $property->caracteristiques->piscine == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="piscine">Piscine</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="jardin" name="jardin" value="1" {{ $property->caracteristiques->jardin == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="jardin">Jardin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="parking" name="parking" value="1" {{ $property->caracteristiques->parking == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="parking">Parking</label>
                    </div>
                </div>
                
                <div class="mb-3 ">
                    <label for="number_rooms" class="form-label fw-bold">Nombre de chambres <span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" type="text" placeholder="Exemple: 4" class="form-control" id="number_rooms" value="{{ $property->caracteristiques->number_rooms}}" name="number_rooms" required>
                    <span id="numberRoomsError" class="text-danger">{{ $errors->first('number_rooms') }}</span>
                </div>
        
                <div class="mb-3 ">
                    <label for="number_sallon" class="form-label fw-bold">Nombre de salons <span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" type="text" placeholder="Exemple: 1" class="form-control" id="number_sallon" value="{{ $property->caracteristiques->number_sallon}}"  name="number_sallon" required>
                    <span id="numberSallonError" class="text-danger">{{ $errors->first('number_sallon') }}</span>
                </div>
        
                <div class="mb-3 ">
                    <label for="number_salleBain" class="form-label fw-bold">Nombre de salles de bain <span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" placeholder="Exemple: 2"  type="text" class="form-control" id="number_salleBain" value="{{ $property->caracteristiques->number_salleBain}}" name="number_salleBain" required>
                    <span id="numberSalleBainError" class="text-danger">{{ $errors->first('number_salleBain') }}</span>
                </div>
                
        
            
            </div>

           
            <button type="submit" class="btn voirplusbutton btn-outline w-100 text-white mt-3 px-5" >Publier</button>

            </form>
        
        
    </div>
</div>
</section>
<script>
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function () {
        previewImages(this.files);
    });

    function previewImages(files) {
        imagePreview.innerHTML = '';
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (!file.type.startsWith('image/')) { continue; }
            const imgContainer = document.createElement('div');
            imgContainer.classList.add('preview-image', 'mb-2');
            const img = document.createElement('img');
            img.classList.add('img-thumbnail', 'w-75', 'mr-2');
            img.file = file;
            const removeBtn = document.createElement('button');
            removeBtn.classList.add('btn', 'btn-danger', 'btn-sm');
            removeBtn.innerHTML = 'X';
            removeBtn.addEventListener('click', function () {
                imgContainer.remove();
            });
            imgContainer.appendChild(img);
            imgContainer.appendChild(removeBtn);
            imagePreview.appendChild(imgContainer);
            const reader = new FileReader();
            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }





    document.addEventListener('DOMContentLoaded', function () {
    const uploadForm = document.getElementById('uploadForm');
    
    // Ajouter des écouteurs d'événements keyup à chaque champ
    const formInputs = uploadForm.querySelectorAll('input, textarea, select');
    formInputs.forEach(input => {
        input.addEventListener('keyup', function () {
            validateField(input);
        });
    });

    uploadForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Empêche l'envoi du formulaire par défaut

        // Validation de tous les champs du formulaire
        let isValid = true;
        formInputs.forEach(input => {
            if (!validateField(input)) {
                isValid = false;
            }
        });

        // Si tous les champs sont valides, soumettre le formulaire
        if (isValid) {
            this.submit();
        }
    });
});

function validateField(input) {
    const errorElementId = input.id + 'Error';
    const errorElement = document.getElementById(errorElementId);

    // Supprimer les anciennes classes d'erreur et réinitialiser les messages
    removeErrorClass(input, errorElementId);

    // Validation du champ
    let isValid = true;
    const value = input.type === 'checkbox' ? input.checked : input.value.trim();

    if (input.required && (input.type !== 'checkbox' && value === '')) {
        isValid = false;
        addErrorClass(input, errorElementId);
        errorElement.textContent = 'Ce champ est requis';
    }

    // Vous pouvez ajouter d'autres validations ici en fonction du type de champ

    return isValid;
}

function addErrorClass(input, errorElementId) {
    input.classList.add('border', 'border-danger');
    const errorElement = document.getElementById(errorElementId);
    if (errorElement) {
        errorElement.textContent = '';
    }
}

function removeErrorClass(input, errorElementId) {
    input.classList.remove('border', 'border-danger');
    const errorElement = document.getElementById(errorElementId);
    if (errorElement) {
        errorElement.textContent = '';
    }
}

</script>
@endsection
