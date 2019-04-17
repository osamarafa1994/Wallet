@extends('layouts.webLayouts.app')

@section('content')

    <div  class='login' dir="rtl" style="text-align: right">
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <h2>تسجيل الدخول</h2>
            <div class=" row">

            <input class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value="{{ old('email') }}" required autofocus placeholder='البريد الالكتروني او رقم الهاتف' type='text'>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
            </div>
            <div class=" row">

            <input  class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder='الرقم السري' type='password'>

            </div>
            <div class=" row">

            <input class='animated' type='submit' value='{{ __('تسجيل الدخول') }}'>
            </div>
        </form>

    </div>
@endsection
