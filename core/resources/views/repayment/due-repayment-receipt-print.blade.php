<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $site_title }} | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap3.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/font-awesome/css/font-awesome.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/AdminLTE.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .invoice {
            margin: 0px !important;
        }
        .invoice .invoice-logo {
            margin-bottom: 0px;
        }
        .invoice .invoice-logo-space {
            margin-bottom: 0px;
        }
        .invoice .invoice-logo p {
            padding: 5px 0;
            font-size: 14px;
            line-height: 28px;
            margin-top: 50px;
        }
        .invoice-extra-p{
            font-size: 14px;
        }
        .extra-h{
            margin-top: 0;
        }
        .extra-well{
            margin-bottom: 0;
        }
        .extra-table{
            font-size: 13px;
        }
        .extra-table2{
            font-size: 13px;
        }
        .paymentStatus{
            padding: 5px 10px;
            border: 2px solid;
            border-radius: 3px;
            font-weight: bold;
        }
        @media print {

        }
        .font-size-14{
            font-size: 13px !important;
        }
    </style>

    <!-- Google Font -->
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    --}}
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
</head>
<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row invoice-logo">
            <div class="col-xs-6 invoice-logo-space">
                <img src="{{ asset('assets/images/logo.png') }}" class="center-block" alt="" />
                <div class="text-center">
                    <h4 style="font-size: 15px;">{{ $basic->title }}</h4>
                    <h5 style="font-size: 13px;">{{ $basic->email }}, {{ $basic->phone }}</h5>
                    <h5 style="font-size: 13px;">{{ $basic->address }}</h5>
                </div>
            </div>
            <div class="col-xs-6">
                <p class="text-center"> Receipt : {{ $sell->custom }} <br>
                    <span class="invoice-extra-p">{{ \Carbon\Carbon::parse($sell->created_at)->format('dS M, Y - h:i A ') }}</span>
                </p>
                <div class="text-center">
                    <h5>
                        <span class="label label-default"> Due Repayment</span>
                    </h5>

                </div>

            </div>
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-6 col-xs-6">
                <div class="well extra-well extra-table2" style="padding: 10px;">
                    <h4 class="extra-h" style="margin-bottom: 3px;font-size: 14px;">Customer Details</h4>
                    <ul class="list-unstyled" style="margin-bottom: 0;">
                        <li class="font-size-14">{{ $sell->customer->name }}</li>
                        <li class="font-size-14">{{ $sell->customer->phone }}</li>
                        <li class="font-size-14">{{ $sell->customer->address }}</li>
                    </ul>
                </div>
            </div>
            <!-- /.col -->

            <div class="col-sm-6 col-xs-6">
                <div class="well extra-well extra-table2" style="padding: 10px;">
                    <h4 class="extra-h" style="margin-bottom: 3px;font-size: 14px;">Invoice Details</h4>
                    <ul class="list-unstyled" style="margin-bottom: 0;">
                        <li class="font-size-14"> <b>Received By : </b>
                            @if($sell->issuse_type == 0)
                                {{ \Illuminate\Support\Facades\Auth::user()->name }}
                            @else
                                {{ $sell->staff->name }}
                            @endif
                        </li>
                        <li class="font-size-14"> <b>Due Amount : </b>{{ $sell->post_due + $sell->pay_amount }} {{ $basic->currency }}</li>
                        <li class="font-size-14"> <b>Pay Amount : </b>{{ $sell->pay_amount }} {{ $basic->currency }}</li>
                    </ul>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <hr style="margin-top: 10px;margin-bottom: 0px;">
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped extra-table2" style="margin-bottom: 0;">
                    <thead>
                    <tr>
                        <th>Receive Date</th>
                        <th>Invoice Number</th>
                        <th>Total Due</th>
                        <th>Pay Amount</th>
                        <th>Post Due</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($sell->created_at)->format('dS-F-Y') }}</td>
                        <td>{{ $sell->order->custom }}</td>
                        <td>{{ $sell->pay_amount + $sell->post_due }} - {{ $basic->currency }}</td>
                        <td>{{ $sell->pay_amount }} - {{ $basic->currency }}</td>
                        <td>{{ $sell->post_due }} - {{ $basic->currency }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-6 col-xs-offset-6">
                <div class="table-responsive">
                    <table class="table extra-table" style="margin-bottom: 0px">
                        <tr class="bg-grey bg-lighten-4">
                            <td class="text-bold-600">Total Due</td>
                            <td class="text-bold-600 text-right">{{ $sell->post_due + $sell->pay_amount }} - {{ $basic->currency }}</td>
                        </tr>
                        <tr class="bg-grey bg-lighten-4">
                            <td class="text-bold-600">Pay Amount</td>
                            <td class="text-bold-600 text-right">{{ $sell->pay_amount }} - {{ $basic->currency }}</td>
                        </tr>
                        <tr class="bg-grey bg-lighten-4">
                            <td class="red text-bold-600">Post Due</td>
                            <td class="red text-bold-600 text-right">{{ $sell->post_due }} - {{ $basic->currency }}</td>
                        </tr>

                        @if($sell->order->status == 2)
                            <tr class="bg-grey bg-lighten-4">
                                <td class="red text-bold-800">Next Payment Date</td>
                                <td class="red text-bold-800 text-right">{{ \Carbon\Carbon::parse($sell->order->due_payment_date)->format('dS-F-Y') }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="2" class="text-capitalize text-center"><b></b>In Word : {{ \App\TraitsFolder\CommonTrait::wordAmount($sell->post_due + $sell->pay_amount) }} {{ $basic->currency }} Only.</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="well extra-well extra-table2" style="padding: 10px;">
                    <p class="font-size-14 text-align-center">{!! $basic->admin_text  !!}</p>
                </div>
            </div>
        </div>

    </section>

    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
