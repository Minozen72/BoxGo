@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Factures</h1>
    contrat id : {{ $contract->id }}
    <br>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('bills.create', ['contract_id' => $contract->id]) }}" class="btn btn-primary mb-3">Créer une facture</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Montant</th>
                <th>Date de paiement</th>
                <th>Période</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bills as $bill)
                <tr>
                    <td>{{ $bill->id }}</td>
                    <td>{{ $bill->paiemant_montant }} €</td>
                    <td>{{ $bill->paymant_date }}</td>
                    <td>{{ $bill->period_number }}</td>
                    <td>
                        <a href="{{ route('bills.show', $bill->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('bills.edit', $bill->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('bills.destroy', $bill->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection