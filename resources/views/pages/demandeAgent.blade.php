@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero-content " style="background-color:#00000076; text-shadow: 10px 10px 30px rgb(0, 0, 0);
">
            <h1 style="text-shadow: 90px 90px 90px rgb(0, 0, 0);
            ">Devenir Agent Immobilier Ou avoir la possibilité de partagé vos biens</h1>
            <p>Decouvrir les avantages de devenir un agent immobilier sur Agency</p>
        </div>
    </section>

    <section class="advantages">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-5">
                    <div class="card">
                        <div class="card-body text-white rounded" style="background-color: #d3067a;">
                            <h5 class="card-title fw-bold mb-3">SEO et Publicité</h5>
                            <p class="card-text">Nous assurons une bonne visibilité SEO et des campagnes publicitaires efficaces pour promouvoir vos biens immobiliers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card">
                        <div class="card-body text-white rounded" style="background-color: #28a745;">
                            <h5 class="card-title fw-bold mb-3">Tous types d'immobiliers</h5>
                            <p class="card-text">Publiez tous les types de biens immobiliers sur notre site, du résidentiel au commercial, en passant par le terrain et plus encore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card">
                        <div class="card-body text-white rounded" style="background-color: #8506ed;">
                            <h5 class="card-title fw-bold mb-3">Support et Confiance</h5>
                            <p class="card-text">Nous assurons un support complet pour vendre rapidement vos biens immobiliers et nos utilisateurs nous font confiance depuis des années.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        @auth
            @if($demandesEnattent && $demandesEnattent->status === 'pending')
                <div class="container">
                    <div class="alert alert-info" role="alert">
                        Votre demande est en attente de traitement.
                    </div>
                </div>
            @elseif($demandesEnattent && $demandesEnattent->status === 'accepted')
                <div class="container">
                    <div class="alert alert-success" role="alert">
                        Félicitations ! Votre demande a été acceptée.
                    </div>
                </div>
            @else
                <div class="container">
                    <form method="POST" action="{{ route('demandeetreAgent') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary" style="background-color: #008619;">Envoyer une demande</button>
                    </form>
                </div>
            @endif
        @else
            <div class="container">
                <p>Connectez-vous pour pouvoir envoyer une demande pour devenir agent immobilier.</p>
            </div>
        @endauth
    </section>
@endsection

<style>
    .hero {
        background-image: url('../images/625b10a58137b364b18df2ea_iStock-94179607.jpg');
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
        padding: 100px 0;
    }

    .card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

.card-primary {
    background-color: #007bff;
    color: white;
}

.card-success {
    background-color: #28a745;
    color: white;
}

.card-warning {
    background-color: #ffc107;
    color: black;
}


    .advantages {
        padding: 50px 0;
    }

    .advantages .card {
        border: none;
        transition: transform 0.3s;
    }

    .advantages .card:hover {
        transform: translateY(-10px);
    }

    .cta {
        background-color: #f8f9fa;
        padding: 50px 0;
        text-align: center;
    }
</style>
