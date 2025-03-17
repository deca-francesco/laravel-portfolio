@extends('layouts/app')

@section('content')

{{-- <h1>Nuovo progetto</h1> --}}

<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Nuovo progetto
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Torna indietro</a>
</h1>

{{-- se non specifichiamo il metodo ci porta alla index con i valori degli input nell'url --}}
{{-- index e store hanno lo stesso URI ma cambia il metodo --}}
<form action="{{ route('projects.store') }}" method="POST" class="text-light">
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
        <label for="client">Tipo</label>
        <input type="text" class="form-control" name="type" id="type" required>
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
        <label for="description">Descrizione progetto</label>
        <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
    </div>
    <div><button type="submit" class="btn btn-success">Salva progetto</button></div>
</form>

@endsection