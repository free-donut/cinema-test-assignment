<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Showtime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $date = date('Y-m-d', time());
        $time = date('H:i', time());
        $filteredShowtimes = Showtime::where('date', $date)->where('time', '>=', $time)->get();
        return view('home', compact('date', 'filteredShowtimes'));
    }
}
