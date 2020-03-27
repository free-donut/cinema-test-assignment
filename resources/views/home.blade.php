
@extends('layouts.app')

@section('content')
<div class="container">
    <p>Добро пожаловать в наш кинотеатр на краю Вселенной!</p>
    <p>Расписание сеансов на сегодня</p>

        <div>
            <h4> {{ $date }} </h4>
                <dl class="row">
                @foreach ($filteredShowtimes as $showtime)
                    <dt class="col-sm-3">{{ $showtime->time }} : <a href="{{route('films.show', ['id' => $showtime->film->id])}}" class="card-link">{{ $showtime->film->name }}</a></dt>
                    <dd class="col-sm-9">
                        <a href="{{route('orders.create', ['showtime_id' => $showtime->id])}}" class="btn btn-primary" class="card-link">Купить билет</a>
                    </dd>
                @endforeach
                </dl>
        </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
