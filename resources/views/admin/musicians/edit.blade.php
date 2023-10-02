@extends('layouts.app')

@section('content')



<nav class="navbar bg-body-tertiary fixed-top d-md-none">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Boosician</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="nav flex-column">
              <li class="nav-item">
                  <h1 class="h2">Boosician</h1>
  
                  <a class="nav-link {{ Route::current()->getName() == 'admin.home' ? 'active' : '' }}" href="{{ route('admin.home') }}">
                      Dashboard
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Route::current()->getName() == 'admin.statistics.index' ? 'active' : '' }}" href="{{ route('admin.statistics.index') }}">
                      Statistiche
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Route::current()->getName() == 'admin.messages.index' ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
                      Messages
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Route::current()->getName() == 'admin.reviews.index' ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}">
                      Reviews
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.createSponsor', $user->musician) }}">
                      Sponsor
                  </a>
              </li>
              @guest
              @else
              <li class="nav-item dropdown">
                  <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </li>
              @endguest
          </ul>
        </div>
      </div>
    </div>
  </nav>





        <div class="container-fluid">
            <div class="row mt-5">
                <!-- Barra laterale -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block d-none d-md-block ">
                        <div class="position-sticky">
                            <div class="p-4 fs-5">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <h1 class="h2">Boosician</h1>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::current()->getName() == 'admin.home' ? 'active' : '' }}" href="{{ route('admin.home') }}">
                                            Dashboard
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::current()->getName() == 'admin.statistics.index' ? 'active' : '' }}" href="{{ route('admin.statistics.index') }}">
                                            Statistiche
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::current()->getName() == 'admin.messages.index' ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
                                            Messages
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::current()->getName() == 'admin.reviews.index' ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}">
                                            Reviews
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.createSponsor', $user->musician) }}">
                                            Sponsor
                                        </a>
                                    </li>
                                    @guest
                                    @else
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>



<div class="col-md-8 col-lg-9 justify-content-center mt-5">
    <div class="card-body">
        <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Musician</div>

                <div class="card-body">
                    <form action="{{ route('admin.musicians.update', $loggedMusician) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Surname -->
                        <div class="mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname', $currentMusician->surname) }}">
                            @error('surname')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Date of Birth -->
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $currentMusician->birth_date) }}">
                            @error('birth_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $currentMusician->address) }}">
                            @error('address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="num_phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="num_phone" name="num_phone" value="{{ old('num_phone', $currentMusician->num_phone) }}">
                            @error('num_phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Profile Image -->
                        <div class="mb-3">
                            <p>Select how to upload the profile image:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="image-profile" id="ProfileImgFile" checked>
                                <label class="form-check-label" for="ProfileImgFile">Upload File</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="image-profile" id="ProfileImgLink">
                                <label class="form-check-label" for="ProfileImgLink">Image Link</label>
                            </div>
                            <input type="file" class="form-control mt-3" id="imageFile" name="image" accept="image/*">
                            <input type="text" class="form-control mt-3 d-none" id="imageLink" name="image" placeholder="Image Link">
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bio -->
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control" id="bio" name="bio">{{ old('bio', $currentMusician->bio) }}</textarea>
                            @error('bio')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- CV -->
                        <div class="mb-3">
                            <label for="cv" class="form-label">CV (PDF)</label>
                            <input type="file" class="form-control" id="cv" name="cv" accept=".pdf">
                            @error('cv')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $currentMusician->price) }}">
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Musical Genre -->
                        <div class="mb-3">
                            <label for="musical_genre" class="form-label">Musical Genre</label>
                            <input type="text" class="form-control" id="musical_genre" name="musical_genre" value="{{ old('musical_genre', $currentMusician->musical_genre) }}">
                            @error('musical_genre')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Musical Instruments -->
                        <div class="mb-3">
                            <h2>Musical Instruments</h2>
                            @foreach ($musical_instruments as $musical_instrument)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="musical_instruments[]" id="musical_instrument_{{ $musical_instrument->id }}" value="{{ $musical_instrument->id }}" @if(in_array($musical_instrument->id, old('musical_instruments', []))) checked @endif>
                                <label class="form-check-label me-3" for="musical_instrument_{{ $musical_instrument->id }}">
                                    {{ $musical_instrument->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const RadioFile = document.getElementById('ProfileImgFile');
    const RadioLink = document.getElementById('ProfileImgLink');

    const inputFile = document.getElementById('imageFile');
    const inputLink = document.getElementById('imageLink');

    RadioFile.addEventListener('click', function() {
        inputFile.classList.remove('d-none');
        inputLink.className = 'form-control d-none'
    })

    RadioLink.addEventListener('click', function() {
        inputLink.classList.remove('d-none');
        inputFile.className = 'form-control d-none'
    })
</script>

@endsection



<style lang="scss">
    
    aside {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: sticky;
        top: 0;
    }

    .top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1.4rem;
    }

    .logo img {
        width: 2rem;
        height: 2rem;
    }

    .logo {
        display: flex;
        gap: 2rem;
    }

    .close {
        display: none;
    }

    .sidebar {
        width: 200px;
        display: flex;
        flex-direction: column;
        position: relative;
        top: 3rem;
    }


    a {
        display: flex;
        margin-left: 2rem;
        padding: 0 20px 0 0;
        gap: 1rem;
        align-items: center;
        position: relative;
        height: 3.7rem;
        transition: all 300ms ease;

        /* h3{
                font-size: 1rem;
            } */
    }

</style>