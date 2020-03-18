<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    // Белый список. Здесь описываются допустимые поля.
    protected $fillable = ['name', 'genre', 'duration', 'year', 'director', 'description'];

    // Во множественном числе потому что это коллекция
    public function showtimes()
    {
        // У каждого фильма много сеансов
        // hasMany определяется у модели, имеющей внешние ключи в других таблицах
        return $this->hasMany('App\Showtime');
    }
}
