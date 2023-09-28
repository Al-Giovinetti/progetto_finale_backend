
@extends('layouts.app')

@section('content')

<div class="container">
    @foreach ($musicianMessages as $message)
    <div class="card mb-4">
        <div class="card-body">
            <p class="my_name">
                <strong>{{$message->name}}</strong>
            </p>
            <p class="my_message">
                
                {{$message->message}}
            </p>
            <p class="my_email">Email:
                {{$message->mail}}
            </p>
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

<style lang="scss" scoped>
    div.card{
        box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;

    }
    
    p.my_name{
        font-size: 1.3rem;
    }

    p.my_message{
        font-size: 1rem;
    }

    p.my_email{
        font-size: .8rem;
    }
</style>