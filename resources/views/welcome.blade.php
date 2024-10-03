@extends('layouts.app')

@section('content')
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Box&Go</h1>
                    <p class="card-text">Parce que même vos affaires ont besoin de vacances !</p>
                    <h2 class="mt-4">À propos de nous</h2>
                    <p>Box&Go est une plateforme innovante conçue pour les propriétaires de box de stockage. Notre application simplifie la gestion de vos biens locatifs, offrant une solution complète pour gérer vos box, vos locataires et même suivre l'avancement de vos impôts liés à cette activité.</p>
                    <h2 class="mt-4">Comment utiliser notre application</h2>
                    <ol>
                        <li>Inscrivez-vous en tant que propriétaire</li>
                        <li>Ajoutez vos box de stockage (taille, emplacement, tarifs)</li>
                        <li>Gérez vos locataires (informations, communications)</li>
                        <li>Suivez l'occupation de vos box en temps réel</li>
                        <li>Accédez à un tableau de bord des revenus générés</li>
                        <li>Utilisez notre outil de suivi des impôts pour anticiper vos déclarations</li>
                        <li>Créez des contrats de location personnalisés :
                            <ul>
                                <li>Choisissez parmi des modèles préétablis</li>
                                <li>Personnalisez les clauses selon vos besoins</li>
                                <li>Intégrez automatiquement les informations du locataire et du box</li>
                                <li>Envoyez le contrat par email pour signature électronique</li>
                                <li>Archivez et gérez tous vos contrats en un seul endroit</li>
                            </ul>
                        </li>
                    </ol>
                    <p class="mt-3">Simplifiez votre gestion, optimisez vos revenus et restez à jour avec vos obligations fiscales. Avec Box&Go, la gestion de vos box de stockage n'a jamais été aussi simple !</p>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
