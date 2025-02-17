@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la Facture</h1>

    <div class="card">
        <div class="card-header">
            Facture #{{ $facture->id }}
        </div>
        <div class="card-body">
            <p><strong>Date de réception :</strong> {{ $facture->date_recu }}</p>
            <p><strong>Période :</strong> du {{ $facture->periode_debut }} au {{ $facture->periode_fin }}</p>
            <p><strong>Signature :</strong> {{ $facture->signature }}</p>
            <p><strong>Date de création :</strong> {{ $facture->date_creation }}</p>
            <p><strong>Ville de création :</strong> {{ $facture->ville_creation }}</p>
            <p><strong>Box :</strong> <a href="{{ route('boxes.show', $facture->box->id) }}">{{ $facture->box->name }}</a></p>
        </div>
    </div>

    <a href="{{ route('factures.index') }}" class="btn btn-secondary mt-3">Retour à la liste des factures</a>
</div>
@endsection