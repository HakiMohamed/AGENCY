{{-- upload.blade.php --}}
@extends('layouts.app')

@section('content')
<section  >
<div class=" container  mt-4 py-5" >
    <h1 class="fw-bold px-4" style="color: #00B98E;">Publier vos Chambres plus simplement </h1>
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
        
        <div class="col-md-6 mt-5">
            
            

            <form enctype="multipart/form-data" id="uploadForm" action="{{ route('chambres.store') }}" method="POST">
                
                @csrf
                <div class="mb-3 ">
                    <label for="title" class="form-label fw-bold">Titre<span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);"type="text" class="form-control" id="title" placeholder="Chambres a louer, LIT + DEUX TABLES DE CHEVET À 1 TIROIR - CHÊNE MARRON ET NOIR" name="title" required>
                </div>

                <div class="mb-3 ">
                    <label for="description" class="form-label fw-bold">Description<span class="text-danger">*</span></label>
                    <textarea style="background-color: rgba(248, 247, 249, 0.719);"class="form-control" placeholder="Exemple: chambre à Coucher.-- Avec salle de bain.-- Une cuisine entièrement équipée-- LIT + DEUX TABLES DE CHEVET À 1 TIROIR - CHÊNE MARRON ET NOIR" id="description" name="description" required></textarea>
                </div>

                <div class="mb-3 ">
                    <label for="title" class="form-label fw-bold">Prix<span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);"type="text" class="form-control" id="title" placeholder="Exemple: 1 000 DH" name="prix" required>
                </div>

                <div class="mb-3 ">
                    <label for="imageInput" class="form-label fw-bold">Sélectionner 9 Images Max<span class="text-danger">*</span></label>
                    <input  style="background-color: rgba(255, 255, 255, 0.386);" type="file" class="form-control" id="imageInput" name="images[]"  accept="image/*" multiple required>
                </div>
                <div id="imagePreview" class="mb-3  " ></div>

                <div class="mb-3 ">
                    <label for="categorie" class="form-label fw-bold">Catégorie<span class="text-danger">*</span></label>
                    <select style="background-color: rgba(248, 247, 249, 0.719);"class="form-select" id="categorie" name="categorie_id" required>
                        <option value="1">Hypothécaire</option>
                        <option value="2">A VENDRE</option>
                        <option value="3">A LOUER</option>    
                    </select>
                    @error('categorie')
                    {{$message}} 
                 @enderror
                </div>

                <div class="mb-3 ">
                    <label for="type" class="form-label fw-bold">Type<span class="text-danger">*</span></label>
                    <select style="background-color: rgba(248, 247, 249, 0.719);"class="form-select" id="type" name="type_id" required>
                        <option  selected value="4">Chambre</option>
                        
                    </select>
                    <input type="hidden" value="4" name="type_id">
                    @error('type')
                    {{$message}} 
                 @enderror
                </div>

              
                
            </div>
                <div class="col-md-6 mt-5">

                   
            
                    
            
                    <div class="mb-3 ">
                        <label for="city" class="form-label fw-bold">Ville<span class="text-danger">*</span></label>
                        <select style="background-color: rgba(248, 247, 249, 0.719);"class="form-select" id="city" name="city_id" required>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="mb-3 ">
                        <label for="adresse" class="form-label fw-bold">Adresse<span class="text-danger">*</span></label>
                        <input style="background-color: rgba(248, 247, 249, 0.719);" placeholder="Exemple: Rue Mohamed Jazouli B.P. 35, Rabat " type="text" class="form-control" id="adresse" name="adresse" required>
                    </div>
            
                    
            
                    <div class="mb-3 ">
                        <label for="date_construction" class="form-label fw-bold">Date de construction<span class="text-danger">*</span></label>
                        <input style="background-color: rgba(248, 247, 249, 0.719);" type="date" class="form-control" id="date_construction" name="date_construction" required>
                    </div>
                    <label for="etage" class="form-label fw-bold">Étage<span class="text-danger">*</span></label>
                    <div class="mb-3  " >
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="checkbox" id="piscine" name="piscine">
                            <label class="form-check-label" for="piscine">Rez de chaussé</label>
                        </div>
                        
                        <input style="background-color: rgba(248, 247, 249, 0.719);" type="text" placeholder="Exemple: 3" class="form-control" id="etage" name="etage" required>
                    </div>
            
                    <div class="mb-3 ">
                        <label for="surface" class="form-label fw-bold">Surface<span class="text-danger">*</span></label>
                        <input style="background-color: rgba(248, 247, 249, 0.719);" placeholder="Exemple : 17 m²" type="text" class="form-control" id="surface" name="surface" required>
                    </div>

                    <div class="mb-2 ">
                        <label class="form-check-label fw-bold">Équipements <span class="text-danger">*</span></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ascenseur" name="ascenseur" value="1">
                            <label class="form-check-label" for="ascenseur">Ascenseur</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="balcon" name="balcon" value="1">
                            <label class="form-check-label" for="balcon">Balcon</label>
                        </div>
                    </div>

                </div>
        
                
        

                <button type="submit" class="btn text-white mt-3 px-5 voirplusbutton" >Publier</button>
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
