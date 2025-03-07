@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un nouveau Contrat</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contracts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="date_start" class="form-label">Date de début</label>
            <input type="date" name="date_start" class="form-control" id="date_start" value="{{ old('date_start') }}" required>
        </div>
        <div class="mb-3">
            <label for="date_end" class="form-label">Date de fin</label>
            <input type="date" name="date_end" class="form-control" id="date_end" value="{{ old('date_end') }}" required>
        </div>
        <div class="mb-3">
            <label for="monthly_price" class="form-label">Prix mensuel</label>
            <input type="number" name="monthly_price" class="form-control" id="monthly_price" value="{{ old('monthly_price') }}" required>
        </div>
        <div class="mb-3">
            <label for="box_id" class="form-label">Box</label>
            <select name="box_id" class="form-control" id="box_id" required>
                @foreach ($boxes as $box)
                    <option value="{{ $box->id }}">{{ $box->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tenant_id" class="form-label">Locataire</label>
            <select name="tenant_id" class="form-control" id="tenant_id" required>
                @foreach ($tenants as $tenant)
                    <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="contract_model_id" class="form-label">Modèle de contrat</label>
            <select name="contract_model_id" class="form-control" id="contract_model_id" required>
                @foreach ($contractModels as $contractModel)
                    <option value="{{ $contractModel->id }}">{{ $contractModel->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection