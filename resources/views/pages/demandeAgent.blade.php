@extends('layouts.app')

@section('content')
    <div class="parallax">
        <div class="row justify-content-center mt-md-0">
            <div class="col-md-8 text-center mt-md-3">
                <h1 class="display-4 mt-md-0 mt-5">Devenir Agent Immobilier</h1>
                <p class="lead">Voici quelques avantages de devenir un agent immobilier sur Agency</p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card my-3" style="height:230px; background-color: #007bff;">
                            <div class="card-body text-white shadow">
                                <h5 class="card-title bg-secrondary rounded shadow fw-bold">SEO et Publicité</h5>
                                <p class="card-text">Nous assurons une bonne visibilité SEO et des campagnes publicitaires efficaces pour promouvoir vos biens immobiliers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card my-3" style="height:230px; background-color: #28a745;">
                            <div class="card-body text-white shadow">
                                <h5 class="card-title bg-secrondary rounded shadow fw-bold">Tous types d'immobiliers</h5>
                                <p class="card-text">Publiez tous les types de biens immobiliers sur notre site, du résidentiel au commercial, en passant par le terrain et plus encore.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card my-3" style="height:230px; background-color: #ffc107;">
                            <div class="card-body text-white shadow">
                                <h5 class="card-title bg-secrondary rounded shadow fw-bold">Support et Confiance</h5>
                                <p class="card-text mb-2">Nous assurons un support complet pour vendre rapidement vos biens immobiliers et nos utilisateurs nous font confiance depuis des années.</p>
                            </div>
                        </div>
                    </div>
                </div>
                @auth
                    @if($demandesEnattent && $demandesEnattent->status === 'pending')
                        <div style="background-color: #f4da8b;" class="card mt-3 mb-5" style="height:100px;">
                            <div class="card-body fw-bold">
                                <h5 class="card-title bg-secrondary rounded shadow fw-bold">Votre demande est en attente</h5>
                                <p class="card-text">Nous traitons votre demande. Veuillez patienter.</p>
                                <p class="card-text">Lorsque votre demande sera acceptée par l'administrateur, vous pourrez voir les boutons pour publier les propriétés.</p>
                                <p class="card-text"></p>
                                <div class="spinner-border text-success mb-5" role="status">
                                    <span class="sr-only">Chargement...</span>
                                    
                                </div>
                            </div>
                        </div>
                        @elseif($demandesEnattent && $demandesEnattent->status === 'accepted')
                        <div style="background-color: #02ab0d;" class="card mt-3 mb-5 text-white" style="height:100px;">
                            <div class="card-body fw-bold">
                                <h5 class="card-title bg-secrondary text-white rounded shadow fw-bold">Félécetations Votre demande est Accepté</h5>
                                <p class="card-text text-white">Vous pouvez d'abord Beneficier de nos services </p>
                               
                            </div>
                        </div>


                    @else
                        <form method="POST" action="{{ route('demandeetreAgent') }}">
                            @csrf
                            <button type="submit" class="card-title btn-demandeenvoyé btn py-3 text-white shadow-lg btn-lg mt-3">Envoyé demande avec un seul click</button>
                        </form>
                    @endif
                @else
                    <p>Connectez-vous pour pouvoir envoyer une demande pour devenir agent immobilier.</p>
                @endauth
            </div>
        </div>
    </div>
@endsection
