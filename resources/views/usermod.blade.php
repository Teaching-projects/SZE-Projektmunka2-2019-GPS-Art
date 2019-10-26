@extends('layouts.header')

@section('title', 'Felhasználói adatok módosítása')

@section('size', '35%')

@section('content')
<h2>Új felhasználó létrehozása</h2>
    <form method="post" action="/projektmunka/modify/mod">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $user['id'] }}" readonly="readonly">
        </div>

        <div class="form-group">
            <label for="name">Név:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
        </div>
 
        <div class="form-group">
            <label for="email">Email cím:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
        </div>
 
        <div class="form-group">
            <label for="password">Új jelszó:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        @if(!isset($my))
        <div class="form-group">
          <label for="szabit_kiirhat">Jogok:</label>
            <fieldset>

              <p/> 
              @if(Auth::user()->id != $user['id'])
              @if($user['superuser'])
              <input type="checkbox" name="superuser" value="superuser" id="superuser" checked>
              @else
              <input type="checkbox" name="superuser" value="superuser" id="superuser">
              @endif
              <label for="superuser">Adminisztrátori jogok</label><p/>
              @if($user['inactive'])
              <input type="checkbox" name="inactive" value="inactive" id="inactive" checked>
              @else
              <input type="checkbox" name="inactive" value="inactive" id="inactive">
              @endif
              <label for="inactive">Inaktív felhasználó</label><p/>
              @endif
            </fieldset>
        </div>
        @else
        <input type="hidden" name="my" value="true" />
        @endif
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" >Módosít</button>
        </div>
@endsection