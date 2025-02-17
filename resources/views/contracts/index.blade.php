@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Contrats</h1>
    <a href="{{ route('contracts.create') }}" class="btn btn-primary mb-3">Créer un nouveau contrat</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Prix mensuel</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contracts as $contract)
                <tr>
                    <td>{{ $contract->id }}</td>
                    <td>{{ $contract->date_start }}</td>
                    <td>{{ $contract->date_end }}</td>
                    <td>{{ $contract->monthly_price }} €</td>
                    <td>
                        <a href="{{ route('contracts.show', $contract->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline;">
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