@extends('layouts/app')

@section('content')

<h1 class="mb-4 d-flex justify-content-between align-items-center">
    {{ $project->name }}
    <span>
        <a class="btn btn-secondary" href="{{ route('projects.index') }}">Indietro</a>
        <a class="btn btn-warning" href="{{ route('projects.edit', $project) }}">Modifica</a>

        {{-- Button trigger modal --}}
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProjectModal">Elimina</button>
    </span>
</h1>

<div class="row row-cols-1">
    <div class="col">
        <h3><strong>Cliente: </strong>{{ $project->client }}</h3>
        <p><strong>Tipo: </strong>{{ $project->type->name }}</p>
        <p><strong>Inizio: </strong>{{ $project->started }}</p>
        <p><strong>Fine: </strong>{{ $project->finished != "" ? $project->finished : "In corso"}}</p>
        <p><strong>Descrizione: </strong>{{ $project->description }}</p>
    </div>
</div>

@endsection


{{-- Modal --}}
<div class="modal fade" id="deleteProjectModal" tabindex="-1" aria-labelledby="deleteProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteProjectModalLabel">Sei sicuro di voler eliminare il progetto?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- <div class="modal-body"></div> --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                {{-- serve il form per poter usare il metodo delete --}}
                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                </form>
            </div>
        </div>
    </div>
</div>