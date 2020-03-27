<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Ticket;
use App\Showtime;

class OrderController extends Controller
{

    public function create(Request $request)
    {
        if (!Auth::user()) {
            $request->session()->flash('warning', 'Для покупки билетов зайдите в личный кабиент');
            return redirect()
                ->route('login');
        }

        if (!$request->showtime_id) {
            abort(404);
        }

        $showtime = Showtime::findOrFail($request->showtime_id);
        session(['showtime_id' => $showtime->id]);

        $soldTickets = $showtime->tickets()->select('row', 'seat')->get()->toArray();
        $seatsCount = 12;
        $seats = array_fill(1, $seatsCount, false);
        $rowsCount = 8;
        $tickets = array_fill(1, $rowsCount, $seats);

        foreach ($soldTickets as $soldTicket) {
            $tickets[$soldTicket['row']][$soldTicket['seat']] = true;
        }

        return view('orders.create', compact('tickets'));
    }

    public function store(Request $request)
    {
        $showtime_id = $request->session()->get('showtime_id');
        $request->session()->forget('showtime_id');

        if (!empty($request->checkbox)) {
            $checkboxes = $request->checkbox;
        } else {
            $request->session()->flash('warning', 'Выберите билеты!');
            return redirect()->route('orders.create', compact('showtime_id'));
        }
               
        $order = new Order();
        $order->user_id = Auth::id();
        $order->save();
        $order_id = $order->id;

        $price = 200;
        $params = array_map(function ($checkbox) use ($price, $showtime_id, $order_id) {
            [$row, $seat] = explode('-', $checkbox);
            return compact('row', 'seat', 'price', 'showtime_id', 'order_id');
        }, $checkboxes);

        Ticket::insert($params);
        $amount = $order->tickets()->sum('price');
        $count = $order->tickets()->count();
        $request->session()->flash('status', "Билеты забронированы! Количество билетов: $count. Сумма заказа : $amount");
        return redirect()
            ->route('homePage');
    }
}
