
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
</style>
@section('content')

    <section>
        <!--for demo wrap-->
        <h1>جميع العمليات لدينا</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <th scope="col">اسم العميل</th>
                    <th scope="col">رقم الهاتف</th>
                    <th scope="col">الرصيد</th>
                    <th scope="col">الاجراء</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                @if(!empty($customers) && $customers != null && isset($customers))
                    @foreach($customers as $key=>$user)

                        <tr >
                            <td ><a style="color: white !important;" href="{{ asset("admin/user/$user->id") }}">{{ $user->name }}</a></td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->wallet_value }}    جنية </td>
                            <td> </td>


                        </tr>

                    @endforeach
                @endif

                </tbody>
            </table>

        </div>
    </section>


@endsection