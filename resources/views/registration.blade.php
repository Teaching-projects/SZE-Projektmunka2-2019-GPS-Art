@extends('layouts.header')

@section('title', 'Új felhasználó létrehozása')

@section('size', '35%')

@section('content')
<h2>Új felhasználó létrehozása</h2>
<form method="post" action="http://adampapp.ddns.net/projektmunka/reg/store">
{{ csrf_field() }}
  <div class="form-group">
    <label for="name">Név:</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="email">Email cím:</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="password">Jelszó:</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="form-group">
    <label for="szabit_kiirhat">Jogok:</label>
    <fieldset>
      <p/><input type="checkbox" name="inactive" value="inactive" id="inactive">
       <label for="inactive">Inaktív felhasználó</label><p/>
       <p/><input type="checkbox" name="superuser" value="superuser" id="superuser">
       <label for="superuser">Adminisztrátori jogok</label><p/>
    </fieldset>
  </div>
<div class="form-group">
  <button style="cursor:pointer" type="submit" >Létrehoz</button>
</div>
</form>
@endsection