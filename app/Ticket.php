<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    // Белый список. Здесь описываются допустимые поля.
    protected $fillable = ['row', 'seat', 'price'];

    public function showtime()
    {
        // У одного билета один сеанс
        // belongsTo определяется у модели содержащей внешний ключ
        return $this->belongsTo('App\Showtime');
    }

    public function order()
    {
        // У одного билета один заказ
        // belongsTo определяется у модели содержащей внешний ключ
        return $this->belongsTo('App\Order');
    }
}
