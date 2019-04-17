<?php

namespace App\Http\Controllers\admin;

use App\Models\CustomerProcess;
use App\Models\Wallet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','IsAdmin']);
    }

    public function index()
    {

        //
        //$customers = DB::table('users')->where('role_id', "==", 2)->get();
       // $processes = DB::table('customer_processes')->where('suspend', "==", 0)->get();
        $processes = CustomerProcess::whereSuspend(0)->get();


        return view('admin.customers.index',compact('processes'));

    }
    public function lastTransform()
    {
        //
        //$customers = DB::table('users')->where('role_id', "==", 2)->get();
        $processes = CustomerProcess::where('suspend','!=',0)->get();

        return view('admin.customers.transforms',compact('processes'));

    }
    public function allCustomers()
    {
        //
        //$customers = DB::table('users')->where('role_id', "==", 2)->get();
        $customers = User::where('role_id',2)->get();

        return view('admin.customers.allCustomers',compact('customers'));

    }



    public function editUser($id)
    {

        $user = User::find($id);

        return view('admin.customers.customer',compact('user'));

    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);


        if($request->password) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'personal_id' => 'required',
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
            $user->password = Hash::make($request->password);

        }else{
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'personal_id' => 'required',
            ]);
        }

        if($request->value) {
            $user->wallet_value = $request->value;
            $wallet = Wallet::whereCustomerId($id)->get()->first();

            $wallet->value = $wallet->value + $request->value;
            $wallet->save();

        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->personal_id = $request->personal_id;
        $user->details = $request->details;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('admin.allCustomers')->with('successMsg','Item Successfully Updated');

        


    }

}
