@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la Box : {{ $box->name }}</h1>
    <div class="card">
        <div class="card-header">
            Box #{{ $box->id }}
        </div>
        <div class="card-body">
            <p><strong>Nom :</strong> {{ $box->name }}</p>
            <p><strong>Adresse :</strong> {{ $box->address }}</p>
            <p><strong>Prix :</strong> {{ $box->price }} €</p>
            <p><strong>Propriétaire :</strong> {{ $box->owner ? $box->owner->name : 'Aucun' }}</p>
        </div>
    </div>
    <a href="{{ route('boxes.index') }}" class="btn btn-secondary mt-3">Retour à la liste des boxes</a>
</div>
@endsection