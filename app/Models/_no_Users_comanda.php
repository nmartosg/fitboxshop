<?php


namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Users_comanda extends Model
{
    use Traits\HasCompositePrimaryKey;
    //
    protected $fillable = ['fid_user', 'fid_Comanda','data_Comanda'];
    public $timestamps = false;
    protected $primaryKey = array('fid_user','fid_Comanda');
    protected $table ='users_comandas';
}
