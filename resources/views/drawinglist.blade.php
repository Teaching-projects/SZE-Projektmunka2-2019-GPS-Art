@extends('layouts.header')

@section('title', 'Leadott figurák bírálása')

@section('size', '100%')

@section('content')
<table >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Figura megnevezése</th>
      <th scope="col">Felhasználó neve</th>
      <th scope="col">Feltöltött kép</th>
      <th scope="col">Feltöltve</th>
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
        <td style="font-size:15px">{{ $d->name }}</td>
        <td style="font-size:15px">{{ $d->drawing_file_name }}</td>
        <td style="font-size:15px">{{ $d->drawing_created_at }}</td>

        @if(Auth::user()->id == 1)
        <td style="width:50px"><a href="{{ route('renamedrawing', ['drawings' => $d]) }}"><button type="submit" style="width:100%; font-size:15px;" >Átnevez</button></a></td>			
        <td style="width:50px"><a href="{{ route('deletedrawing', ['drawings' => $d]) }}"><button class="btn-danger" type="submit" style="width:100%; font-size:15px;">Töröl</button></a></td>
        <td style="width:50px"><a href=""><button type="submit" style="width:100%; font-size:15px;"  >Versenyhez rendel</button></a></td>
        @endif
        <td style="width:50px"><a href="{{ route('viewdrawing', ['drawings' => $d]) }}"><button type="submit" style="width:100%; font-size:15px;" >Megtekint</button></a></td>

      </tr>
   @endforeach
  </tbody>
</table>

@endsection