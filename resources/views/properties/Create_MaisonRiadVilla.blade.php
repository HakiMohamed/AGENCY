{{-- upload.blade.php --}}
@extends('layouts.app')

@section('content')
<section  >
<div class=" container  mt-4 py-5" >
    <h1 class="fw-bold px-4" style="color: #00B98E;">Publier Votre Maison, Villa, Riad plus simplement </h1>
    <div class="row mx-3 ">
        
        <div class="col-md-6">
            
            


            <form enctype="multipart/form-data" method="POST"  action="{{ route('store_Maison-Villa-Riad') }}" id="uploadForm">
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
                        <option value="3">Hypothécaire</option>
                        <option value="2">A Louer</option>
                        <option value="1">A Vendre</option>    
                    </select>
                    @error('categorie')
                    {{$message}} 
                 @enderror
                 <span id="categorieError" class="text-danger"></span>
                </div>

                <div class="mb-3 ">
                    <label for="type" class="form-label fw-bold">Type<span class="text-danger">*</span></label>
                    <select style="background-color: rgba(248, 247, 249, 0.719);"class="form-select" id="type" name="type_id" required>
                        <option value="1">Maison</option>    
                        <option value="3">Villa</option>    
                        <option value="11">Riad</option>    


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
                    <select style="background-color: rgba(248, 247, 249, 0.719);"class="form-select" id="city" name="city_id" required>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                 @enderror
                 <span id="cityError" class="text-danger"></span>

                </div>
        
                <div class="mb-3 ">
                    <label for="adresse" class="form-label fw-bold">Adresse<span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" placeholder="Exemple: Rue Mohamed Jazouli B.P. 35, Rabat " type="text" class="form-control" id="adresse" name="adresse" required>
                    @error('adresse')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                 @enderror
                 <span id="adresseError" class="text-danger"></span>
                </div>
        
            </div>
            <div class="col-md-6 ">
        
                <div class="mb-3 ">
                    <label for="date_construction" class="form-label fw-bold">Date de construction<span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" type="date" class="form-control" id="date_construction" name="date_construction" required>
                    <span id="dateConstructionError" class="text-danger"></span>
                    @error('date_construction')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                 @enderror
                </div>

            

        
                <div class="mb-3 ">
                    <label for="surface" class="form-label fw-bold">Surface</label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" placeholder="Exemple : 120m²" type="text" class="form-control" id="surface" name="surface" required>
                    @error('surface')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                 @enderror
                </div>
        
                <div class="mb-3 ">
                    <label class="form-check-label fw-bold">Équipements:</label><br>
                    <div class="form-check form-check-inline">
                        <input  class="form-check-input"   value="1" type="checkbox" id="balcon" name="balcon">
                        <label class="form-check-label" for="balcon">Balcon</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"   value="1" type="checkbox" id="terrasse" name="terrasse">
                        <label class="form-check-label" for="terrasse">Terrasse</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input  class="form-check-input"   value="1" type="checkbox" id="piscine" name="piscine">
                        <label class="form-check-label" for="piscine">Piscine</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"   value="1" type="checkbox" id="jardin" name="jardin">
                        <label class="form-check-label" for="jardin">Jardin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input  class="form-check-input"   value="1" type="checkbox" id="parking" name="parking">
                        <label class="form-check-label" for="parking">Parking</label>
                    </div>
                </div>
        
                <div class="mb-3 ">
                    <label for="number_rooms" class="form-label fw-bold">Nombre de chambres <span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" type="text" placeholder="Exemple: 4" class="form-control" id="number_rooms" name="number_rooms" required>
                    <span id="numberRoomsError" class="text-danger"></span>
                    @error('number_rooms')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                 @enderror
                </div>
        
                <div class="mb-3 ">
                    <label for="number_sallon" class="form-label fw-bold">Nombre de salons <span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" type="text" placeholder="Exemple: 1" class="form-control" id="number_sallon" name="number_sallon" required>
                    <span id="numberSallonError" class="text-danger"></span>
                    @error('number_sallon')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                 @enderror
                </div>
        
                <div class="mb-3 ">
                    <label for="number_salleBain" class="form-label fw-bold">Nombre de salles de bain <span class="text-danger">*</span></label>
                    <input style="background-color: rgba(248, 247, 249, 0.719);" placeholder="Exemple: 2"  type="text" class="form-control" id="number_salleBain" name="number_salleBain" required>
                    <span id="numberSalleBainError" class="text-danger"></span>
                    @error('number_salleBain')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{$message}} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                 @enderror
                </div>
        
            </div>
            <button type="submit" class="btn btn-outline w-100 text-white mt-3 px-5" style="background-color: rgb(92, 57, 197);">Publier</button>
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
