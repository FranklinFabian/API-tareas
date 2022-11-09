<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tarea extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'image' ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($tarea) {
            $tarea->user_id = Auth::id();
        });
    }
}
