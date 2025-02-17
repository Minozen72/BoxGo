@section('content')
<div class="container">
    <h1>Modifier le Contrat</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contracts.update', $contract->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="date_start" class="form-label">Date de début</label>
            <input type="date" name="date_start" class="form-control" id="date_start" value="{{ old('date_start', $contract->date_start) }}" required>
        </div>
        <div class="mb-3">
            <label for="date_end" class="form-label">Date de fin</label>
            <input type="date" name="date_end" class="form-control" id="date_end" value="{{ old('date_end', $contract->date_end) }}" required>
        </div>
        <div class="mb-3">
            <label for="monthly_price" class="form-label">Prix mensuel</label>
            <input type="number" name="monthly_price" class="form-control" id="monthly_price" value="{{ old('monthly_price', $contract->monthly_price) }}" required>
        </div>
        <div class="mb-3">
            <label for="box_id" class="form-label">Box</label>
            <select name="box_id" class="form-control" id="box_id" required>
                @foreach ($boxes as $box)
                    <option value="{{ $box->id }}" {{ $box->id == $contract->box_id ? 'selected' : '' }}>{{ $box->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tenant_id" class="form-label">Locataire</label>
            <select name="tenant_id" class="form-control" id="tenant_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $contract->tenant_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="owner_id" class="form-label">Propriétaire</label>
            <select name="owner_id" class="form-control" id="owner_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $contract->owner_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="contract_model_id" class="form-label">Modèle de contrat</label>
            <select name="contract_model_id" class="form-control" id="contract_model_id" required>
                @foreach ($contractModels as $contractModel)
                    <option value="{{ $contractModel->id }}" {{ $contractModel->id == $contract->contract_model_id ? 'selected' : '' }}>{{ $contractModel->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection