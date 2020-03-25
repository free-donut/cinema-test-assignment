<!-- Stored in resources/views/index.blade.php -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@extends('layouts.app')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')
    <h2>Расписание сеансов</h2>

        <div>


            @foreach ($showtimes as $date => $showtimes)
            <h3> {{ $date }} </h3>
                <dl class="row">

                @foreach ($showtimes as $showtime)
                    <dt class="col-sm-3">{{ $showtime->time }} : <a href="{{route('films.show', ['id' => $showtime->film->id])}}" class="card-link">{{ $showtime->film->name }}</a></dt>
                    <dd class="col-sm-9">
                        <a href="{{route('orders.create', ['showtime_id' => $showtime->id])}}" class="btn btn-primary" class="card-link">Купить билет</a>
                    </dd>
                @endforeach
                </dl>

            @endforeach

        </div>

@endsection
