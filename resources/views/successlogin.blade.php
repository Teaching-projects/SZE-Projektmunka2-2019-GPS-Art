@extends('layouts.header')

@section('title', 'Főoldal')

@section('size', '100%')

@section('content')
<p>Kiemelt szponzorunk a: </p>
<div>
  <img height="100px" src="http://adampapp.ddns.net/projektmunka/css/placeholder.svg" alt="" style="max-height:100%; max-width:100%;"/>
</div>

<div class="card" style="background-color:rgba(100,100,100,0.1)"> 
<h2 style="text-align: center">Üdvözöljük, {{ Auth::user()->name}}!</h2>
  <p style="height: 50px"></p>
  <h3>Általános információ</h3>
  <p> A felületen feltöltheti és szinkronizálhatja saját futási track-jeit, létrehozhat útvonal figurákat, és lehetősége van módosítani saját fiókját, és adatait is.</p>
</div>
@endsection