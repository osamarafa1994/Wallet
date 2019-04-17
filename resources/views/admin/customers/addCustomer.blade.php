

@extends('layouts.adminLayouts.app')

<style>
    .trans-form{
        background-color: white !important;
        margin: 6%;
        padding: 5%;
    }
    .prov-pho{
        width: 7%;
    }

    input[type=text], select, textarea{
        margin: 0px !important;
    }
    @media (min-width: 992px) {
        .col-md-8 {
            width: 100% !important;
        }
    }
</style>
@section('content')



<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title"></h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="{{ asset("admin/customers") }}" enctype="multipart/form-data">
                            @if (\Session::has('successMsg'))
                                <div class="alert alert-success">
                                    {!! \Session::get('successMsg') !!}
                                </div>
                            @endif

                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>اسم المستخدم</label>
                                        <input type="text" class="form-control" name="name" value="" placeholder="اسم المستخدم">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">البريد الالكتروني</label>
                                            <input id="email" type="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                 </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> رقم المستخدم</label>
                                        <input type="text"  class="form-control" value="{{$theLast->id+1}}" readonly="readonly" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pass">الرقم السري</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passconform">تاكيد الرقم السري</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم التليفون</label>
                                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="" required>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم البطاقة</label>
                                        <input type="text" name="personal_id" class="form-control" value="" placeholder="رقم البطاقة">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>العنوان</label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="العنوان">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>الرصيد الحالي</label>
                                        <input type="text" value="" class="form-control" disabled placeholder="الرصيد الحالي">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>اضافة رصيد الي المحفظة</label>
                                        <input type="text" name="value" class="form-control" placeholder="المبلغ بالجنية">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>ملاحظات عن العميل</label>
                                        <textarea rows="5" name="details"  class="form-control" placeholder="ملاحظات عن العميل"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">تحديث البيانات</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
