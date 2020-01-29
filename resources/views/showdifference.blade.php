@extends('layouts.header')

@section('title', 'Leadott figurák bírálása')

@section('size', '100%')

@section('content')
<main class="mdl-layout__content" style="padding-top:80px">
<div class="jumbotron" style="padding-top:100px;">
  <h1 class="display-4">Leadott figurák hasonlítása</h1>
  <p class="lead">Megnézheted, hogy a saját figuráid milyen mértékben egyeznek a többivel.</p>
  <hr class="my-4">

<table >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Figura megnevezése</th>
      <th scope="col">Feltöltött kép</th>
      <th scope="col">Feltöltve</th>
      <th scope="col">Eredeti</th>
      <th scope="col">Hasonlósági érték</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   @foreach ($drawings as $d)
      <tr>
        <td style="font-size:15px">{{ $d->drawingid }}</td>
        <td style="font-size:15px">{{ $d->drawingname }}</td>
        <td style="font-size:15px">{{ $d->drawing_file_name }}</td>
        <td style="font-size:15px">{{ $d->drawing_created_at }}</td>
       
        <td style="font-size:15px"><img src="{{ $d->drawing_file_name }}"></td>
        <td style="font-size:15px">*%</td>
        <td>{{$output}}</td>
      </tr>
   @endforeach
  </tbody>
</table>
</div>
<button onclick="szar()">nagylofasz</button>
@endsection
</main>
