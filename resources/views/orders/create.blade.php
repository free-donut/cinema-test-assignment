<!-- Stored in resources/views/main.blade.php -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@extends('layouts.app')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')
    

@if (isset($errors))
  @foreach ($errors as $message)
      <div class="alert alert-warning" role="alert">
        {{ $message }}
      </div>
  @endforeach
@endif


<h2>Схема зала</h2>


{{ Form::open(['url' => route('orders.store')]) }}
    @foreach ($tickets as $row => $seats)
      <div class="form-row align-items-center">
        <span class="badge badge-secondary">{{ $row }} ряд </span>
        @foreach ($seats as $seat => $sold)
          <div class="col-auto" class="custom-control custom-checkbox" >
            <div class="custom-control custom-checkbox">
              @if ($sold)
                {{ Form::checkbox("checkbox[]", "$showtime_id-$row-$seat", true, ['class' => "custom-control-input", 'id' => "$row$seat", 'disabled']) }}
              @else
                {{ Form::checkbox("checkbox[]", "$showtime_id-$row-$seat", false, ['class' => "custom-control-input", 'id' => "$row$seat"]) }}
              @endif
              {{ Form::label("$row$seat", $seat, ['class' => 'custom-control-label']) }}
            </div>
          </div>
        @endforeach
      </div>
    @endforeach

    <div class="col-sm-3 my-1">
      {{Form::text('name', 'Имя', ['class' => 'form-control'])}}
    </div>
    <div class="col-sm-3 my-1">
      {{Form::text('phone', 'Телефон', ['class' => 'form-control'])}}
    </div>
    {{Form::hidden('showtime_id', $showtime_id)}}
     <div class="col-auto my-1">
      <button type="submit" class="btn btn-primary">Выбрать</button>
    </div>
{{ Form::close() }}

@endsection
