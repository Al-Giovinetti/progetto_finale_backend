
@extends('layouts.app')

@section('content')

<div class="container">
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
    p.my_content{
        font-size: 1.3rem;
    }

    .vote-red{
        color: red;
    }

    .vote-green{
        color: green;
    }
</style>