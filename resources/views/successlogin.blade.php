@extends('layouts.header')

@section('title', 'Főoldal')

@section('size', '100%')

@section('content')
<p>Kiemelt szponzorunk a: </p>
<div>
  <img height="100px" src="http://adampapp.ddns.net/projektmunka/css/placeholder.svg" alt="" style="max-height:100%; max-width:100%;"/>
</div>

<div class="card w3-animate-opacity" style="background-color:rgba(100,100,100,0.1);"> 
<h2  style="text-align: center">Üdvözöljük, {{ Auth::user()->name}}!</h2>
  <p style="height: 50px"></p>
  <h3>Általános információ</h3>
  <p> A felületen feltöltheti és szinkronizálhatja saját futási track-jeit, létrehozhat útvonal figurákat, és lehetősége van módosítani saját fiókját, és adatait is.</p>
</div>
<div class="card-deck w3-animate-bottom">
  <div class="card">
    <div class="card-body">
       <a href="{{ route('drawfigure') }}"><h5 class="card-title">Futófigura rajzolása</h5><a>
      <p class="card-text">ditional content. This content is a little bit longer.</p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
       <a href="{{ route('uploadtrack') }}"><h5 class="card-title">Track fájl feltöltése</h5><a>
      <p class="card-text">ditional content. This content is a little bit longer.</p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
       <a href="{{ route('showdifference') }}"><h5 class="card-title">Figurák hasonlítása</h5><a>
      <p class="card-text">ditional content. This content is a little bit longer.</p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
       <a href="{{ route('synctrack') }}"><h5 class="card-title">Track fájl szinkronizálása (Strava)</h5><a>
      <p class="card-text">ditional content. This content is a little bit longer.</p>
    </div>
  </div>
</div>

@if(isset(Auth::user()->email) && Auth::user()->superuser)
<div class="card-deck ">
  <div class="card w3-animate-bottom" >
    <div class="card-body">
       <a href="{{ route('drawinglist') }}"><h5 class="card-title">Leadott futófigurák kezelése</h5><a>
      <p class="card-text">ditional content. This content is a little bit longer.</p>
    </div>
  </div>
  <div class="card w3-animate-bottom" >
    <div class="card-body">
       <a href="{{ route('competitionlist') }}"><h5 class="card-title">Kiírt versenyek kezelése</h5><a>
      <p class="card-text">ditional content. This content is a little bit longer.</p>
    </div>
  </div>
</div>
      @endif
@endsection