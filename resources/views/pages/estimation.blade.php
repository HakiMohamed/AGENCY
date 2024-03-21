{{-- estimation.blade.php --}}
@extends('layouts.app')

@section('content')
<section class="primarySection overflow-x-hidden" style="background-image: linear-gradient(to bottom, rgba(247, 237, 246, 0.82), rgba(215, 186, 240, 0.783));">
    <div class="row flex-wrap-reverse">
        <div class="col-md-6 mb-4" style="background-color: rgba(255, 255, 255, 0);">
            <h1 class="fw-bold px-4">Estimation de votre bien immobilier</h1>
            <form class="px-4" id="estimationForm">
                <div class="mb-3">
                    <label for="propertyType" class="form-label fw-semibold">Type de bien</label>
                    <select id="propertyType" class="form-select fw-bold" style="background-color: #b07cdd44;">
                        <option value="appartement">Appartement</option>
                        <option value="villa">Villa</option>
                        <option value="maison">Maison</option>
                        <option value="riad">Riad</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label fw-semibold">Ville</label>
                    <select id="city" class="form-select fw-bold" style="background-color: #b07cdd44;">
                        <option value="Casablanca">Casablanca</option>
                        <option value="Marrakech">Marrakech</option>
                        <option value="Kénitra">Kénitra</option>
                        <option value="Agadir">Agadir</option>
                        <option value="Meknès">Meknès</option>
                        <option value="Rabat">Rabat</option>
                        <option value="Skhirate-Témara">Skhirate-Témara</option>
                        <option value="El Jadida">El Jadida</option>
                        <option value="Tanger-Assilah">Tanger-Assilah</option>
                        <option value="Nouaceur">Nouaceur</option>
                        <option value="Mohammadia">Mohammadia</option>
                        <option value="Benslimane">Benslimane</option>
                        <option value="Fès">Fès</option>
                        <option value="Berkane">Berkane</option>
                        <option value="Khouribga">Khouribga</option>
                        <option value="Salé">Salé</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="surface" class="form-label fw-semibold">Surface (m²)</label>
                    <input type="text" class="form-control" style="background-color: #b07cdd44;" id="surface" placeholder="Entrez la surface">
                </div>
                <div class="mb-3">
                    <label for="rooms" class="form-label fw-semibold">Nombre de chambres</label>
                    <input type="text" class="form-control" style="background-color: #b07cdd44;" id="rooms" placeholder="Entrez le nombre de chambres">
                </div>
                <div class="mb-3">
                    <label for="living_rooms" class="form-label fw-semibold">Nombre de salons</label>
                    <input type="text" class="form-control" style="background-color: #b07cdd44;" id="living_rooms" placeholder="Entrez le nombre de salons">
                </div>
                <div class="mb-3">
                    <label for="bathrooms" class="form-label fw-semibold">Nombre de salles de bain</label>
                    <input type="text" class="form-control" style="background-color: #b07cdd44;" id="bathrooms" placeholder="Entrez le nombre de salles de bain">
                </div>
                <div class="mb-3">
                    <label for="has_elevator" class="form-label fw-semibold">Ascenseur</label>
                    <select id="has_elevator" class="form-select fw-bold" style="background-color: #b07cdd44;">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="has_balcony" class="form-label fw-semibold">Balcon</label>
                    <select id="has_balcony" class="form-select fw-bold" style="background-color: #b07cdd44;">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="has_terrace" class="form-label fw-semibold">Terrasse</label>
                    <select id="has_terrace" class="form-select fw-bold" style="background-color: #b07cdd44;">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="has_pool" class="form-label fw-semibold">Piscine</label>
                    <select id="has_pool" class="form-select fw-bold" style="background-color: #b07cdd44;">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="has_garden" class="form-label fw-semibold">Jardin</label>
                    <select id="has_garden" class="form-select fw-bold" style="background-color: #b07cdd44;">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="has_parking" class="form-label fw-semibold">Parking</label>
                    <select id="has_parking" class="form-select fw-bold" style="background-color: #b07cdd44;">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="has_box" class="form-label fw-semibold">Box</label>
                    <select id="has_box" class="form-select fw-bold" style="background-color: #b07cdd44;">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="floor" class="form-label fw-semibold">Étage</label>
                    <input type="text" class="form-control" style="background-color: #b07cdd44;" id="floor" placeholder="Entrez l'étage">
                </div>
                
                <button type="submit" class="btn mx-5 px-5 btncard" style=" color: rgb(73, 33, 194); border-color: rgb(73, 33, 194);" data-bs-toggle="modal" data-bs-target="#resultModal">
                    Estimer
                </button>            
            </form>
            
            
        </div>
        <div class="col-md-6">
            <img class="w-100 mt-3" src="{{ asset('images/logo/Price.gif') }}" alt="">
        </div>

        <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resultModalLabel">Résultat de l'estimation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="resultatModal" class="fw-bold"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <script>document.getElementById('estimationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const typeBien = document.getElementById('propertyType').value;
        const ville = document.getElementById('city').value;
        const surface = parseInt(document.getElementById('surface').value);
        const chambres = parseInt(document.getElementById('rooms').value);
        const salons = parseInt(document.getElementById('living_rooms').value);
        const sallesDeBain = parseInt(document.getElementById('bathrooms').value);
        const ascenseur = document.getElementById('has_elevator').value === 'oui';
        const balcon = document.getElementById('has_balcony').value === 'oui';
        const terrasse = document.getElementById('has_terrace').value === 'oui';
        const piscine = document.getElementById('has_pool').value === 'oui';
        const jardin = document.getElementById('has_garden').value === 'oui';
        const parking = document.getElementById('has_parking').value === 'oui';
        const box = document.getElementById('has_box').value === 'oui';
        const etage = parseInt(document.getElementById('floor').value);
    
        let prixMetreCarreAppartement = 0;
        let prixMetreCarreVilla = 0;
    
        switch (ville) {
            case 'Casablanca':
                prixMetreCarreAppartement = 9507;
                prixMetreCarreVilla = 14155;
                break;
            case 'Marrakech':
                prixMetreCarreAppartement = 7113;
                prixMetreCarreVilla = 7155;
                break;
            case 'Kénitra':
                prixMetreCarreAppartement = 5879;
                prixMetreCarreVilla = 7140;
                break;
            case 'Agadir':
                prixMetreCarreAppartement = 6916;
                prixMetreCarreVilla = 9267;
                break;
            case 'Meknès':
                prixMetreCarreAppartement = 4709;
                prixMetreCarreVilla = 5848;
                break;
            case 'Rabat':
                prixMetreCarreAppartement = 13702;
                prixMetreCarreVilla = 10729;
                break;
            case 'Skhirate-Témara':
                prixMetreCarreAppartement = 7722;
                prixMetreCarreVilla = 8870;
                break;
            case 'El Jadida':
                prixMetreCarreAppartement = 5793;
                prixMetreCarreVilla = 6271;
                break;
            case 'Tanger-Assilah':
                prixMetreCarreAppartement = 5790;
                prixMetreCarreVilla = 7679;
                break;
            case 'Nouaceur':
                prixMetreCarreAppartement = 8192;
                prixMetreCarreVilla = 10336;
                break;
            case 'Mohammadia':
                prixMetreCarreAppartement = 8388;
                prixMetreCarreVilla = 9243;
                break;
            case 'Benslimane':
                prixMetreCarreAppartement = 7834;
                prixMetreCarreVilla = 8124;
                break;
            case 'Fès':
                prixMetreCarreAppartement = 4373;
                prixMetreCarreVilla = 6600;
                break;
            case 'Berkane':
                prixMetreCarreAppartement = 5291;
                prixMetreCarreVilla = 5871;
                break;
            case 'Khouribga':
                prixMetreCarreAppartement = 5242;
                prixMetreCarreVilla = 5882;
                break;
            case 'Salé':
                prixMetreCarreAppartement = 7025;
                prixMetreCarreVilla = 9688;
                break;
            default:
                break;
        }
    
        let prixEstime = 0;
    
        if (typeBien === 'appartement') {
            prixEstime = surface * prixMetreCarreAppartement;
        } else if (typeBien === 'villa') {
            prixEstime = surface * prixMetreCarreVilla;
        }
    
        // Prise en compte des autres critères
        prixEstime += chambres * 5000; // Prix par chambre
        prixEstime += salons * 10000; // Prix par salon
        prixEstime += sallesDeBain * 7000; // Prix par salle de bain
        prixEstime += ascenseur ? 15000 : 0;
        prixEstime += balcon ? 5000 : 0;
        prixEstime += terrasse ? 10000 : 0;
        prixEstime += piscine ? 50000 : 0;
        prixEstime += jardin ? 20000 : 0;
        prixEstime += parking ? 20000 : 0;
        prixEstime += box ? 30000 : 0;
        prixEstime += etage * 10000; // Prix par étage
    
        document.getElementById('resultatModal').innerText = `Le prix estimé de votre bien à ${ville} est de : ${prixEstime.toFixed(2)} MAD`;
    $('#resultModal').modal('show'); // Afficher le modal   
    });
    </script>
</section>

@endsection
