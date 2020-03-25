@extends('layouts.app')

@section('title', 'Page Title')

@section('navbar')
  @parent
@endsection

@section('content')
<div class="container">
  <p>Добро пожаловать в наш кинотеатр на краю Вселенной!</p>
  <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
    <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
      style="border:0" allowfullscreen></iframe>
  </div>
 </div>
@endsection
