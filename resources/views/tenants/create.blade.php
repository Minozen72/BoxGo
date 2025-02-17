@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un Locataire</h1>
        <form method="POST" action="{{ route('tenants.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
