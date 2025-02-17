@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la Facture</h1>
    <div class="card">
        <div class="card-header">
            Facture #{{ $bill->id }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Facturé à :</h5>
                    <p><strong>Nom du locataire :</strong> {{ $bill->contract->tenant->name }}</p>
                    <p><strong>Adresse :</strong> {{ $bill->contract->tenant->address }}</p>
                </div>
                <div class="col-md-6 text-right">
                    <h5>Émis par :</h5>
                    <p><strong>Nom du propriétaire :</strong> {{ $bill->contract->owner->name }}</p>
                    <p><strong>Adresse :</strong> {{ $bill->contract->owner->address }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Date de paiement :</strong> {{ $bill->paymant_date }}</p>
                </div>
                <div class="col-md-6 text-right">
                    <p><strong>Période :</strong> {{ $bill->period_number }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h5>Détails de la facture :</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Loyer mensuel</td>
                                <td>{{ $bill->paiemant_montant }} €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 text-right">
                    <h4>Total : {{ $bill->paiemant_montant }} €</h4>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('bills.index', ['contract_id' => $bill->contract->id]) }}" class="btn btn-secondary mt-3">Retour à la liste des factures</a>
</div>
@endsection