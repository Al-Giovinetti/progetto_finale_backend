
@extends('layouts.app')

@section('content')


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

@endsection