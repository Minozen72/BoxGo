@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Locataire</h1>
    <form method="POST" action="{{ route('tenants.update', $tenant->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $tenant->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $tenant->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $tenant->phone }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $tenant->address }}">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
