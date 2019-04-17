<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Wallet;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class Customers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::all();
        return view('admin.customers.index',compact('customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theLast = User::all()->last();
        return view('admin.customers.addCustomer',compact('theLast'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:30', 'unique:users'],
            'personal_id' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        User::create([
            'role_id' => 2,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'personal_id' => $request->personal_id,
            'details' => $request->details,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        $lastId = User::all()->last()->id;
        Wallet::create([
            'customer_id' => $lastId,
            'value' => $request->value,
        ]);

        return redirect()->route('customers.create')->with('successMsg','تم اضافة مستخدم بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
