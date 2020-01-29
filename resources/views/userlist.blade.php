@extends('layouts.header')

@section('title', 'Felhasználók kezelése')

@section('size', '100%')

@section('content')
<main class="mdl-layout__content" style="padding-top:80px">
<div class="jumbotron" style="padding-top:10px;">
<table >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Név</th>
      <th scope="col">Email</th>
      <th scope="col">Létrehozva</th>
      <th scope="col">Módosítva</th>
      <th scope="col">Adminisztrátor?</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($users as $u)
    @if($u->inactive)
      <tr style="background:gray;">
    @else
      <tr>
    @endif
        <td style="font-size:15px">{{ $u->id }}</td>
        <td style="font-size:15px">{{ $u->name }}</td>
        <td style="font-size:15px">{{ $u->email }}</td>
        <td style="font-size:15px">{{ $u->user_created_at }}</td>
        <td style="font-size:15px">{{ $u->user_updated_at }}</td>
        @if($u->superuser)
        <td><i class="fas fa-check"></i></td>
        @else
        <td><i class="fas fa-times"></i></td>
        @endif
        <td style="width:50px"><a href="{{ route('tracklist', ['user' => $u]) }}"><button type="submit" style="width:100%; font-size:15px;" >Track-ek</button></a></td>
        @if($u->superuser)
        <td style="width:50px"><a href="{{ route('deleteverify', ['user' => $u]) }}"><button type="submit" style="width:100%; font-size:15px;" disabled>Töröl</button></a></td>
        @else
        <td style="width:50px"><a href="{{ route('deleteverify', ['user' => $u]) }}"><button type="submit" style="width:100%; font-size:15px;" >Töröl</button></a></td>
        @endif
        <td style="width:50px"><a href="{{ route('modifyusershow', ['user' => $u]) }}"><button type="submit" style="width:100%; font-size:15px;"  >Módosít</button></a></td>
      </tr>
   @endforeach
  </tbody>
</table>

<div class="buttoncontainer ">
        <a href="http://adampapp.ddns.net/projektmunka/reg"><button type="submit"  >Új felhasználó létrehozása</button></a>
</div>
</div>
</main>
@endsection