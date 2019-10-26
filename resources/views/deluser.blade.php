@extends('layouts.header')

@section('title', 'Felhasználó törlése')

@section('size', '35%')

@section('content')
<h2>Felhasználó törlése</h2>
<form method="post" action="/projektmunka/delete">
{{ csrf_field() }}
    <div class="form-group">
        <label for="id">ID:</label>
        <input type="text" class="form-control" id="id" name="id" value="{{ $user['id'] }}" readonly="readonly">
    </div>
    <div class="form-group">
        <label for="name">Név:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}" readonly="readonly">
    </div>
    <div class="form-group">
        <label for="email">Email cím:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}" readonly="readonly">
    </div>
    <div class="form-group">
        <label for="whattodo">Mit szeretne tenni a felhasználóval?</label>
        <select class="mdb-select md-form" name="whattodo">
            <option value="" disabled selected>Válassza ki mit szeretne tenni a userrel</option>
            <option value="inact">Inaktiválás</option>
            <option value="permdel">Végleges törlés</option> 
        </select>
    </div>    
    <div class="form-group">
        <button style="cursor:pointer" type="submit" >Véglegesít</button>
    </div>  
</form>
@endsection