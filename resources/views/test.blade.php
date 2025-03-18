@php
use App\Models\Type;

// mi costruisco l'array con l'id dei types
$typesCollection = Type::all();
$typesIdArray = [];

// riempio l'array
foreach ($typesCollection as $type) {
$typesIdArray[] = $type->id;
};

// prendo a random un id tra il primo e l'ultimo (i types cancellati non saranno mai presi e quindi funzionerà anche con id mancanti)
function getRadomTypeId($idArray)
{
// prendo l'id anzichè un numero random da 1 alla lunghezza dell'array
return $idArray[rand(0, (count($idArray) - 1))];
}

@endphp

@extends('layouts/app')

@section('content')

{{ var_dump($typesIdArray) }}

@for ($i = 0; $i < 10; $i++) <p>{{ $i + 1 }}) {{getRadomTypeId($typesIdArray)}} </p>

    @endfor

    @endsection