@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        <div class="card-header">
          <h1>Aggiungi un annuncio</h1>
        </div>
        <div class="card-body">
          <form action="{{route('apart.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')


            <div class="card-body">
              <form action="{{route('apart.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group">
              <label for="description">Descrizione appartamento</label>
              <input id="description" type="text" class=" @error('description') is-invalid @enderror" name="description" value="" required autocomplete="description" autofocus >
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
              <label for="number_of_rooms">Numero di stanze</label>
              <input id="number_of_rooms" type="number" class=" @error('number_of_rooms') is-invalid @enderror" name="number_of_rooms" value="" required autocomplete="number_of_rooms" autofocus>
              @error('number_of_rooms')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="number_of_beds">Numero di letti</label>
              <input id="number_of_beds" type="number" class=" @error('number_of_beds') is-invalid @enderror" name="number_of_beds" value="" required autocomplete="number_of_beds" autofocus>
              @error('number_of_beds')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="number_of_bathrooms">Numero di bagni</label>
              <input id="number_of_bathrooms" type="number" class=" @error('number_of_bathrooms') is-invalid @enderror" name="number_of_bathrooms" value="" required autocomplete="number_of_bathrooms" autofocus>
              @error('number_of_bathrooms')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="square_meters">Metri quadri</label>
              <input id="square_meters" type="number" class=" @error('square_meters') is-invalid @enderror" name="square_meters" value="" required autocomplete="square_meters" autofocus>
              @error('square_meters')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="address">Via</label>
              <input id="address" type="text" class=" @error('address') is-invalid @enderror" name="address" value="" required autocomplete="address" autofocus>
              @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="city">Città</label>
              <input id="city" type="text" class=" @error('city') is-invalid @enderror" name="city" value="" required autocomplete="city" autofocus>
              @error('city')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="state">Paese</label>
              <input id="state" type="text" class=" @error('state') is-invalid @enderror" name="state" value="" required autocomplete="state" autofocus>
              @error('state')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="image">Select Image</label>
              <input type="file" class="form-control-file
                                  @error('image') is-invalid @enderror" id="image" name="image">

                                  @error('image')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror

            </div>

            <h3>Servizi aggiuntivi</h3>
            
            <div class="form-group">
              <label for="wifi">WIFI</label>
              <input type="checkbox" name="wifi" value="1">
            </div>
            <div class="form-group">
              <label for="parking">Parcheggio</label>
              <input type="checkbox" name="parking" value="2">
            </div>
            <div class="form-group">
              <label for="sauna">Sauna</label>
              <input type="checkbox" name="sauna" value="3">
            </div>
            <div class="form-group">
              <label for="sea_view">Vista mare</label>
              <input type="checkbox" name="sea_view" value="4">
            </div>
            <div class="form-group">
              <label for="pool">Piscina</label>
              <input type="checkbox" name="pool" value="5">
            </div>
            <div class="form-group">
              <label for="reception">Reception</label>
              <input type="checkbox" name="reception" value="6">
            </div>
            <button class="btn btn-primary" type="submit" name="button">Crea</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
