@extends('layouts.webLayouts.app')

<div class='login' dir="rtl" style="text-align: right">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

        <form method="POST" action="{{ route('appcust.store') }}">
            @csrf

        <h2>تسجيل مستخدم جديد</h2>
            <div class="row">
                <input name='name' class="{{ $errors->has('name') ? ' is-invalid' : '' }}"   value="{{ old('name') }}" required placeholder='اسم المستخدم' type='text'>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <input name='phone' placeholder='رقم الهاتف' class="{{ $errors->has('phone') ? ' is-invalid' : '' }}"   value="{{ old('phone') }}" required  type='text'>
                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <input name='personal_id' class="{{ $errors->has('personal_id') ? ' is-invalid' : '' }}"   value="{{ old('personal_id') }}" placeholder='رقم البطاقة' type='text'>

                @if ($errors->has('personal_id'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('personal_id') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="row">
                <input class='animated' type='submit' value='التسجيل'>

            </div>

    <a class='forgot' href='{{ asset('login') }}'>امتلك حساب بالفعل </a>
        </form>
</div>
