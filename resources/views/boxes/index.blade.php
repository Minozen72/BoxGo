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
                <th>Nom</th>
                <th>Adresse</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boxes as $box)
                <tr>
                    <td>{{ $box->name }}</td>
                    <td>{{ $box->address }}</td>
                    <td>{{ $box->price }} €</td>
                    <td>
                        <a href="{{ route('boxes.show', $box->id) }}" class="btn btn-primary">Voir</a>
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