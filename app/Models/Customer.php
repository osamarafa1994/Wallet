<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
        'name','phone','personal_id',
    ];


    public function wallet()
    {
        return $this->hasOne('App\Models\Wallet');
    }



    public function processes()
    {
        return $this->hasOne('App\Models\CustomerProcess');
    }
}
