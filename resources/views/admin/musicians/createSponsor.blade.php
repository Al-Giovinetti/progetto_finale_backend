@extends('layouts.app')

@section('content')


<form action="{{route('admin.storeSponsor', $musician)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method ('POST')
    <div>
        <h2>
            Informazioni
        </h2>
        <ul>
            <li>
                Nome: {{$user->name}}
            </li>
            <li>
                Cognome: {{$user->musician->surname}}
            </li>
        </ul>
        <label for="sponsors" class="d-block">
            <h2>Sponsor</h2>
        </label>
        <select class='form-select' name="sponsors" id="sponsors">

            <option value="">No sponsor</option>
            @foreach ($sponsors as $sponsor)
            <option value="{{ $sponsor->id }}">
                {{ $sponsor->sponsor_type }}
            </option>
            @endforeach
        </select>

    </div>
    <button type="submit" class="btn btn-primary">Crea Sponsor</button>
</form>
@endsection