<?php

namespace App;

use App\Notifacations\OwnerPasswordReset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
    use Notifiable;
    

     /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function OwnerPasswordReset($token)
    {
        dd($token);
        $this->notify(new OwnerPasswordReset($token));
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

