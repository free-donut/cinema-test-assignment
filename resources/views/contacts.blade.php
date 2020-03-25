<!-- Stored in resources/views/index.blade.php -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@extends('layouts.app')

@section('title', 'Page Title')

@section('navbar')
  @parent
@endsection

@section('content')
  <p>Добро пожаловать в наш кинотеатр на краю Вселенной!</p>
  <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
    <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
      style="border:0" allowfullscreen></iframe>
  </div>
@endsection
