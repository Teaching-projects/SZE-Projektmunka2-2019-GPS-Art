@extends('layouts.header')

@section('title', 'Track feltöltése')

@section('size', '50%')

@section('content')
<h2>Track fájl feltöltése</h2>
  <form method="post" action="/projektmunka/uploadtrack" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name">Track neve:</label>
        <input type="text" class="form-control" id="name" name="name" required="required">
    </div>

    <div class="form-group">
      <label for="track">Fájl kiválasztása:</label>
        <input type="file" class="form-control" id="track" name="track" accept=".gpx" required="required">
    </div>
 
    <div class="form-group">
      <button style="cursor:pointer" type="submit" >Feltölt</button>
    </div>
  </form>
@endsection