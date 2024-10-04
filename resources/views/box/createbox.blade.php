@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer une Box</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('boxes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="rented" class="form-label">Louée</label>
                <select name="rented" class="form-control" id="rented">
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="locataire_id" class="form-label">Locataire</label>
                <select name="locataire_id" class="form-control" id="locataire_id">
                    <option value="">Aucun</option>
                    @foreach ($locataires as $locataire)
                        <option value="{{ $locataire->id }}">{{ $locataire->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rentedSelect = document.getElementById('rented');
            const locataireSelect = document.getElementById('locataire_id');
            const form = document.querySelector('form');

            form.addEventListener('submit', function(event) {
                if (rentedSelect.value === '1' && locataireSelect.value === '') {
                    event.preventDefault();
                    alert('Erreur : Vous devez sélectionner un locataire si la box est louée.');
                }
            });

            rentedSelect.addEventListener('change', function() {
                if (this.value === '1') {
                    locataireSelect.setAttribute('required', 'required');
                } else {
                    locataireSelect.removeAttribute('required');
                }
            });
        });
    </script>
@endsection
