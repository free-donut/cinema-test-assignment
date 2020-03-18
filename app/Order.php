<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Белый список. Здесь описываются допустимые поля.
    protected $fillable = ['amount'];

    public function tickets()
    {
        // У заказа меного билетов
        // hasMany определяется у модели, имеющей внешние ключи в других таблицах
        return $this->hasMany('App\Ticket');
    }

    public function user()
    {
        // У одного заказа один заказчик
        // belongsTo определяется у модели содержащей внешний ключ
        return $this->belongsTo('App\User');
    }

    /*public function showtime()
    {
        // У заказа один сеанс
        // belongsTo определяется у модели содержащей внешний ключ
        return $this->belongsTo('App\Showtime');
    }*/
}
