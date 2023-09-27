@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <div class="p-4 fs-5">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h1 class="h2">Boosician</h1>

                            <a class="nav-link {{ Route::current()->getName() == 'admin.home' ? 'active' : '' }}" href="{{ route('admin.home') }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->getName() == 'admin.statistics.index' ? 'active' : '' }}" href="{{ route('admin.statistics.index') }}">
                                Statistiche
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->getName() == 'admin.messages.index' ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
                                Messages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->getName() == 'admin.reviews.index' ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}">
                                Reviews
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'token' || Route::currentRouteName() == 'payment' ? 'active' : '' }}" href="{{ route('token') }}">
                                PAGAMENTI
                            </a>
                        </li>
                        @guest
                        @else
                        <li class="nav-item dropdown">
                            <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>



                </div>
            </div>

        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 border-bottom flex-column">

            </div>
            <div class="row">
                <!-- Profilo -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>Profilo</h2>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                @if($currentMusician == null)
                                <p>Immagine : Inserire un'immagine</p>
                                @else
                                @if (str_starts_with($currentMusician->image, 'http'))
                                <img class="profile-img img-fluid" src="{{$currentMusician->image}}" alt="{{$currentMusician->name}}">
                                @else
                                <img class="profile-img img-fluid" src="{{asset('storage/' . $currentMusician->image)}}" alt="{{$currentMusician->name}}">
                                @endif
                                @endif
                            </div>
                            <hr>
                            <div class="container">
                                <h5 class="mb-3">{{ $user->name ?? '' }} {{ $currentMusician->surname ?? ''}}</h5>
                                <p>Data di nascita: {{ $currentMusician->birth_date ?? ''}}</p>
                                <p>Indirizzo: {{ $currentMusician->address ?? ''}}</p>
                                <p>Numero di telefono: {{ $currentMusician->num_phone ?? ''}}</p>
                                <p>Prezzo: {{ $currentMusician->price ?? ''}}€</p>
                                <p>Genere Musicale: {{ $currentMusician->musical_genre ?? ''}}</p>
                                @if($user->musician->musicalInstruments)
                                <div>
                                    <h4>Strumenti Musicali:</h4>
                                    <ul>
                                        @foreach ($user->musician->musicalInstruments as $musicalInstrument)
                                        <li>{{ $musicalInstrument->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <hr>
                                <p>{{ $currentMusician->bio ?? ''}}</p>
                                @if($user->musician->sponsors)
                                <div>
                                    <h2>
                                        Sponsor
                                    </h2>
                                    <p>Cronologia</p>
                                    <ul>
                                        <!--per aggiornare il DB digitare nel terminale php artisan schedule:run-->

                                        @foreach($user->musician->sponsors as $sponsor)

                                        <li>Tipologia di sponsor: {{ $sponsor->sponsor_type}} </li>
                                        <li>Data inizio: {{ $sponsor->pivot->sponsor_start}} </li>
                                        <li>Data fine: {{ $sponsor->pivot->sponsor_end}} </li>

                                        @if($sponsor->pivot->active == 1)
                                        <p class="text-success">Attivo</p>
                                        @else
                                        <p class="text-danger">Terminato</p>
                                        @endif
                                        @endforeach
                                    </ul>

                                </div>
                                @endif
                            </div>

                            @if (!$currentMusician)
                            <form action="{{ route('admin.musicians.create') }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-success mt-3 btn-edit">
                                    <i class="fas fa-plus-circle me-2"></i> Crea Musicista
                                </button>
                            </form>
                            @else
                            <div class="d-flex gap-4 align-items-center mx-4">
                                <form action="{{ route('admin.musicians.edit', ['musician' => $currentMusician->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm mt-3 btn-edit">Edit</button>
                                </form>
                                <form action="{{ $currentMusician ? route('admin.musicians.destroy', $currentMusician) : '#' }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm mt-3 btn-delete">Cancella</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Messaggi -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>Messaggi</h2>
                        </div>
                        <div class="card-body">
                            @foreach($messages->take(6) as $message)
                            @if($message->musician_id == auth()->user()->musician->id)
                            <div class="mb-3">
                                <p class="fw-bold">{{$message->name}}</p>
                                <p>{{ $message->message}}</p>
                            </div>
                            <hr>
                            @endif
                            @endforeach
                            <form action="{{ route('admin.messages.index')}}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm mt-3">Show More</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Recensioni -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>Recensioni</h2>
                        </div>
                        <div class="card-body">
                            @foreach($reviews->take(7) as $review)
                            @if($review->musician_id == auth()->user()->musician->id)
                            <div class="mb-3">
                                <p class="fw-bold">Voto: {{ $review->vote }}</p>
                                <p>{{$review->content }}</p>
                            </div>
                            <hr>
                            @endif
                            @endforeach
                            <form action="{{ route('admin.reviews.index')}}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm mt-3">Show More</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
</div>
</div>






@endsection

@section('js')
<script>
    //Quando vuoi cancellare il profilo ti chiede prima la conferma
    const formCanc = document.querySelector('form.form-canc');

    formCanc.addEventListener('submit', function(event) {
        event.preventDefault();
        const userConfirm = window.confirm('Sei sicuro di volerti cancellare dalla piattaforma? Profilo e registrazione andranno persi ');
        if (userConfirm) {
            formCanc.submit()
        }
    })

    //A seconda di che radio preme l' utente compare di inserire il file o l'url
</script>
@endsection




<style lang="scss" scoped>
    aside {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: sticky;
        top: 0;
    }

    .top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1.4rem;
    }

    .logo img {
        width: 2rem;
        height: 2rem;
    }

    .logo {
        display: flex;
        gap: 2rem;
    }

    .close {
        display: none;
    }

    .sidebar {
        width: 200px;
        display: flex;
        flex-direction: column;
        position: relative;
        top: 3rem;
    }


    a {
        display: flex;
        margin-left: 2rem;
        padding: 0 20px 0 0;
        gap: 1rem;
        align-items: center;
        position: relative;
        height: 3.7rem;
        transition: all 300ms ease;

        /* h3{
                font-size: 1rem;
            } */
    }








    @media (max-width: 768px) {
        .logo img {
            width: 1.5rem;
            height: 1.5rem;
        }

        .logo h2 {
            font-size: 1.5rem;
        }
    }





    @media (max-width: 768px) {
        .top {
            margin-top: 0.8rem;
        }
    }


    @media (max-width: 768px) {
        .col-4.preview p {
            font-size: 0.8rem;
        }

        .col-4 .row a {
            font-size: 0.9rem;
        }
    }


    @media (max-width: 768px) {

        .col-10.preview p {
            font-size: 0.8rem;
        }
    }
</style>