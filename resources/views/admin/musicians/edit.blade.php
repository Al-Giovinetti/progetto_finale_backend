@extends('layouts.app')

@section('content')


<form action="{{route('admin.musicians.update', $loggedMusician)}}" method="POST">
    @csrf
    @method ('PUT')


    @error('surname')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="surname" class="form-label">surname</label>
        <input type="text" class="form-control" id="surname" aria-describedby="surname" name="surname"  value="{{ old('surname', $currentMusician->surname)}}">

    </div>

    @error('birth_date')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="birth_date" class="form-label">date_birth</label>
        <input type="date" class="form-control" id="birth_date" aria-describedby="date_birth" name="birth_date"  value="{{ old('birth_date', $currentMusician->birth_date)}}">
    </div>

    @error('address')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="address" class="form-label">address</label>
        <input type="text" class="form-control" id="address" aria-describedby="address" name="address" value="{{ old('address', $currentMusician->address)}}" >
    </div>

    @error('num_phone')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="num_phone" class="form-label">num_phone</label>
        <input type="text" class="form-control" id="num_phone" aria-describedby="num_phone"name="num_phone" value="{{ old('num_phone', $currentMusician->num_phone)}}">
    </div>

    @error('image')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input type="text" class="form-control" id="image" aria-describedby="image" name="image" value="{{ old('image', $currentMusician->image)}}">

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


    <button type="submit" class="btn btn-primary">Update</button>
    <form action="{{ route('admin.musicians.destroy', $currentMusician) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    

  </form>

@endsection