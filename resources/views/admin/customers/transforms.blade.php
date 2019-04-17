
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
        <h1>اخير العمليات التي تم تحويلها</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <th scope="col">اسم المستخدم</th>
                    <th scope="col">الرقم المحول اليه</th>
                    <th scope="col">المبلغ</th>
                    <th scope="col">الحالة</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                @if(!empty($processes) && $processes != null && isset($processes))
                    @foreach($processes as $key=>$process)

                        <tr style="background-color:
<?php if($process->suspend == 1) { ?>
darkred;
<?php }elseif ($process->suspend == 2){?>
    green;
   <?php  } ?>
                            ">
                            <td>{{ $process->customer->name }}</td>
                            <td>{{ $process->to_phone }}</td>
                            <td>{{ $process->value }}    جنية </td>
                            <td>
                                <?php if($process->suspend == 1) { ?>
                                    لم يتم التحويل
                                    <?php }elseif ($process->suspend == 2){?>
                                    تم التحويل

                                <?php  } ?>
                            </td>

                        </tr>

                    @endforeach
                @endif

                </tbody>
            </table>

        </div>
    </section>


@endsection