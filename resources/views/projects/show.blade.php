@extends('layouts/app')

@section('content')

<h1 class="mb-4 d-flex justify-content-between align-items-center">
    {{ $project->name }}
    <a class="btn btn-primary" href="{{ route('projects.index') }}">Torna indietro</a>
</h1>

<div class="row row-cols-1">
    <div class="col">
        <h3><strong>Cliente: </strong>{{ $project->client }}</h3>
        <p><strong>Inizio: </strong>{{ $project->started }}</p>
        <p><strong>Fine: </strong>{{ $project->finished }}</p>
        <p><strong>Descrizione: </strong>{{ $project->description }}</p>
    </div>
</div>

@endsection