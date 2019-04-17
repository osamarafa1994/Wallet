<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'role_id', 'name', 'email','phone','wallet_value','address','details','personal_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
	 
	public function role()
    {

        return $this->belongsTo('App\Role');

    }


    public function wallet()
	{
	  return $this->hasOne('App\Models\Wallet','customer_id');
	}

  



    public function isAdmin()
    {
      if (isset($this->role->name)) {
        if($this->role->name == "admin"){
          return true;
        }
      }

      return false;
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
