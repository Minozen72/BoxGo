@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Résultats de la Gestion des Impôts pour l'année {{ $year }}</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Montant total des factures :</strong> {{ $total_amount }} €</p>
            <p><strong>Régime fiscal :</strong> {{ $regime }}</p>
            <p><strong>Case à remplir :</strong> {{ $case }}</p>
            <p><strong>Montant imposable :</strong> {{ $imposable_amount }} €</p>
        </div>
    </div>
    <a href="{{ route('taxes.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection