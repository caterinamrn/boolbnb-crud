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

            <div class="form-group">
              <label for="description">Descrizione appartamento</label>
              <input type="text" name="description" value="">
            </div>
            <div class="form-group">
              <label for="number_of_rooms">Numero di stanze</label>
              <input type="number" name="number_of_rooms" value="">
            </div>
            <div class="form-group">
              <label for="number_of_beds">Numero di letti</label>
              <input type="number" name="number_of_beds" value="">
            </div>
            <div class="form-group">
              <label for="number_of_bathrooms">Numero di bagni</label>
              <input type="number" name="number_of_bathrooms" value="">
            </div>
            <div class="form-group">
              <label for="square_meters">Metri quadri</label>
              <input type="number" name="square_meters" value="">
            </div>
            <div class="form-group">
              <label for="address">Via</label>
              <input type="text" name="address" value="">
            </div>
            <div class="form-group">
              <label for="city">Città</label>
              <input type="text" name="city" value="">
            </div>
            <div class="form-group">
              <label for="state">Paese</label>
              <input type="text" name="state" value="">
            </div>
            <div class="form-group">
              <label for="image">Immagine</label>
              <input type="file" name="image" value="">
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
