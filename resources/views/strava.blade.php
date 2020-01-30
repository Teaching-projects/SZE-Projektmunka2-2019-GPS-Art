@extends('layouts.header')

@section('title', 'Trackek kezelése')

@section('size', '100%')

@section('content')
@if($data['hasToken'])
<table >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Futás neve</th>
      <th scope="col">Felhasználó neve</th>
      <th scope="col">Track fájl neve</th>
      <th scope="col">Feltöltve</th>
      <th scope="col">Versenyhez hozzáadva?</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   @foreach ($tracks as $t)
      <tr>
        <td style="font-size:15px">{{ $t->trackid }}</td>
        <td style="font-size:15px">{{ $t->trackname }}</td>
        <td style="font-size:15px">{{ $t->name }}</td>
        <td style="font-size:15px">{{ $t->track_file_name }}</td>
        <td style="font-size:15px">{{ $t->track_created_at }}</td>
        <td><ul><li>verseny1</li><li>verseny2</li></ul></td>

        <td style="width:50px"><a href="{{ route('renametrack', ['track' => $t]) }}"><button type="submit" style="width:100%; font-size:15px;" >Átnevez</button></a></td>

        @if($t->id != Auth::user()->id)
        <td style="width:50px"><a href="{{ route('deletetrack', ['track' => $t]) }}"><button class="btn-danger" type="submit" style="width:100%; font-size:15px;" disabled>Töröl</button></a></td>
        @else
        <td style="width:50px"><a href="{{ route('deletetrack', ['track' => $t]) }}"><button class="btn-danger" type="submit" style="width:100%; font-size:15px;">Töröl</button></a></td>
        @endif

        <td style="width:50px"><a href="{{ route('viewtrack', ['track' => $t]) }}"><button type="submit" style="width:100%; font-size:15px;" >Megtekint</button></a></td>

        <td style="width:50px"><a href=""><button type="submit" style="width:100%; font-size:15px;"  >Versenyhez rendel</button></a></td>
      </tr>
   @endforeach
  </tbody>
</table>
@else
<a href="https://www.strava.com/oauth/authorize?client_id=43078&response_type=code&redirect_uri=http://localhost/projektmunka/exchange_token&approval_prompt=force&scope=read_all,activity:read_all">
    <button type="submit" style="display:table;margin:0 auto">Megbaszódás 2000</button>
</a>
@endif

@endsection