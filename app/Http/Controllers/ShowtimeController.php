<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Showtime;
use Illuminate\Support\Facades\DB;

class ShowtimeController extends Controller
{
    public function index()
    {
        $dates = Showtime::pluck('date')->unique()->toArray();
        
        $fullShowtimes = [];
        foreach ($dates as $date) {
            $fullShowtimes[$date] = Showtime::where('date', $date)->orderBy('time')->get();
        }
        $date = date('Y-m-d', time());
        $time = date('H:i', time());
        $filteredShowtimes = Showtime::where('date', $date)->where('time', '>=', $time)->get();
        return view('showtimes.index', compact('dates', 'fullShowtimes'));
    }
}
