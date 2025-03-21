@extends('layouts/app')

@section('content')


<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Nuovo progetto
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Indietro</a>
</h1>


{{-- se non specifichiamo il metodo ci porta alla index con i valori degli input nell'url --}}
{{-- index e store hanno lo stesso URI ma cambia il metodo --}}
<form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="text-light">
    @csrf
    {{-- csrf è il token di autenticazione di laravel che controlla che la chiamata provenga da un form suo e dal tuo pc, browser ecc --}}
    <div class="mb-3">
        <label for="name">Nome progetto</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="mb-3">
        <label for="client">Cliente</label>
        <input type="text" class="form-control" name="client" id="client">
    </div>
    <div class="mb-3">
        <label for="type_id">Tipo</label>
        <select class="form-select" name="type_id" id="type_id" required>
            @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="">Tecnologie</label>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-2">
            @foreach ($technologies as $technology)
            <div class="col">
                {{-- se mettiamo name="technology_{{ $technology->id }}" invierà una technology per ogni checkbox selezionata.
                Con name="technologies[]" e value="{{ $technology->id }}" inviamo un array $technologies con elementi gli id delle technologies selezionate --}}
                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="technology_{{ $technology->id }}">
                <label for="technology_{{ $technology->id }}" class="me-2">{{ $technology->name }}</label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mb-3">
        <label for="started">Inizio progetto</label>
        <input type="date" class="form-control" name="started" id="started" value="{{ date('Y-m-d') }}" required>
    </div>
    <div class="mb-3">
        <label for="finished">Fine progetto</label>
        <input type="date" class="form-control" name="finished" id="finished">
    </div>
    <div class="mb-3">
        <label for="image">Immagine progetto</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>
    <div class="mb-3">
        <label for="description">Descrizione progetto</label>
        <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
    </div>
    <div><button type="submit" class="btn btn-success">Salva progetto</button></div>
</form>

@endsection