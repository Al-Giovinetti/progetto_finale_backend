
@extends('layouts.app')

@section('content')


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

@endsection