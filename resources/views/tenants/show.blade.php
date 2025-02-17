@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Locataire</h1>
    <div class="card">
        <div class="card-header">
            Locataire #{{ $tenant->id }}
        </div>
        <div class="card-body">
            <p><strong>Nom :</strong> {{ $tenant->name }}</p>
            <p><strong>Email :</strong> {{ $tenant->email }}</p>
            <p><strong>Téléphone :</strong> {{ $tenant->phone }}</p>
            <p><strong>Adresse :</strong> {{ $tenant->address }}</p>
        </div>
    </div>
    <a href="{{ route('tenants.index') }}" class="btn btn-secondary mt-3">Retour à la liste des locataires</a>
</div>
@endsection