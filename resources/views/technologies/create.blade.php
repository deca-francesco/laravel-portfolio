@extends('layouts/app')

@section('content')


<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Nuova tecnologia
    <a href="{{ route('technologies.index') }}" class="btn btn-secondary">Indietro</a>
</h1>

{{-- se non specifichiamo il metodo ci porta alla index con i valori degli input nell'url --}}
{{-- index e store hanno lo stesso URI ma cambia il metodo --}}
<form action="{{ route('technologies.store') }}" method="POST" class="text-light">
    @csrf
    {{-- csrf è il token di autenticazione di laravel che controlla che la chiamata provenga da un form suo e dal tuo pc, browser ecc --}}
    <div class="mb-3">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="mb-3">
        <label for="color">Colore</label>
        <input type="color" class="form-control" name="color" id="color" required></input>
    </div>
    <div><button type="submit" class="btn btn-success">Salva tecnologia</button></div>
</form>

@endsection