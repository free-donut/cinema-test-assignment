@extends('layouts.app')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')
<div class="container">

@if (isset($errors))
  @foreach ($errors as $message)
      <div class="alert alert-warning" role="alert">
        {{ $message }}
      </div>
  @endforeach
@endif

@if (Session::has('warning'))
  <div class="row justify-content-center">
    <div class="alert alert-warning" role="alert">
      {{ session('warning') }}
    </div>
  </div>
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
                {{ Form::checkbox("checkbox[]", "$row-$seat", true, ['class' => "custom-control-input", 'id' => "$row$seat", 'disabled']) }}
              @else
                {{ Form::checkbox("checkbox[]", "$row-$seat", false, ['class' => "custom-control-input", 'id' => "$row$seat"]) }}
              @endif
              {{ Form::label("$row$seat", $seat, ['class' => 'custom-control-label']) }}
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
     <div class="col-auto my-1">
      {{ Form::submit('Купи нас!', ['class' => 'btn btn-primary']) }}
    </div>
{{ Form::close() }}
</div>
@endsection
