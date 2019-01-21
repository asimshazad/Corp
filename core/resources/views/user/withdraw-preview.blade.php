@extends('layouts.user')
@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center" id="horz-layout-basic">Withdraw Method</h4>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card box-shadow-0">
                                <div class="card-content collpase show">
                                    <div class="card-body text-center">
                                        <h3 class="text-uppercase font-weight-bold text-center" id="horz-layout-basic">{{$method->name}}</h3>
                                        <br>
                                        <img src="{{ asset('assets/images/withdraw') }}/{{$method->image}}" style="width:100%;" alt="">
                                        <br>
                                        <br>
                                        <a href="{{ route('user-withdraw-now') }}" class="btn btn-outline-info font-weight-bold text-uppercase btn-min-width mr-1 mb-1"><i class="fa fa-long-arrow-left"></i> Another Method</a>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center" id="horz-layout-basic">{{$page_title}}</h4>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">

                            <h3 class="text-center">Current Balance : {{ $user->balance }} {{ $basic->currency }}</h3>

                            <hr>

                            <div class="row">
                                <div class="col-md-8 offset-2">

                                    {!! Form::open(['route'=>'user-withdraw-confirm', 'method'=>'post', 'role'=>'form', 'class'=>'form-horizontal', 'files'=>true]) !!}

                                    <input type="hidden" name="method_id" value="{{$method->id}}">

                                    <fieldset style="width: 100%;margin-bottom: 10px;">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                               <button class="btn btn-pink text-uppercase" type="button">Current Balance</button>
                                            </span>
                                            <input type="text" class="form-control text-center" value="{{ $user->balance }}" placeholder="Withdraw Charge" readonly>
                                            <span class="input-group-btn">
                                                <button class="btn btn-pink text-uppercase" type="button">{{ $basic->currency }}</button>
                                            </span>
                                        </div>
                                    </fieldset>

                                    <fieldset style="width: 100%;margin-bottom: 10px;">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                               <button class="btn btn-pink text-uppercase" type="button">Withdraw Charge</button>
                                            </span>
                                            <input type="text" class="form-control text-center" value="{{ $method->charge }}" placeholder="Withdraw Charge" readonly>
                                            <span class="input-group-btn">
                                                <button class="btn btn-pink text-uppercase" type="button">{{ $basic->currency }}</button>
                                            </span>
                                        </div>
                                    </fieldset>

                                    <fieldset style="width: 100%;margin-bottom: 10px;">
                                    <div class="input-group">
                                            <span class="input-group-btn">
                                               <button class="btn btn-pink text-uppercase" type="button">Can Withdraw</button>
                                            </span>
                                        @if($user->balance < $method->charge)
                                        <input type="text" class="form-control text-center" value="Can't Withdraw" placeholder="Withdraw Charge" readonly>
                                        @else
                                        <input type="text" id="avail_amount" class="form-control text-center" value="{{  $user->balance - $method->charge }}" placeholder="Withdraw Charge" readonly>
                                        @endif
                                        <span class="input-group-btn">
                                                <button class="btn btn-pink text-uppercase" type="button">{{ $basic->currency }}</button>
                                            </span>
                                    </div>
                                    </fieldset>

                                    <fieldset style="width: 100%;margin-bottom: 10px;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                       <button class="btn btn-pink text-uppercase" type="button">Minimum</button>
                                                    </span>
                                                            <input type="text" class="form-control text-center" id="min" value="{{ $method->withdraw_min }}" placeholder="Withdraw Charge" readonly>
                                                            <span class="input-group-btn">
                                                        <button class="btn btn-pink text-uppercase" type="button">{{ $basic->currency }}</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                       <button class="btn btn-pink text-uppercase" type="button">Maximum</button>
                                                    </span>
                                                            <input type="text" class="form-control text-center" id="max" value="{{ $method->withdraw_max }}" placeholder="Withdraw Charge" readonly>
                                                            <span class="input-group-btn">
                                                        <button class="btn btn-pink text-uppercase" type="button">USD</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>

                                    <fieldset style="width: 100%;margin-bottom: 10px;">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                               <button class="btn btn-pink text-uppercase" type="button">Withdraw Amount</button>
                                            </span>
                                            @if($user->balance < $method->charge)
                                                <input type="text" class="form-control text-center" value="Can't Withdraw" placeholder="Withdraw Charge" readonly>
                                            @else
                                            <input type="text" name="amount" id="amount" class="form-control text-center" value="" placeholder="Withdraw Amount" required>
                                            @endif
                                            <span class="input-group-btn">
                                                <button class="btn btn-pink text-uppercase" type="button">{{ $basic->currency }}</button>
                                            </span>
                                        </div>
                                    </fieldset>

                                    <div id="withdrawDetails" style="display: none">
                                        <fieldset style="width: 100%;margin-bottom: 10px;">
                                            <label for="basicTextarea"><b>{{$method->name}} - Sending Details</b></label>
                                            <textarea name="details" class="form-control font-weight-bold" id="basicTextarea" rows="3" placeholder="{{$method->name}} - Sending Details" required></textarea>
                                        </fieldset>
                                    </div>

                                    <fieldset style="width: 100%;margin-bottom: 10px;">
                                        <button type="submit" id="withdrawButton" disabled class="btn btn-primary bg-softwarezon-x btn-lg btn-block text-uppercase"><i class="ft-upload-cloud"></i> Withdraw Now</button>
                                    </fieldset>


                                    {!! Form::close() !!}

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
        $( document ).ready(function() {
            $(document).on("blur", '#amount', function (e) {
                var av = $('#avail_amount').val();
                var amount = $('#amount').val();
                var min = $('#min').val();
                var max = $('#max').val();

                var url = '{{ url('/user/') }}';

                $.get(url + '/check-withdraw/' + av +'/'+ amount +'/'+ min +'/'+ max,function (data) {
                    var result = $.parseJSON(data);

                    if (result['errorStatus'] == "yes"){
                        document.getElementById('withdrawDetails').style.display = 'none';
                        toastr.warning(result['errorDetails']);
                    }else{
                        toastr.info(result['errorDetails']);
                        document.getElementById("withdrawButton").disabled = false;
                        document.getElementById('withdrawDetails').style.display = 'block';
                    }
                });

            });
        });
    </script>
@endsection