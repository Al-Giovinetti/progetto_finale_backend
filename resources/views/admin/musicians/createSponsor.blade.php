@extends('layouts.app')

@section('content')

<div class="w-75 mx-auto container">
    <h3>Tipologie di sponsor</h3>
    <p>Sponsorizzati per avere più visibilità e alzare il numero dei tuoi clienti.</p>
    <div class="d-flex justify-content-around row">
        @foreach($sponsors as $sponsor)
            <div class="card text-center shadow-lg col-12 col-md-3 px-0 my-3">
                <div class="card-header bg-primary">
                    <h4 class="text-white fw-bold">{{ $sponsor->sponsor_type}}</h4>
                </div>
                <div class="card-body">
                    <h5> @php echo substr( $sponsor->duration, 0, 2) @endphp ore</h5>
                    <h5>{{ $sponsor->price}} &euro;</h5>
                </div>
            </div>
        @endforeach
    </div>

    <form action="{{route('admin.storeSponsor', $musician)}}" method="POST" enctype="multipart/form-data" class="row">
        @csrf
        @method ('POST')
        <div class="col-12">
            <h3>
                Informazioni
            </h3>
            <ul>
                <li>
                    Nome: {{$user->name}}
                </li>
                <li>
                    Cognome: {{$user->musician->surname}}
                </li>
            </ul>
            <label for="sponsors" class="d-block">
                <h3>Seleziona il tuo sponsor</h3>
            </label>
            <select class='form-select w-50' name="sponsors" id="sponsors">

                <option value="">No sponsor</option>
                @foreach ($sponsors as $sponsor)
                <option value="{{ $sponsor->id }}">
                    {{ $sponsor->sponsor_type }}
                </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mt-2">Procedi al pagamento</button>
        </div>
    </form>
    </div>

    <style>
        h3{
            color:  #f88936;
        }

    </style>

@endsection