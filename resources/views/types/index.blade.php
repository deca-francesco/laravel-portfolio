@extends('layouts/app')

@section('content')
<h1 class="d-flex justify-content-between align-items-center">
    Tutti i tipi di progetto
    <span>
        <a href="{{ route('projects.index') }}" class="btn btn-primary">Progetti</a>
        <a href="{{ route('technologies.index') }}" class="btn btn-primary">Tecnologie</a>
        <a href="{{ route('types.create') }}" class="btn btn-success">Nuovo tipo</a>
    </span>
</h1>

<div class="row row-cols-2 row-cols-xl-3 g-4 mt-2">
    @foreach ($types as $type)
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <h3>{{ $type->name }}</h3>
                <p>{{ $type->description }}</p>
            </div>
            <div class="card-footer d-flex justify-content-end pt-2">
                <a class="btn btn-warning me-2" href="{{ route('types.edit', $type->id) }}">Modifica</a>
                {{-- Button trigger modal --}}
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTypeModal_{{$type->id}}">Elimina</button>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="deleteTypeModal_{{$type->id}}" tabindex="-1" aria-labelledby="deleteTypeModal_{{$type->id}}_Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteTypeModal_{{$type->id}}_Label">Sei sicuro di voler eliminare questa tipologia?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <div class="modal-body"></div> --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    {{-- serve il form per poter usare il metodo delete --}}
                    <form action="{{ route('types.destroy', $type->id) }}" method="POST">
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