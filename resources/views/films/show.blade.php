<!-- Stored in resources/views/index.blade.php -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@extends('layouts.app')

@section('title', 'Page Title')

@section('navbar')
  @parent
@endsection

@section('content')
  @if (isset($error))
    <div class="alert alert-warning" role="alert">
      {{ $error }}
    </div>
  @else

      <h3>{{ $film->name }}</h3>
      <p>Информация о фильме</p>
    <dl class="row">
      <dt class="col-sm-3">Жанр</dt>
      <dd class="col-sm-9">{{ $film->genre }}</dd>

      <dt class="col-sm-3">Длительность</dt>
      <dd class="col-sm-9">{{ $film->duration }} минут</dd>

      <dt class="col-sm-3">Год выпуска</dt>
      <dd class="col-sm-9">{{ $film->year }} год</dd>

      <dt class="col-sm-3">Режиссер</dt>
      <dd class="col-sm-9">{{ $film->director }}</dd>

      <dt class="col-sm-3 text-truncate">Описание</dt>
      <dd class="col-sm-9">{{ $film->description }}</dd>
    </dl>
  @endif
@endsection
