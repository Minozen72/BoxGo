@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer une Box</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('boxes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prix (€/mois)</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection