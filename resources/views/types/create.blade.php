@extends('layouts/app')

@section('content')


<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Nuovo tipo
    <a href="{{ route('types.index') }}" class="btn btn-secondary">Indietro</a>
</h1>

{{-- se non specifichiamo il metodo ci porta alla index con i valori degli input nell'url --}}
{{-- index e store hanno lo stesso URI ma cambia il metodo --}}
<form action="{{ route('types.store') }}" method="POST" class="text-light">
    @csrf
    {{-- csrf è il token di autenticazione di laravel che controlla che la chiamata provenga da un form suo e dal tuo pc, browser ecc --}}
    <div class="mb-3">
        <label for="name">Nome tipo</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="mb-3">
        <label for="description">Descrizione tipo</label>
        <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
    </div>
    <div><button type="submit" class="btn btn-success">Salva tipo</button></div>
</form>

@endsection