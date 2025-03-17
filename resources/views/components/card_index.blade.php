<!-- The whole future lies in uncertainty: live immediately. - Seneca -->
<div class="card h-100">
    <div class="card-body">
        <h4>{{ $name }}</h4>
        <p><strong>Cliente: </strong>{{ $client }}</p>
        <p><strong>Data inizio: </strong>{{ $started }}</p>
        <p>
            <span>
                <strong>Data fine: </strong>{{ $finished ? $finished : "In corso"}}
            </span>
        </p>
        <a class="btn btn-primary" href="{{ route('projects.show', $id) }}">Dettagli</a>
    </div>
</div>