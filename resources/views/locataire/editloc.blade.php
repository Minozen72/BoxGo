@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier mon locataire : {{ $locataire->name }}</h1>

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

    <form action="{{ route('locataires.update', ['locataire' => $locataire->id, 'url' => $url]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom de mon locataire</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $locataire->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Email</label>
            <input class="form-control" name="email" value="{{ old('email', $locataire->email) }}">
        </div>        
        <button type="submit" class="btn btn-primary">Modifier mon locataire</button>
        <a href="{{ route('boxes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
