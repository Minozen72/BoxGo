@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la Facture</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bills.update', $bill->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="paiemant_montant" class="form-label">Montant</label>
            <input type="number" name="paiemant_montant" class="form-control" id="paiemant_montant" value="{{ old('paiemant_montant', $bill->paiemant_montant) }}" required>
        </div>
        <div class="mb-3">
            <label for="paymant_date" class="form-label">Date de paiement</label>
            <input type="date" name="paymant_date" class="form-control" id="paymant_date" value="{{ old('paymant_date', $bill->paymant_date) }}" required>
        </div>
        <div class="mb-3">
            <label for="period_number" class="form-label">Période</label>
            <input type="number" name="period_number" class="form-control" id="period_number" value="{{ old('period_number', $bill->period_number) }}" required>
        </div>
        <div class="mb-3">
           <input type="hidden" id="contract_id" name="contract_id" value="{{ $bill->contract_id }}">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection