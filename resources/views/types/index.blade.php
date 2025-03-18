@extends('layouts/app')

@section('content')
<h1>Tutti i tipi di progetto</h1>

<div class="row row-cols-2 row-cols-xl-3 g-5 mt-2">
    @foreach ($types as $type)
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <h3>{{ $type->name }}</h3>
                <p>{{ $type->description }}</p>
            </div>
            <div class="card-footer d-flex justify-content-end pt-4">
                {{-- <a class="btn btn-primary me-2" href="{{ route('types.show', $type->id) }}">Dettagli</a> --}}
                <a class="btn btn-warning me-2" href="{{ route('types.edit', $type->id) }}">Modifica</a>
                {{-- Button trigger modal --}}
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTypeModal_{{$type->id}}">Elimina</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection


{{-- Modal --}}
<div class="modal fade" id="deleteTypeModal_{{$type->id}}" tabindex="-1" aria-labelledby="deleteTypeModal_{{$type->id}}_Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteTypeModal_{{$type->id}}_Label">Sei sicuro di voler eliminare il progetto?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- <div class="modal-body"></div> --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                {{-- serve il form per poter usare il metodo delete --}}
                <form action="{{ route('projects.destroy', $type->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                </form>
            </div>
        </div>
    </div>
</div>