{{-- upload.blade.php --}}
@extends('layouts.app')

@section('content')
<section  >
<div class=" container  mt-4 py-5" >
    <h1 class="fw-bold px-4" style="color: #00B98E;">Publier votre Terrain immobilier </h1>
    <div class="row mx-3 ">
        
        <div class="col-md-6">
            
            


            <form enctype="multipart/form-data" id="uploadForm">
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Titre</label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);"type="text" class="form-control" id="title" placeholder="Exemple: Terrain à vendre Casablanca - Sidi Moumen" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea style="background-color: rgba(248, 247, 249, 0.719);"class="form-control" placeholder="Exemple: Terrain avec 2 façades en zone villa superficie 366 mètre carré avec un bon emplacement dans un quartier calme et sécurisé à sidi moumen route anassi. --N'hésitez pas à nous contacter pour plus d'informations ou pour organise" id="description" name="description" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Prix</label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);"type="text" class="form-control" id="title" placeholder="Exemple: 890 000 DH" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="imageInput" class="form-label fw-bold">Sélectionner 9 Images Max </label>
                    <input  style="background-color: rgba(255, 255, 255, 0.386);" type="file" class="form-control" id="imageInput" name="images[]"  accept="image/*" multiple required>
                </div>
                <div id="imagePreview" class="mb-3 " ></div>

                <div class="mb-3">
                    <label for="categorie" class="form-label fw-bold">Catégorie</label>
                    <select style="background-color: rgba(248, 247, 249, 0.719);"class="form-select" id="categorie" name="categorie_id" required>
                        <option value="1">Catégorie 1</option>
                        <option value="2">Catégorie 2</option>
                        <option value="3">Catégorie 3</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 ">

                <div class="mb-3">
                    <label for="type" class="form-label fw-bold">Type</label>
                    <select style="background-color: rgba(248, 247, 249, 0.719);"class="form-select" id="type" name="type_id" required>
                        <option selected value="13">Terrain immobilier</option>
                    </select>
                    <input type="hidden" value="13" name="type_id">

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
        
                <div class="mb-3">
                    <label for="adresse" class="form-label fw-bold">Adresse</label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" placeholder="Exemple: Rue Mohamed Jazouli B.P. 35, Rabat " type="text" class="form-control" id="adresse" name="adresse" required>
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
