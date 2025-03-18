@extends('./layouts/app')

@section('content')

<h1 class="mb-4 d-flex justify-content-between align-items-center">
    Tutti i progetti
    <span>
        <a href="{{ route('types.index') }}" class="btn btn-primary">Tipi di progetto</a>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Nuovo progetto</a>
    </span>
</h1>

<div class="row row-cols-1 row-cols-xl-2 g-5 mb-5">
    @foreach ($projects as $project)
    <div class="col">
        <x-card_index>
            {{-- se passo direttamente il project dà errore, senza il componente invece funziona --}}
            <x-slot:id>{{ $project->id }}</x-slot:id>
            <x-slot:name>{{ $project->name }}</x-slot:name>
            <x-slot:client>{{ $project->client }}</x-slot:client>
            <x-slot:type>{{ $project->type->name }}</x-slot:type>
            <x-slot:started>{{ $project->started }}</x-slot:started>
            <x-slot:finished>{{ $project->finished }}</x-slot:finished>
        </x-card_index>
    </div>
    @endforeach
</div>

@endsection