@extends('layouts.app')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')
<div class="container">
    <h2>Расписание сеансов</h2>

        <div>
            @foreach ($fullShowtimes as $date => $dayShowtimes)
            <h3> {{ $date }} </h3>
                <dl class="row">

                @foreach ($dayShowtimes as $showtime)
                    <dt class="col-sm-3">{{ $showtime->time }} : <a href="{{route('films.show', ['id' => $showtime->film->id])}}" class="card-link">{{ $showtime->film->name }}</a></dt>
                    <dd class="col-sm-9">
                        <a href="{{route('orders.create', ['showtime_id' => $showtime->id])}}" class="btn btn-primary" class="card-link">Купить билет</a>
                    </dd>
                @endforeach
                </dl>
            @endforeach
        </div>
</div>
@endsection
