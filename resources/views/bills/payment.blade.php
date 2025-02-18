@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Paiements</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Ajout du bouton de génération -->
    <div class="mb-3">
        <form action="{{ route('bills.generate-monthly') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success mb-3">
                <i class="fas fa-plus"></i> Générer les factures du mois
            </button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Période</th>
                    <th>Montant</th>
                    <th>Date de paiement</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bills as $bill)
                    <tr>
                        <td>{{ $bill->id }}</td>
                        <td>{{ $bill->period_number }}</td>
                        <td>{{ $bill->paiemant_montant }} €</td>
                        <td>{{ $bill->paymant_date ? date('d/m/Y', strtotime($bill->paymant_date)) : 'Non payé' }}</td>
                        <td>
                            @if($bill->paymant_date)
                                <span class="badge bg-success">Payé</span>
                            @else
                                <span class="badge bg-danger">En attente</span>
                            @endif
                        </td>
                        <td>
                            @if(!$bill->paymant_date)
                                <form action="{{ route('bills.update', $bill->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="date" 
                                           name="paymant_date" 
                                           class="form-control d-inline" 
                                           style="width: auto"
                                           required>
                                    <button type="submit" class="btn btn-sm btn-primary">Valider le paiement</button>
                                </form>
                            @endif
                            <a href="{{ route('bills.show', $bill->id) }}" class="btn btn-sm btn-info text-white">
                                <i class="fas fa-eye"></i> Voir la facture
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection