@extends('layouts/app')

@section('content')

<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Modifica progetto
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Indietro</a>
</h1>

<form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="text-light">
    @csrf {{-- token di autenticazione di laravel che controlla che la chiamata provenga da un form suo e dal tuo pc, browser ecc --}}
    @method("PUT") {{-- l'attributo method accetta solo get o post, ma visto che la rotta update è associata al metodo PUT lo specifichiamo qua --}}

    <div class="mb-3">
        <label for="name">Nome progetto</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $project->name }}" required>
    </div>
    <div class="mb-3">
        <label for="client">Cliente</label>
        <input type="text" class="form-control" name="client" id="client" value="{{ $project->client }}">
    </div>
    <div class="mb-3">
        <label for="type_id">Tipo</label>
        <select class="form-select" name="type_id" id="type_id" required>
            @foreach ($types as $type)
            {{-- faccio in modo di avere già selzionato il type del project --}}
            <option value="{{ $type->id }}" {{ $type->id === $project->type_id ? "selected" : "" }}>{{ $type->name }}</option>
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
                {{-- faccio in modo di checkare le technologies che aveva il project --}}
                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="technology_{{ $technology->id }}" {{ $project->technologies->contains($technology->id) ? "checked" : "" }}>
                <label for="technology_{{ $technology->id }}" class="me-2">{{ $technology->name }}</label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mb-3">
        <label for="started">Inizio progetto</label>
        <input type="date" class="form-control" name="started" id="started" value="{{ $project->started }}" required>
    </div>
    <div class="mb-3">
        <label for="finished">Fine progetto</label>
        <input type="date" class="form-control" name="finished" id="finished" value="{{ $project->finished }}">
    </div>
    <div class="mb-3">
        <label for="image">Immagine progetto</label>
        <input type="file" class="form-control" name="image" id="image">

        @if ($project->image)
        <div>Immagine corrente:</div>
        {{-- va costruito il percorso assoluto partendo da quello relativo del db --}}
        <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid w-25" alt="copertina">
        @endif
    </div>
    <div class="mb-3">
        <label for="description">Descrizione progetto</label>
        <textarea class="form-control" name="description" id="description" rows="6" required>{{ $project->description }}</textarea>
    </div>
    <div><button type="submit" class="btn btn-success">Aggiorna progetto</button></div>
</form>

@endsection