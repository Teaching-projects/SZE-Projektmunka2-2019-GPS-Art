@extends('layouts.header')

@section('title', 'Track feltöltése')

@section('size', '75%')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css">

<main class="mdl-layout__content" style="padding-top:80px">

<div class="jumbotron" style="padding-top:100px;">
  <h1 class="display-4">Track fájl feltöltése</h1>
  <p class="lead">Válaszd ki azt a tracket, amelyiket fel szeretnéd tölteni!</p>
  <hr class="my-4">

<div class="card" >
  <form method="post" action="/projektmunka/uploadtrack" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name">Track neve:</label>
        <input type="text" class="form-control" id="name" name="name" required="required">
    </div>
    <div class="file-upload form-group">
                <label for="upload" class="file-upload__label">Rajz kiválasztása</label>
                <input id="upload" class="file-upload__input form-control"  id="track" name="track" accept=".gpx" required="required" type='file'>
            </div>
 
    <div class="form-group">
      <button style="cursor:pointer" type="submit" class="btn btn-success">Feltölt</button>
    </div>
  </form>
  </div>
  </div>
</main>
@endsection