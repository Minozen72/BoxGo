@extends('layouts.app')
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
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse', $box->adresse) }}" required>
        </div>

        <div class="form-group">
            <label for="rented">Louée</label>
            <select class="form-control" id="rented" name="rented">
                <option value="0" {{ $box->rented ? '' : 'selected' }}>Non</option>
                <option value="1" {{ $box->rented ? 'selected' : '' }}>Oui</option>
            </select>
        </div>

        <div class="form-group" id="locataire-container" style="display: none;">
            <label for="locataire_id">Locataire</label>
            <select class="form-control" id="locataire_id" name="locataire_id">
                <option value="">Aucun</option>
                @foreach ($locataires as $locataire)
                    <option value="{{ $locataire->id }}" {{ $box->locataire_id == $locataire->id ? 'selected' : '' }}>
                        {{ $locataire->name }}  <!-- Assurez-vous que "name" est la bonne colonne -->
                    </option>
                @endforeach
            </select>

            <br><label for="date_debut">Date de début</label>
            <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ old('date_debut', $box->date_debut) }}">
            <br><label for="date_fin">Date de fin</label>
            <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ old('date_fin', $box->date_fin) }}">
        </div>

        <div class="form-group">
            <label for="prix">Prix (€/mois)</label>
            <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix', $box->prix) }}" required>
        </div>
        <br>

        <input type="number" id="proproprietaire_id" name="proprietaire_id" value="{{ $box->proprietaire_id }}" hidden>

        <button type="submit" class="btn btn-primary">Modifier la Box</button>
        <a href="{{ route('boxes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rentedSelect = document.getElementById('rented');
        const locataireContainer = document.getElementById('locataire-container');
        const locataireSelect = document.getElementById('locataire_id');
        const form = document.querySelector('form');

        function toggleLocataireContainer() {
            if (rentedSelect.value === '1') {
                locataireContainer.style.display = 'block';
                locataireSelect.setAttribute('required', 'required');
            } else {
                locataireContainer.style.display = 'none';
                locataireSelect.removeAttribute('required');
            }
        }

        rentedSelect.addEventListener('change', toggleLocataireContainer);

        form.addEventListener('submit', function(event) {
            if (rentedSelect.value === '1' && locataireSelect.value === '') {
                event.preventDefault();
                alert('Erreur : Vous devez sélectionner un locataire si la box est louée.');
            }
        });

        // Initial call to set the correct state on page load
        toggleLocataireContainer();
    });
</script>
@endsection
