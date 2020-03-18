<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    // Белый список. Здесь описываются допустимые поля.
    protected $fillable = ['date', 'time'];

    public function film()
    {
        // Один сеанс принадлежит одному фильму
        // belongsTo определяется у модели содержащей внешний ключ
        return $this->belongsTo('App\Film');
    }

    // Во множественном числе потому что это коллекция
    public function tickets()
    {
        // У каждого сеанса много билетов
        // hasMany определяется у модели, имеющей внешние ключи в других таблицах
        return $this->hasMany('App\Ticket');
    }
    // Во множественном числе потому что это коллекция
    /*public function orders()
    {
        // У каждого сеанса много заказов
        // hasMany определяется у модели, имеющей внешние ключи в других таблицах
        return $this->hasMany('App\Order');
    }*/
}
