@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Il tuo Profilo Musicista</h1>

    <div class="card">
        <p>Nome: {{ $user->name ?? '' }}</p>
        <p>Cognome: {{ $currentMusician->surname ?? ''}}</p>
        <p>Data di nascita: {{ $currentMusician->birth_date ?? ''}}</p>
        <p>Indirizzo: {{ $currentMusician->address ?? ''}}</p>
        <p>Numero di telefono: {{ $currentMusician->num_phone ?? ''}}</p>
        <p>Immagine: {{ $currentMusician->image ?? ''}}</p>
        <p>Bio: {{ $currentMusician->bio ?? ''}}</p>
        <p>CV: {{ $currentMusician->cv ?? ''}}</p>
        <p>Prezzo: {{ $currentMusician->price ?? ''}}€</p>
        <p>Genere Musicale: {{ $currentMusician->musical_genre ?? ''}}</p>


        
        <div class="button d-flex gap-3">

            <form action="{{ $currentMusician ? route('admin.musicians.destroy', $currentMusician) : '#' }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm">Cancella</button>
            </form>
            @if (!$currentMusician)
                <form action="{{ route('admin.musicians.create') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">Crea Musicista</button>
                </form>
            @else
                <a href="{{ route('admin.musicians.edit', ['musician' => $currentMusician->id]) }}" class="btn btn-primary btn-sm">Edit</a>
            @endif
            
        </div>
    </div>
</div>

@endsection