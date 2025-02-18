@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer une nouvelle Facture</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="paiemant_montant" class="form-label">Montant</label>
            <input type="number" name="paiemant_montant" class="form-control" id="paiemant_montant" value="{{ $contract->monthly_price }}" required>
        </div>
        <div class="mb-3">
            <label for="paymant_date" class="form-label">Date de paiement (optionnel)</label>
            <input type="date" name="paymant_date" class="form-control" id="paymant_date" value="{{ old('paymant_date') }}">
        </div>
        <div class="mb-3">
            <input type="hidden" id="contract_id" name="contract_id" value="{{ $contract->id }}">
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection