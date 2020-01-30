@extends('layouts.header')

@section('title', 'Leadott figurák bírálása')

@section('size', '100%')

@section('content')
<main class="mdl-layout__content" style="padding-top:80px">
<div class="jumbotron" style="padding-top:100px;">
  <h1 class="display-4">Leadott figurák hasonlítása</h1>
  <p class="lead">Megnézheted, hogy a saját figuráid milyen mértékben egyeznek a többivel.</p>
  <hr class="my-4">
<h3 style="background-color:#a6a7a9;color:white;padding:10px">A rajz, ami a legjobban hasonlít egy alakzatra: {{$best}}  <br>Készítette:{{$bestOwner}}</h3>
<table >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Figura megnevezése</th>
      <th scope="col">Feltöltve</th>
      <th scope="col">Eltérési érték</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   @foreach ($drawings as $d)
      <tr>
        <td style="font-size:15px">{{ $d->drawingid }}</td>
        <td style="font-size:15px">{{ $d->drawingname }}</td>
        <td style="font-size:15px">{{ $d->drawing_created_at }}</td>
       <td style="font-size:15px">A rajz ennyiben tér el egy azonos, szabályos alakzattól: {{ $d->similarity }}</td>
        <td style="font-size:15px"><img src={{ $d->drawing_file_name }}></td>
        <td style="font-size:15px">Detektalt alakzat: {{ $d->shape }}</td>
      </tr>
   @endforeach
  </tbody>
</table>
</div>
@endsection
</main>
