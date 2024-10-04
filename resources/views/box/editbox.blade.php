<!-- resources/views/edit_box.blade.php -->
@extends('layouts.app')  <!-- Assurez-vous que ce layout existe -->

@section('content')
<div class="container">
    <h1>Modifier la Box : {{ $box->name }}</h1>

    <!-- Afficher les messages de succès ou d'erreur -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('boxes.update', $box->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom de la Box</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $box->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $box->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="rented">Louée</label>
            <select class="form-control" id="rented" name="rented">
                <option value="0" {{ $box->rented ? '' : 'selected' }}>Non</option>
                <option value="1" {{ $box->rented ? 'selected' : '' }}>Oui</option>
            </select>
        </div>

        <div class="form-group">
            <label for="locataire_id">Locataire</label>
            <select class="form-control" id="locataire_id" name="locataire_id">
                <option value="">Aucun</option>
                @foreach ($locataires as $locataire)
                    <option value="{{ $locataire->id }}" {{ $box->locataire_id == $locataire->id ? 'selected' : '' }}>
                        {{ $locataire->name }}  <!-- Assurez-vous que "name" est la bonne colonne -->
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Modifier la Box</button>
        <a href="{{ route('boxes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
