@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h4>Propriétaire</h4>
            <p>
                <strong>{{ $users->name }}</strong><br>
                {{ $users->email }}<br>
            </p>
        </div>
        <div class="col-md-6 text-md-end">
            <h4>Locataire</h4>
            <p>
                <strong>{{ $box->locataire->name }}</strong><br>
                {{ $box->locataire->email }}<br>
            </p>
        </div>
    </div>

    <h2 class="text-center mb-4">Quittance de loyer</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('factures.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="objet" class="form-label">Objet :</label>
            <input type="text" class="form-control" id="objet" value="Quittance de loyer {{ $box->name }}" readonly>
        </div>

        <div class="mb-3">
            <p>Je, soussigné M. <input type="text" class="form-control d-inline-block w-auto" value="{{ $users->name }}" readonly></p>
        </div>

        <div class="mb-3">
            <p>Déclare avoir reçu le <input type="date" class="form-control d-inline-block w-auto" name="date_recu" placeholder="Sélectionnez la date" value="{{ old('date_recu') }}"></p>
        </div>

        <div class="mb-3">
            <p>la somme de <input type="number" class="form-control d-inline-block w-auto" value="{{ $box->prix }}" readonly> € (montant total du loyer chargé en chiffres)</p>
        </div>

        <div class="mb-3">
            <p>De part de M. <input type="text" class="form-control d-inline-block w-auto" value="{{ $box->locataire->name }}" readonly></p>
        </div>

        <div class="mb-3">
            <p>Et donne QUITTANCE du paiement de ladite somme</p>
        </div>

        <div class="mb-3">
            <label for="periode" class="form-label">Pour la période du :</label>
            <div class="d-flex align-items-center">
                <input type="date" class="form-control w-auto" id="periode-debut" name="periode_debut" value="{{ old('periode_debut', \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d')) }}" placeholder="Date de début">
                <span class="mx-2">au</span>
                <input type="date" class="form-control w-auto" id="periode-fin" name="periode_fin" value="{{ old('periode_fin', \Carbon\Carbon::now()->endOfMonth()->format('Y-m-d')) }}" placeholder="Date de fin">
            </div>
        </div>

        <div class="mb-3">
            <label for="adresse-parking" class="form-label">Pour le box situé :</label>
            <input type="text" class="form-control" id="adresse-parking" value="{{ $box->adresse }}" readonly>
        </div>

        <div class="mb-4">
            <label for="signature" class="form-label">Signature :</label>
            <input type="text" class="form-control" id="signature" name="signature" placeholder="Votre signature" value="{{ old('signature') }}">
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label for="date_creation" class="form-label">Le (date) :</label>
                    <input type="date" class="form-control" id="date_creation" name="date_creation" value="{{ old('date_creation', \Carbon\Carbon::now()->format('Y-m-d')) }}" placeholder="Sélectionnez la date">
                </div>
                <div class="col-md-6">
                    <label for="ville_creation" class="form-label">à (ville) :</label>
                    <input type="text" class="form-control" id="ville_creation" name="ville_creation" placeholder="Nom de la ville" value="{{ old('ville_creation') }}">
                </div>
            </div>
        </div>

        <input type="hidden" name="box_id" value="{{ $box->id }}">

        <button type="submit" class="btn btn-success">Valider</button>
    </form>
</div>
@endsection
