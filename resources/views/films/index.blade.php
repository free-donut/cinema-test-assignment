<!-- Stored in resources/views/index.blade.php -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@extends('layouts.app')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')
    <p>List of films</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Название фильма</th>
                <th scope="col">Жанр</th>
                <th scope="col">Описание</th>
            </tr>
        </thead>
        <tbody>
        <div class="list-group">
            @foreach ($films as $film)
            <tr>
                <td><a href="{{route('films.show', ['id' => $film->id])}}" class="card-link">{{ $film->name }}</a></td>
                <td>{{ $film->genre }}</td>
                <td>{{ $film->description }}</td>
            </tr>
            @endforeach
        </div>
        </tbody>
    </table>
    {{ $films->links() }}

@endsection
