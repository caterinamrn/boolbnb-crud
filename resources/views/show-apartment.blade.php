@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>{{$apart -> description}}</h1>
          <div class="">
            <a href="{{route('apart.edit',$apart -> id)}}">Edit</a>
            <a href="{{route('apart.delete', $apart -> id)}}">X</a>
          </div>
        </div>
        <div class="card-body">
          <!-- <img src="" alt=""> -->
          <h2>Informazioni relative all'appartamento</h2>
          <ul>

              <li>Numero di letti: {{ $apart -> number_of_beds }}</li>
              <li>Numero di camere: {{ $apart -> number_of_rooms }}</li>
              <li>Numero di bagni: {{ $apart -> number_of_bathrooms }}</li>
              <li>Grandezza : {{ $apart -> square_meters }} m²</li>
              <li>Indirizzo: via <span style="text-transform: capitalize;">{{$apart -> address}}</span>, <span style="text-transform: capitalize;">{{$apart -> city}}</span>, <span style="text-transform: capitalize;">{{$apart -> state}}</span></li>
          </ul>
          <h2>Servizi</h2>
          <ul>
            @foreach ($services as $serv)
              <li>{{ $serv -> service }}</li>
            @endforeach
          </ul>
        </div>
      </div>
      <a href="#">Statistiche</a>
      <a href="#">Sponsorizza l'appartamento</a>

    </div>
  </div>
</div>



@endsection
