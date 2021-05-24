<?php


namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Producte extends Authenticatable {
    protected $fillable = ['nom','tipos','descripcion','precio','img','productoCesta','comprado'];
    public $timestamps = false;
}
