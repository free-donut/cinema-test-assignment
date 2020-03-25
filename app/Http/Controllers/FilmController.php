<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::paginate(10);

        // Статьи передаются в шаблон
        // compact('articles') => [ 'articles' => $articles ]
        return view('films.index', compact('films'));
    }

    public function show($id)
    {
        $film = Film::find($id);

        // Статьи передаются в шаблон
        // compact('articles') => [ 'articles' => $articles ]
        return view('films.show', compact('film'));
    }
}
