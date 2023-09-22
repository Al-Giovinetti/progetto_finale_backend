@extends('layouts.app')

@section('content')


<form action="{{route('admin.musicians.update', $loggedMusician)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method ('PUT')


    @error('surname')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="surname" class="form-label">surname</label>
        <input type="text" class="form-control" id="surname" aria-describedby="surname" name="surname" value="{{ old('surname', $currentMusician->surname)}}">

    </div>

    @error('birth_date')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="birth_date" class="form-label">date_birth</label>
        <input type="date" class="form-control" id="birth_date" aria-describedby="date_birth" name="birth_date" value="{{ old('birth_date', $currentMusician->birth_date)}}">
    </div>

    @error('address')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="address" class="form-label">address</label>
        <input type="text" class="form-control" id="address" aria-describedby="address" name="address" value="{{ old('address', $currentMusician->address)}}">
    </div>

    @error('num_phone')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="num_phone" class="form-label">num_phone</label>
        <input type="text" class="form-control" id="num_phone" aria-describedby="num_phone" name="num_phone" value="{{ old('num_phone', $currentMusician->num_phone)}}">
    </div>

    @error('image')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input type="file" class="form-control" id="image" aria-describedby="image" name="image" placeholder="Upload your image" value="{{ old('image', '')}}">

    </div>

    @error('bio')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="bio" class="bio">bio</label>
        <input type="text" class="form-control" id="bio" value="{{ old('bio', $currentMusician->bio)}}" name="bio">
    </div>

    @error('cv')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="cv" class="cv">cv</label>
        <input type="text" class="form-control" id="cv" value="{{ old('cv', $currentMusician->cv)}}" name="cv">
    </div>

    @error('price')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="price" class="price">price</label>
        <input type="text" class="form-control" id="price" value="{{ old('price', $currentMusician->price)}}" name="price">
    </div>

    @error('musical_genre')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="musical_genre" class="musical_genre">musical_genre</label>
        <input type="text" class="form-control" id="musical_genre" value="{{ old('musical_genre', $currentMusician->musical_genre)}}" name="musical_genre">
    </div>

    @error('musical_instruments')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div>
        <h2>Strumenti Musicale</h2>
        @foreach ($musical_instruments as $musical_instrument)
        <input type="checkbox" name="musical_instruments[]" class="form-check-input" id="musical_instruments" value="{{ $musical_instrument->id }}" @if( in_array($musical_instrument->id, old('musical_instruments', []))) checked @endif>
        <label for="tags" class="form-check-label me-3">
            {{ $musical_instrument->name }}
        </label>
        @endforeach
    </div>


    <div>
        <label for="sponsors" class="d-block">
            <h2>Sponsor</h2>
        </label>
        <select class='form-select' name="sponsors" id="sponsors">
            <option value="no sponsor">No sponsor</option>
            @foreach ($sponsors as $sponsor)
            <option value="{{ $sponsor->id }}" {{ old(`id`, $sponsor->id) == $sponsor->id ? 'selected' : '' }}>
                {{ $sponsor->sponsor_type }}
            </option>
            @endforeach
        </select>

    </div>



    <button type="submit" class="btn btn-primary">Update</button>
</form>



@endsection