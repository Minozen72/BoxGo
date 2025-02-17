@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modèles de Contrat</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('contract_models.create') }}" class="btn btn-primary">Ajouter un Modèle de Contrat</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contractModels as $contractModel)
                <tr>
                    <td>{{ $contractModel->name }}</td>
                    <td>
                        <a href="{{ route('contract_models.show', $contractModel->id) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('contract_models.edit', $contractModel->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('contract_models.destroy', $contractModel->id) }}" method="POST" style="display:inline;">
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