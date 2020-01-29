@extends('layouts.header')

@section('title', 'Rajz megtekintése')

@section('size', '100%')

@section('content')
<h2>Tartalom: {{ $drawingname }}</h2>
<img src="{{ $d->drawing_file_name }}"></a>
@endsection