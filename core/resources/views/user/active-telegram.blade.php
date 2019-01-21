@extends('layouts.user')
@section('style')
    <style>

        ::-moz-focus-inner {
            padding: 0;
            border: 0;
        }

        button {
            position: relative;
            /*  background-color: #aaa;
              border-radius: 0 3px 3px 0;
              cursor: pointer;*/
        }
        .copied::after {
            position: absolute;
            top: 12%;
            right: 110%;
            display: block;
            content: "COPIED";
            font-size: 1.40em;
            padding: 2px 10px;
            color: #fff;
            background-color: #22a;
            border-radius: 3px;
            opacity: 0;
            will-change: opacity, transform;
            animation: showcopied 1.5s ease;
        }
        @keyframes showcopied {
            0% {
                opacity: 0;
                transform: translateX(100%);
            }
            70% {
                opacity: 1;
                transform: translateX(0);
            }
            100% {
                opacity: 0;
            }
        }

    </style>
@endsection
@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">{{$page_title}}</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="table-scrollable bg-info">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th> #Step </th>
                                                <th> DESCRIPTION </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td><b>#Step 1</b> </td>
                                                <td><b> Install Telegram Android, IOS or Desktop App.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Step 2</b> </td>
                                                <td><b> Copy Your Telegram Activate Token.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Step 3</b> </td>
                                                <td><b> Go to this URL : <a href="{{$basic->telegram_url}}" class="white" target="_blank">{{$basic->telegram_url}}.</a></b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Step 4</b> </td>
                                                <td><b> Press Start Button.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Step 5</b> </td>
                                                <td><b> Paste This Token in MessageBox and Send It.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Step 6</b> </td>
                                                <td><b> After Send SMS, Press Active Telegram Button.</b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    @if(Auth::user()->telegram_id == null)
                                        <label><strong>Your Telegram Token :</strong></label>
                                        <div class="input-group mb15">
                                            <input type="text" class="form-control input-lg" id="ref" value="{{ Auth::user()->telegram_token }}" readonly/>
                                            <span class="input-group-btn">
                                                <button data-copytarget="#ref" class="btn btn-success btn-lg">COPY TO CLIPBOARD</button>
                                            </span>
                                        </div>
                                        <br>


                                    <form class="form form-horizontal" action="{{ route('submit-active-telegram') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-send"></i> Active Telegram</button>
                                    </form>
                                    @else
                                        <div class="alert alert-primary border-0 text-center" role="alert">
                                            <strong>Your Telegram Already Activated.</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
@section('scripts')
    <script>

        (function() {

            'use strict';
            document.body.addEventListener('click', copy, true);
            // event handler
            function copy(e) {
                var
                    t = e.target,
                    c = t.dataset.copytarget,
                    inp = (c ? document.querySelector(c) : null);
                if (inp && inp.select) {
                    inp.select();
                    try {
                        document.execCommand('copy');
                        inp.blur();
                        t.classList.add('copied');
                        setTimeout(function() { t.classList.remove('copied'); }, 1500);
                    }
                    catch (err) {
                        alert('please press Ctrl/Cmd+C to copy');
                    }
                }
            }

        })();
    </script>
@endsection