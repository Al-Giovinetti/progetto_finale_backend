
@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Barra laterale -->
        <nav id="sidebar" class="position-sticky col-md-3 col-lg-2 d-md-block sidebar">
            <div class="position-sticky">
                <div class="p-4 fs-5">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h1 class="h2">Boosician</h1>
                        </li>
                        <li class="nav-item">
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
                            <a class="nav-link" href="{{ route('admin.createSponsor', $user->musician) }}">
                                Sponsor
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

        <div class="col-md-9">
            <div class="review-section">
                @foreach ($musicianReview as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        @if ($review->vote != 0)
                        <p class="my_content">Contenuto:
                            {{$review->content}}
                        </p>
                        <p class="{{getColorForClass($review->vote)}}">Voto:
                            {{$review->vote}}
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="container">
    <a class="active {{ Route::current()->getName() == 'admin.home' ? 'active' : '' }}" aria-current="page" href="{{ route('admin.home') }}">
        <button class="btn btn-primary">Indietro</button>
    </a>
</div>
@endsection

@php
    function getColorForClass($vote){
        if($vote <= 2){
            return 'vote-red';
        }elseif($vote >= 3){
            return 'vote-green';
        }
    }
@endphp



<style lang="scss" scoped>
    /* Stile della barra laterale */
    nav#sidebar {
        position: sticky;
        top: 0;
        height: 100%;
    }

    /* Stile della sezione dei messaggi e delle recensioni */
    .message-section, .review-section {
        /* Larghezza della barra laterale */
        padding: 20px;
    }

    /* Aggiungi uno sfondo o altri stili desiderati per la sezione dei messaggi e delle recensioni */

    div.card {
        box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
    }

    p.my_name {
        font-size: 1.3rem;
    }

    p.my_message, p.my_content {
        font-size: 1rem;
    }

    p.my_email {
        font-size: .8rem;
    }

    .vote-red {
        color: red;
    }

    .vote-green {
        color: green;
    }
</style>