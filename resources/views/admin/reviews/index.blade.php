
@extends('layouts.app')

@section('content')

<div class="container">
    <ul>
        @foreach ($musicianReview as $review)
        <li>
            <p>Contenuto:
                {{$review->content}}
            </p>
            <p>voto:
    
                {{$review->vote}}
            </p>
        </li>
        @endforeach
    </ul>
</div>


<div class="container">
    <a class="active {{ Route::current()->getName() == 'admin.home' ? 'active' : '' }}" aria-current="page" href="{{ route('admin.home') }}">
        <h3>Back</h3>
    </a>
</div>
@endsection