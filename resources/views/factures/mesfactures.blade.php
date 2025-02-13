@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Factures</h1>
    @if($factures->isEmpty())
        <p>Aucune facture trouvée pour cette box.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date de réception</th>
                    <th>Période</th>
                    <th>Montant</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($factures as $facture)
                    <tr>
                        <td>{{ $facture->id }}</td>
                        <td>{{ $facture->date_recu }}</td>
                        <td>du {{ $facture->periode_debut }} au {{ $facture->periode_fin }}</td>
                        <td>{{ $facture->box->prix }} €</td>
                        <td>
                            <a href="{{ route('factures.show', $facture->id) }}" class="btn btn-primary">Voir</a>
                            <a href="{{ route('factures.edit', $facture->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('factures.destroy', $facture->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection