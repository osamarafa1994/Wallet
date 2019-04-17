
@extends('layouts.adminLayouts.appCustomer')


@section('content')
    <style>

       .title{
           padding: 10px;
           background-color: #1b1e21;
           color: white;
           text-align: center;
           }

    </style>


<div class="trans-form">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

            {{--<h4 class="title">اخير العمليات التي تم اجراؤها</h4>--}}


    <form method="post" action="{{asset('admin/transformTo')}}" class="">
        @csrf

        <div class="row">
            <input type="radio" name="network_type" value="vodafone" >vodafone <img src="{{asset('assets/web_assets/img/voda.jpg')}}" alt="image" class="prov-pho"> <br>
            <input type="radio" name="network_type" value="etisalat" > etisalat<img src="{{asset('assets/web_assets/img/etisalat.png')}}" alt="image" class="prov-pho">  <br>
            <input type="radio" name="network_type" value="orange">orange <img src="{{asset('assets/web_assets/img/orang.png')}}" alt="image" class="prov-pho">  <br>
            <input type="radio" name="network_type" value="we">we<img src="{{asset('assets/web_assets/img/we.jpg')}}" alt="image" class="prov-pho"> <br><br>
        @if ($errors->has('network_type'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('network_type') }}</strong>
                    </span>
            @endif
        </div>
        <div class="row">

        ادخل الرقم<br>
        <input type="text" name="to_phone"><br>
            @if ($errors->has('to_phone'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('to_phone') }}</strong>
                    </span>
            @endif
        </div>
        <div class="row">

        ادخل المبلغ:<br>
        <input type="text" name="value"><br><br>
            @if ($errors->has('network_type'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('value') }}</strong>
                    </span>
            @endif
        </div>
        <div class="row">
            <input class='btn btn-primary' type='submit' value='ارسال'>
        </div>
    </form>
</div>


@endsection
