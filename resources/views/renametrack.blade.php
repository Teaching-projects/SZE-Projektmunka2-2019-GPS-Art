@extends('layouts.header')

@section('title', 'Track átnevezése')

@section('size', '35%')

@section('content')
<h2>Track átnevezése</h2>
    <form method="post" action="/projektmunka/renametrack">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $track['trackid'] }}" readonly="readonly">
        </div>

        <div class="form-group">
            <label for="name">Név:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $track['trackname'] }}">
        </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" >Módosít</button>
        </div>
    </form>
@endsection