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

    <form>
        <div class="mb-3">
            <label for="objet" class="form-label">Objet :</label>
            <input type="text" class="form-control" id="objet" value="Quittance de loyer {{ $box->name }}" readonly>
        </div>

        <div class="mb-3">
            <p>Je, soussigné M. <input type="text" class="form-control d-inline-block w-auto" value="{{ $users->name }}"></p>
        </div>

        <div class="mb-3">
            <p>Déclare avoir reçu le <input type="date" class="form-control d-inline-block w-auto"></p>
        </div>

        <div class="mb-3">
            <p>la somme de <input type="number" class="form-control d-inline-block w-auto" value="{{ $box->prix }}"> € (montant total du loyer chargé en chiffres)</p>
        </div>

        <div class="mb-3">
            <p>De part de M. <input type="text" class="form-control d-inline-block w-auto" value="{{ $box->locataire->name }}"></p>
        </div>

        <div class="mb-3">
            <p>Et donne QUITTANCE du paiement de ladite somme</p>
        </div>

        <div class="mb-3">
            <label for="periode" class="form-label">Pour la période du :</label>
            <div class="d-flex align-items-center">
                <input type="date" class="form-control w-auto" id="periode-debut" value="{{ \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d') }}">
                <span class="mx-2">au</span>
                <input type="date" class="form-control w-auto" id="periode-fin" value="{{ \Carbon\Carbon::now()->endOfMonth()->format('Y-m-d') }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="adresse-parking" class="form-label">Pour le box situé :</label>
            <input type="text" class="form-control" id="adresse-parking" placeholder="(adresse complète du parking)">
        </div>

        <div class="mb-4">
            <label for="signature" class="form-label">Signature :</label>
            <input type="text" class="form-control" id="signature">
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label for="date" class="form-label">Le (date) :</label>
                    <input type="date" class="form-control" id="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                </div>
                <div class="col-md-6">
                    <label for="ville" class="form-label">à (ville) :</label>
                    <input type="text" class="form-control" id="ville">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
