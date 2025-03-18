@extends('layouts/app')


@section('content')

<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Modifica tipo
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Indietro</a>
</h1>

<form action="{{ route('types.update', $type) }}" method="POST" class="text-light">
    @csrf {{-- token di autenticazione di laravel che controlla che la chiamata provenga da un form suo e dal tuo pc, browser ecc --}}
    @method("PUT") {{-- l'attributo method accetta solo get o post, ma visto che la rotta update è associata al metodo PUT lo specifichiamo qua --}}

    <div class="mb-3">
        <label for="name">Nome tipo</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $type->name }}" required>
    </div>
    <div class="mb-3">
        <label for="description">Descrizione tipo</label>
        <textarea class="form-control" name="description" id="description" rows="4" required>{{ $type->description }}</textarea>
    </div>
    <div><button type="submit" class="btn btn-success">Aggiorna tipo</button></div>
</form>



@endsection