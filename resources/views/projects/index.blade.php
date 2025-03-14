@extends('./layouts/app')

@section('content')

<div class="container my-4">
    <h1>Tutti i progetti</h1>

    <div class="row row-cols-1 row-cols-xl-2 g-5">
        @foreach ($projects as $project)
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h4>{{ $project->name }}</h4>
                    <p><strong>Cliente: </strong>{{ $project->client }}</p>
                    <p><strong>Data inizio: </strong>{{ $project->started }}</p>
                    <p>
                        <span>
                            <strong>Data fine: </strong>{{ $project->finished ? $project->finished : "In corso"}}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection