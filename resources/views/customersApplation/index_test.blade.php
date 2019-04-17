@extends('layouts.webLayouts.app')

@section('content')
    <div class="container"  dir="rtl" style="text-align: right">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('تسجيل مستخدم جديد') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('appcust.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('الإسم') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('رقم الهاتف') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="personal_id" class="col-md-4 col-form-label text-md-right">{{ __('الرقم القومي') }}</label>

                                <div class="col-md-6">
                                    <input id="personal_id" type="text" class="form-control{{ $errors->has('personal_id') ? ' is-invalid' : '' }}" name="personal_id" value="{{ old('personal_id') }}" required>

                                    @if ($errors->has('personal_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('personal_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('التسجيل') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
