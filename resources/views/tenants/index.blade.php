@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Locataires</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('tenants.create') }}" class="btn btn-primary">Ajouter un Locataire</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tenants as $tenant)
                <tr>
                    <td>{{ $tenant->name }}</td>
                    <td>{{ $tenant->email }}</td>
                    <td>{{ $tenant->phone }}</td>
                    <td>{{ $tenant->address }}</td>
                    <td>
                        <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" style="display:inline;">
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