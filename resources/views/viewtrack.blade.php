@extends('layouts.header')

@section('title', 'Track megtekintése')

@section('size', '100%')

@section('content')
<h2>Tartalom: {{ $trackname }}</h2>
<textarea>{{ $track }}</textarea>
@endsection