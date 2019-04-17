
@extends('layouts.adminLayouts.appCustomer')


@section('content')
    <style>
        .center {
           text-align: right;
        }
        .card-list {
            width: 100%;
        }
        .card-list:before, .card-list:after {
            content: " ";
            display: table;
        }
        .card-list:after {
            clear: both;
        }

        .card {
            border-radius: 8px;
            color: white;
            padding: 10px;
            position: relative;
        }
        .card .zmdi {
            color: white;
            font-size: 28px;
            opacity: 0.3;
            position: absolute;
            right: 13px;
            top: 13px;
        }
        .card .stat {
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            font-size: 8px;
            margin-top: 25px;
            padding: 10px 10px 0;
            text-transform: uppercase;
        }
        .card .title {
            display: inline-block;
            font-size: 8px;
            padding: 10px 10px 0;
            text-transform: uppercase;
        }
        .card .value {
            font-size: 28px;
            padding: 0 10px;
        }
        .card.blue {
            background-color: #2298F1;
            margin: 20px;
        }
        .card.green {
            background-color: #66B92E;
            margin: 20px;

        }
        .card.orange {
            background-color: #DA932C;
            margin: 20px;

        }
        .card.red {
            background-color: #D65B4A;
        }

        .projects {
            background-color: #273142;
            border: 1px solid #313D4F;
            overflow-x: auto;
            width: 100%;
        }
        .projects-inner {
            border-radius: 4px;
        }

        .projects-header {
            color: white;
            padding: 22px;
        }
        .projects-header .count,
        .projects-header .title {
            display: inline-block;
        }
        .projects-header .count {
            color: #738297;
        }
        .projects-header .zmdi {
            cursor: pointer;
            float: right;
            font-size: 16px;
            margin: 5px 0;
        }
        .projects-header .title {
            font-size: 21px;
        }
        .projects-header .title + .count {
            margin-left: 5px;
        }

        .projects-table {
            background: #273142;
            width: 100%;
        }
        .projects-table td,
        .projects-table th {
            color: white;
            padding: 10px 22px;
            vertical-align: middle;
        }
        .projects-table td p {
            font-size: 12px;
        }
        .projects-table td p:last-of-type {
            color: #738297;
            font-size: 11px;
        }
        .projects-table th {
            background-color: #313D4F;
        }
        .projects-table tr:hover {
            background-color: #303d52;
        }
        .projects-table tr:not(:last-of-type) {
            border-bottom: 1px solid #313D4F;
        }
        .projects-table .member figure,
        .projects-table .member .member-info {
            display: inline-block;
            vertical-align: top;
        }
        .projects-table .member figure + .member-info {
            margin-left: 7px;
        }
        .projects-table .member img {
            border-radius: 50%;
            height: 32px;
            width: 32px;
        }
        .projects-table .status > form {
            float: right;
        }
        .projects-table .status-text {
            display: inline-block;
            font-size: 12px;
            margin: 11px 0;
            padding-left: 20px;
            position: relative;
        }
        .projects-table .status-text:before {
            border: 3px solid;
            border-radius: 50%;
            content: "";
            height: 14px;
            left: 0;
            position: absolute;
            top: 1px;
            width: 14px;
        }
        .projects-table .status-text.status-blue:before {
            border-color: #1C93ED;
        }
        .projects-table .status-text.status-green:before {
            border-color: #66B92E;
        }
        .projects-table .status-text.status-orange:before {
            border-color: #DA932C;
        }
        .projects-table .status-text.status-red:before {
            border-color: #D65B4A;
        }


    </style>


    <div class="card-list">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card blue text-center">
                    <h5>الرصيد المتاح</h5>
                    <i class="zmdi zmdi-upload"></i>
                    <div class="value">{{ Auth::user()->wallet_value }} جنية</div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card green text-center">
                    <h5>تم تحويلة اليوم</h5>
                    <i class="zmdi zmdi-upload"></i>
                    <div class="value">{{ $processesDay->sum('value') }} جنية</div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card orange text-center">
                    <h5>عدد العمليات التي تمت اليوم</h5>
                    <i class="zmdi zmdi-download"></i>
                    <div class="value">{{ count($processesDay) }} عملية</div>
                </div>
            </div>
        </div>
    </div>
    <div class="projects mb-4">
        <div class="projects-inner">
            <header class="projects-header">
                <div class="count">  <span>{{ count($processes) }}</span> عملية  |</div>
                <i class="zmdi zmdi-download"></i>
                <div class="title">اخير العمليات التي تم اجراؤها</div>

            </header>
            <table class="projects-table">
                <thead>
                <tr >
                    <th class="center">الرقم</th>
                    <th class="center">المبلغ</th>
                    <th class="center">الحالة</th>
                    <th class="center">التاريخ</th>
                    <th class="center">الوقت</th>

                </tr>
                </thead>
                @if(!empty($processes) && $processes != null && isset($processes))
                    @foreach($processes as $key=>$process)
                        <?php
                        $classStat = 'orange';
                        $state = "جاري التحول";
                        ?>
                        @if ($process->suspend == 1 )
                            <?php
                            $classStat = 'red';
                                $state = "لم يصل التحويل";
                            ?>
                            @elseif($process->suspend == 2)
                                <?php
                                $classStat = 'blue';
                                $state = "تم التحويل";
                                ?>
                            @endif

                <tr>
                    <td>
                        <p>{{ $process->to_phone }}</p>
                    </td>
                    <td>
                        <p>{{ $process->value }} جنية</p>
                    </td>


                    <td class="status">
                        <span class="status-text status-{{ $classStat }}">{{ $state }}</span>
                    </td>
                    <td>
                        <p>{{  $process->created_at->toDatestring() }}</p>
                    </td>
                    <td>
                        <p>{{ $process->created_at->toTimestring() }}</p>
                    </td>
                </tr>

                    @endforeach

                @endif

            </table>
        </div>
    </div>





@endsection
