{{-- upload.blade.php --}}
@extends('layouts.app')

@section('content')
<section  >
<div class=" container  mt-4 py-5" >
    <h1 class="fw-bold px-4" style="color: #00B98E;">Publier votre Terrain immobilier </h1>
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
        
        <div class="col-md-6">
            
            


            <form enctype="multipart/form-data" id="uploadForm" action="{{route('store_terrain-immobilier')}}" method="POST" >
                @csrf

                <div class="mb-3 ">
                    <label for="title" class="form-label fw-bold">Titre<span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);"type="text" class="form-control" id="title" placeholder="Exemple: Appartement à vendre Casablanca - Burger" name="title" required>
                    @error('title')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                 @enderror
                 <span id="titleError" class="text-danger"></span>

                </div>

                <div class="mb-3 ">
                    <label for="description" class="form-label fw-bold">Description<span class="text-danger">*</span></label>
                    <textarea style="background-color: rgba(248, 247, 249, 0.719);" name="description" class="form-control" placeholder="Exemple: Appartement à vendre au sein de quartier les princesses à Casablanca.... place de parking attribuée-- Un box titré.." id="description"  required></textarea>
                    @error('description')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      <span id="descriptionError" class="text-danger"></span>
                 @enderror
                </div>

                <div class="mb-3 ">
                    <label for="prix" class="form-label fw-bold">Prix<span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" type="text" class="form-control" id="prix" placeholder="Exemple: 890 000 DH" name="prix" required>
                    @error('prix')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <span id="prixError" class="text-danger"></span>

                    @enderror
                </div>

                <div class="mb-3 ">
                    <label for="imageInput" class="form-label fw-bold">Sélectionner 9 Images Max<span class="text-danger">*</span> </label>
                    <input  style="background-color: rgba(255, 255, 255, 0.386);" type="file" class="form-control" id="imageInput" name="images[]"  accept="image/*" multiple required>
                    @error('images[]')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <span id="imageInputError" class="text-danger"></span>

                    @enderror
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
                 <span id="categorieError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-6 ">

                <div class="mb-3">
                    <label for="type" class="form-label fw-bold">Type</label>
                    <select style="background-color: rgba(248, 247, 249, 0.719);"class="form-select" id="type" name="type_id" required>
                        <option selected value="9">Terrain immobilier</option>
                    </select>
                    <input type="hidden" value="9" name="type_id">

                </div>
        
                
        
                <div class="mb-3 ">
                    <label for="city" class="form-label fw-bold">Ville<span class="text-danger">*</span></label>
                    <select style="background-color: rgba(248, 247, 249, 0.719);"class="form-select" id="city" name="city_id" required>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    {{$message}} 
                 @enderror
                 <span id="cityError" class="text-danger"></span>

                </div>
        
                <div class="mb-3 ">
                    <label for="adresse" class="form-label fw-bold">Adresse<span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" placeholder="Exemple: Rue Mohamed Jazouli B.P. 35, Rabat " type="text" class="form-control" id="adresse" name="adresse" required>
                    @error('adresse')
                    {{$message}} 
                 @enderror
                 <span id="adresseError" class="text-danger"></span>
                </div>
        
                
        
                
                
        
                <div class="mb-3 ">
                    <label for="surface" class="form-label fw-bold">Surface<span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" placeholder="Exemple : 120m²" type="text" class="form-control" id="surface" name="surface" required>
                    <span id="surfaceError" class="text-danger"></span> 
                    @error('surface')
                    {{$message}} 
                 @enderror
                </div>
        
             </div>   

                <button type="submit" class="btn text-white mt-3 px-5" style="background-color: rgb(92, 57, 197);">Publier</button>
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
</script>
@endsection
