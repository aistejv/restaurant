<?php

namespace App;

use Countries;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'birth', 'email', 'password', 'password_confirmation','address','city','zip_code','country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders(){
    return $this->hasMany(Order::class);
  }

    public function isAdmin(){
      return $this->admin;
    }
}
