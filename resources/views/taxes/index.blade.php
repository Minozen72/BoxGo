@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestion des Impôts</h1>
    <form action="{{ route('taxes.calculate') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="year" class="form-label">Année</label>
            <input type="number" name="year" class="form-control" id="year" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculer</button>
    </form>
</div>
@endsection