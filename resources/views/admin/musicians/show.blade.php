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

        @if($currentMusician == null)
            <p>Immagine : Inserire un'immagine</p>
        @else
            @if (str_starts_with($currentMusician->image, 'http'))
                <p>Immagine: <img src="{{$currentMusician->image}}" alt="{{$currentMusician->name}}"></p> 
            @else
                <img src="{{asset('storage/' . $currentMusician->image)}}" alt="">
            @endif
        @endif
        <p>Bio: {{ $currentMusician->bio ?? ''}}</p>
        <p>CV: {{ $currentMusician->cv ?? ''}}</p>
        <p>Prezzo: {{ $currentMusician->price ?? ''}}€</p>
        <p>Genere Musicale: {{ $currentMusician->musical_genre ?? ''}}</p>




            @if($user->musician->musicalInstruments)
                    <div>
                        <h2>
                            Strumenti Musicali
                        </h2>
                        <ul>
                            @foreach ($user->musician->musicalInstruments as $musicalInstrument)
                            <li>
                                {{ $musicalInstrument->name }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif




        
        <div class="button d-flex gap-3">
            @if (!$currentMusician)
                <form action="{{ route('admin.musicians.create') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">Crea Musicista</button>
                </form>
            @else
                <a href="{{ route('admin.musicians.edit', ['musician' => $currentMusician->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ $currentMusician ? route('admin.musicians.destroy', $currentMusician) : '#' }}" method="POST" class="form-canc">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm" >Cancella</button>
                </form>
            @endif

        </div>
    </div>
</div>

<!-- <aside id="popUp">
    <h2>Sei sicuro di volerti cancellare dalla piattaforma?</h2>
    <p>Perderai sia il tuo prfilo che la registarzione</p>
    <i class="fa-solid fa-trash"></i>
    <div>
        <button type="button">Si</button>
        <button type="button">Si</button>
    </div>
</aside> -->
@endsection

@section('js')
<script>
     const formCanc = document.querySelector('form.form-canc');
     console.log(formCanc)

    formCanc.addEventListener('submit',function(event){
        event.preventDefault();
        const userConfirm = window.confirm('Sei sicuro di volerti cancellare dalla piattaforma? Profilo e registrazione andranno persi ');
        if(userConfirm){
            formCanc.submit()
        }
     })


</script>
@endsection