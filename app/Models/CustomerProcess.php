<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerProcess extends Model
{
    //
    protected $fillable = [
        'customer_id','network_type','to_phone','value','suspend',
    ];


    public function customer()
    {
        return $this->belongsTo('App\User');
    }


}
