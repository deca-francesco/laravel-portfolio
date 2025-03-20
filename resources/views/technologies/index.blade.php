@extends('layouts/app')

@section('content')
<h1 class="d-flex justify-content-between align-items-center">
    Tutte le tecnologie
    <span class="text-end">
        <a href="{{ route('projects.index') }}" class="btn btn-primary">Progetti</a>
        <a href="{{ route('types.index') }}" class="btn btn-primary">Tipi di progetto</a>
        <a href="{{ route('technologies.create') }}" class="btn btn-success">Nuova tecnologia</a>
    </span>
</h1>

<div class="row row-cols-2 row-cols-xl-3 g-4 mt-2">
    @foreach ($technologies as $technology)
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <h3>{{ $technology->name }}</h3>
                <p>Colore badge: {{ strtoupper($technology->color) }} <input type="color" value="{{ $technology->color }}" disabled></p>

            </div>
            <div class="card-footer d-flex justify-content-end pt-2">
                <a class="btn btn-warning me-2" href="{{ route('technologies.edit', $technology->id) }}">Modifica</a>
                {{-- Button trigger modal --}}
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletetechnologyModal_{{$technology->id}}">Elimina</button>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="deletetechnologyModal_{{$technology->id}}" tabindex="-1" aria-labelledby="deletetechnologyModal_{{$technology->id}}_Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deletetechnologyModal_{{$technology->id}}_Label">Sei sicuro di voler eliminare questa tecnologia?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <div class="modal-body"></div> --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    {{-- serve il form per poter usare il metodo delete --}}
                    <form action="{{ route('technologies.destroy', $technology->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>

@endsection