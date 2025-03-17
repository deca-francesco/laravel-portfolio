@extends('layouts/app')

@section('content')

<h1>{{ $project->name }}</h1>

<div class="row row-cols-1">
    <div class="col">
        <h3><strong>Cliente: </strong>{{ $project->client }}</h3>
        <p><strong>Inizio: </strong>{{ $project->started }}</p>
        <p><strong>Fine: </strong>{{ $project->finished }}</p>
        <p><strong>Descrizione: </strong>{{ $project->description }}</p>
        <a class="btn btn-primary mt-5" href="{{ route('projects.index') }}">Torna indietro</a>
    </div>
</div>

@endsection