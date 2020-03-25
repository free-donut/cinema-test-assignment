<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Ticket;
use App\Showtime;

class OrderController extends Controller
{

    // Вывод формы
    private function getSeats($nbSeat)
    {
        $seats = range(1, $nbSeat);
        $result = [];
        foreach ($seats as $seat) {
            $result[$seat] = false;
        }
        return $result;
    }

    private function getTickets($nbRow, $nbSeat, $soldTickets = [])
    {
        $rows = range(1, $nbRow);
        $seats = $this->getSeats($nbSeat);
        $tickets = [];
        foreach ($rows as $row) {
            $tickets[$row] = $seats;
        }
        foreach ($soldTickets as $soldTicket) {
            $tickets[$soldTicket['row']][$soldTicket['seat']] = true;
        }
        return $tickets;
    }

    public function create(Request $request)
    {
        $nbRow = 8;
        $nbSeat = 12;
        $showtime_id = $request->showtime_id;
        $soldTickets = Ticket::select('row', 'seat')->where('showtime_id', $showtime_id)->get()->toArray();
        $tickets = $this->getTickets($nbRow, $nbSeat, $soldTickets);
        $checkboxes = [];
        if (!empty($request->checkbox)) {
            $checkboxes = $request->checkbox;
        }
        session(['showtime_id' => $showtime_id]);
        /*var_dump($checkboxes);
        $selectedTickets = array_map(function($checkbox) {
            [$row, $seat] = explode('-', $checkbox);
            return ['row' => $row, 'seat' => $seat];
        }, $checkboxes);
        var_dump($selectedTickets);*/
        // Передаём в шаблон вновь созданный объект. Он нужен для вывода формы через Form::model
        $order = new Order();
        $order->showtime_id = $showtime_id;
        return view('orders.create', compact('order','tickets', 'showtime_id'));
    }

    public function store(Request $request)
    {
       if (!empty($request->checkbox)) {
            $checkboxes = $request->checkbox;
        }
        
        $order = new Order();
        $order->amount = '1000';
        $order->user_id = $request->user_id ?? 1;
        $order->save();


        $showtime_id = $request->session()->get('showtime_id');
        $showtime = Showtime::find($showtime_id);

        $selectedTickets = array_map(function($checkbox) {
            [$showtime_id, $row, $seat] = explode('-', $checkbox);
            return ['row' => $row, 'seat' => $seat, 'price' => '100'];
        }, $checkboxes);

        foreach ($selectedTickets as $params) {
            $ticket = $showtime->tickets()->make($params);
            $ticket->order()->associate($order);
            $ticket->save();
        }
        /*DB::table('tickets')->insert($selectedTickets);
        
        $tickets = $showtime->tickets()->make($selectedTickets);
        $tickets->save();
        $tickets->order()->associate($order);
        $tickets->save();
 
        $selectedTickets = array_map(function($checkbox) {
            [$showtime_id, $row, $seat] = explode('-', $checkbox);
            return ['row' => $row, 'seat' => $seat, 'price' => '100', 'showtime_id' => $showtime_id];
        }, $checkboxes);
        DB::table('tickets')->insert($selectedTickets);*/
        return redirect()
            ->route('showtimes.index');
    }
}
