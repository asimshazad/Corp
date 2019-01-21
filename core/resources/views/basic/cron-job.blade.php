@extends('layouts.dashboard')
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
                                            <td><b> Log In Your cPanel.</b></td>
                                        </tr>
                                        <tr>
                                            <td> <b>#Step 2</b> </td>
                                            <td><b> Go Advanced > Cron Jobs Panel</b></td>
                                        </tr>
                                        <tr>
                                            <td> <b>#Step 3</b> </td>
                                            <td><b> Set Up Time. 5 Min is Better for This.</b></td>
                                        </tr>
                                        <tr>
                                            <td> <b>#Step 4</b> </td>
                                            <td><b> Copy Cron Job URL and Paste Command Input Filed.</b></td>
                                        </tr>
                                        <tr>
                                            <td> <b>#Step 5</b> </td>
                                            <td><b> Press Add New Cron Job Button .</b></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label><strong>Set Cron Job URL :</strong></label>
                                <div class="input-group mb15">
                                    <input type="text" class="form-control input-lg" id="ref" readonly value="wget {{ route('cron-fire') }}"/>
                                    <span class="input-group-btn">
                                        <button data-copytarget="#ref" class="btn btn-success btn-lg">COPY TO CLIPBOARD</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->


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