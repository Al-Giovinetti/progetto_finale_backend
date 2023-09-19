@extends('layouts.app')

@section('content')

<div class="card">
    <p>Data di nascita</p>
    <p> {{ $currentMusician->birth_date}}</p>
    <p>Indirizzo</p>
    <p>......</p>
    <p>numero di telefono</p>
    <p>......</p>
</div>

@endsection