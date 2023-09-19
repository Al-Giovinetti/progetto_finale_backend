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

<form action="{{route('admin.musicians.destroy',$currentMusician)}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Cancella</button>
</form>

@endsection