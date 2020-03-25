
@extends('layouts.app')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')
<div class="container">
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
</div>
@endsection
