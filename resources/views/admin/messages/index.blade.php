
@extends('layouts.app')

@section('content')

<div class="container">

    <ul>
        @foreach ($musicianMessages as $message)
        <li>
            <p>name
                {{$message->name}}
            </p>
            <p>email:
    
                {{$message->mail}}
            </p>
            <p>messages:
    
                {{$message->message}}
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