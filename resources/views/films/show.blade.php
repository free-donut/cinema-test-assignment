@extends('layouts.app')

@section('title', 'Page Title')

@section('navbar')
  @parent
@endsection

@section('content')
<div class="container">
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
</div>
@endsection
