<?php

namespace App\Http\Controllers\admin;

use App\Models\CustomerProcess;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Dash extends Controller
{

    public function index()
    {
        $userId = Auth::user()->id;

        $processes = CustomerProcess::whereCustomerId($userId)->orderBy('id', 'desc')->take(5)->get();
        $processesDay = CustomerProcess::whereDate('updated_at', Carbon::today())->whereCustomerId($userId)
                                        ->whereSuspend(2)->get();

        return view('admin.customers.dash',compact('processes','processesDay'));
    }


    public function transform()
    {
        return view('admin.customers.userCanTransform');
    }

    public function transformTo(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'network_type' => 'required',
            'to_phone' => 'required|max:20|min:10',
            'value' => 'required',
        ]);
        $userId = Auth::user()->id;

        $input['customer_id'] = $userId;
        $input['action_man_id'] = 0;


        CustomerProcess::create($input);

        $user = User::find($userId);
        $user->wallet_value = $user->wallet_value - $input['value'];
        $user->save();


        return redirect()->back()->with('success','تم ارسال طلب التحويل بنجاح');

    }

}
