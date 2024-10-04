@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Boxes</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('boxes.create') }}" class="btn btn-primary">Ajouter une Box</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Louée</th>
                <th>Locataire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boxes as $box)
                <tr>
                    <td>{{ $box->id }}</td>
                    <td>{{ $box->name }}</td>
                    <td>{{ $box->description }}</td>
                    <td>{{ $box->rented ? 'Oui' : 'Non' }}</td>
                    <td>{{ $box->locataire ? $box->locataire->name : 'Aucun' }}</td>
                    <td>
                        <a href="{{ route('boxes.edit', $box->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('boxes.destroy', $box->id) }}" method="POST" style="display:inline;">
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
