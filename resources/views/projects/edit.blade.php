@extends('layouts/app')

@section('content')

<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Modifica progetto
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Indietro</a>
</h1>

<form action="{{ route('projects.update', $project) }}" method="POST" class="text-light">
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
        <label for="client">Tipo</label>
        <input type="text" class="form-control" name="type" id="type" value="{{ $project->type }}" required>
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
        <label for="description">Descrizione progetto</label>
        <textarea class="form-control" name="description" id="description" rows="6" required>{{ $project->description }}</textarea>
    </div>
    <div><button type="submit" class="btn btn-success">Aggiorna progetto</button></div>
</form>

@endsection