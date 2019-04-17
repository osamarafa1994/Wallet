<?php

namespace App\Http\Controllers\admin;

use App\Models\CustomerProcess;
use App\Models\Wallet;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Wallets extends Controller
{
    public function wallet_update_add($process_id,$value,$customer_id){
        $user = User::find($customer_id);
        $user->wallet_value = $user->wallet_value + $value;
        $user->save();
        $user = CustomerProcess::find($process_id);
        $user->suspend = 1;
        $user->save();
        return redirect()->route('admin.dashboard');
    }
    public function wallet_update_delete($process_id,$value,$customer_id){
        $wallet = DB::table('wallets')->where('customer_id', $customer_id)->get()->first();
        $totalValue = $wallet->value - $value;
        DB::table('wallets')->where('customer_id', $customer_id)->update(['value' => $totalValue]);


        $dataProcess = new CustomerProcess;

        $user = $dataProcess::find($process_id);
        $user->suspend = 2;
        $userId = Auth::user()->id;

        $user->action_man_id = $userId;
        $user->save();
        return redirect()->route('admin.dashboard');
    }
}
