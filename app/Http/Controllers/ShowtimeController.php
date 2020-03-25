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
        $showtimes = [];
        foreach ($dates as $date) {
            $showtimes[$date] = Showtime::where('date', $date)->orderBy('time')->get();
        }
       return view('showtimes.index', compact('dates', 'showtimes'));
    }
}
