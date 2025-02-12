@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes locataires</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('locataires.create') }}" class="btn btn-primary">Ajouter un locataires</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locataires as $loc)
                <tr>
                    <td>{{ $loc->id }}</td>
                    <td>{{ $loc->name }}</td>
                    <td>{{ $loc->email }}</td>

                    <td>
                        <a href="{{ route('locataires.edit', $loc->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('locataires.destroy', $loc->id) }}" method="POST" style="display:inline;">
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
