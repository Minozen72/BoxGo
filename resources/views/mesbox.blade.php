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
                <th>Description</th>
                <th>Adresse</th>
                <th>Louée</th>
                <th>Locataire</th>
                <th>Prix</th>
                <th>Date de debut</th>
                <th>Date de fin</th>
                <th>Facture</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boxes as $box)
                <tr>
                    <td>{{ $box->name }}</td>
                    <td>{{ $box->description }}</td>
                    <td>{{ $box->adresse }}</td>
                    <td>{{ $box->rented ? 'Oui' : 'Non' }}</td>
                    <td>
                        @if ($box->locataire)
                            <a href="{{ route('locataires.edit', ['locataire' => $box->locataire->id, 'url' => url()->current()]) }}">{{ $box->locataire->name }}</a>
                        @else
                            Aucun
                        @endif
                    </td>
                    <td>
                        {{ $box->prix }} €
                    </td>
                    <td>
                        {{ $box->date_debut }}
                    </td>
                    <td>
                        {{ $box->date_fin }}
                    </td>
                    <td>
                        <a href="{{ route('factures.index', ['box_id' => $box->id]) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('boxes.facture', $box->id) }}" class="btn btn-success">Créer</a>
                    </td>
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
