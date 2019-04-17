@extends('layouts.adminLayouts.app')


@section('content')


    <section>
    <!--for demo wrap-->
    <h1>قائمة الطلبات للتحويل</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>اسم المستخدم</th>
                <th>الرقم المراد التحويل اليه</th>
                <th>المبلغ</th>
                <th>الرصيد المتاح</th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            @if(count($processes) == 0)
                <tr>
                    <td colspan="5" style="text-align: center" bgcolor="#ff4110">لا يوجد طلبات تحويل</td>

                </tr>
            @elseif(!empty($processes) && $processes != null && isset($processes))
            @foreach($processes as $key=>$process)

                <tr>
                    <td>{{ $process->customer->name }}</td>
                    <td>{{ $process->to_phone }}</td>
                    <td>{{ $process->value }}    جنية </td>
                    <td>{{ $process->customer->wallet->value }}    جنية </td>
                    <td>
                        <a href="#" class="text-success" data-toggle="modal" data-target="#exampleModal{{$process->id}}">
                            <li class="fa fa-check"></li>
                        </a>
                    </td>
                </tr>

            @endforeach

            @endif

            </tbody>
        </table>

    </div>
</section>

@endsection


    @if(!empty($processes) && $processes != null && isset($processes))
        @foreach($processes as $key=>$process)
            <!-- Modal -->
            <div class="modal fade modal-success" id="exampleModal{{$process->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">تنفيذ التحويل </h5>

                        </div>

                        <div class="modal-body">
                            <div class="">
                                <form action="action_page.php">
                                    <h1 class="mod-h1">{{ $process->value }}  جنية</h1>
                                    <h1 class="mod-h1">{{ $process->to_phone }}</h1>


                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-secondary  pull-left" data-dismiss="modal">اغلاق</button>
                            <a type="button" href="{{asset("admin/wallet_update_add/{$process->id}/$process->value/{$process->customer->id}")}}" class="btn btn-danger  pull-left"> لم يتم التحويل </a>
                            <a type="button" href="{{asset("admin/wallet_update_delete/{$process->id}/{$process->value}/{$process->customer->id}")}}" class="btn btn-primary  pull-left">تم التحويل  </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    @endif


