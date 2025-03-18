<!-- The whole future lies in uncertainty: live immediately. - Seneca -->
<div class="card h-100">
    <div class="card-body">
        <h4>{{ $name }}</h4>
        <p><strong>Cliente: </strong>{{ $client }}</p>
        <p><strong>Tipo: </strong>{{ $type }}</p>
        <p><strong>Data inizio: </strong>{{ $started }}</p>
        <p>
            <span>
                <strong>Data fine: </strong>{{ $finished != "" ? $finished : "In corso"}}
            </span>
        </p>
        <div class="card-footer d-flex justify-content-end pt-4">
            <a class="btn btn-primary me-2" href="{{ route('projects.show', $id) }}">Dettagli</a>
            <a class="btn btn-warning me-2" href="{{ route('projects.edit', $id) }}">Modifica</a>
            {{-- Button trigger modal --}}
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$id}}">Elimina</button>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="deleteModal_{{$id}}" tabindex="-1" aria-labelledby="deleteModal_{{$id}}_Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModal_{{$id}}_Label">Sei sicuro di voler eliminare il progetto?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- <div class="modal-body"></div> --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                {{-- serve il form per poter usare il metodo delete --}}
                <form action="{{ route('projects.destroy', $id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                </form>
            </div>
        </div>
    </div>
</div>