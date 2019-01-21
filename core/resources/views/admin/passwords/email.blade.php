@extends('layouts.auth')

@section('content')


    <form class="login-form" action="{{ route('admin.password.email') }}" method="post" novalidate>
        @if (session()->has('message'))
            <div class="alert bg-warning text-white alert-styled-left alert-dismissible">
            {{ session()->get('message') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert bg-warning text-white alert-styled-left alert-dismissible">
                @foreach ($errors->all() as $error)
                    <span class="font-weight-semibold">Warning!</span>  {!!  $error !!}
                @endforeach
            </div>
        @endif

        {!! csrf_field() !!}
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">Reset Password</h5>
                    <span class="d-block text-muted">Enter your credentials below</span>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">

                    <input type="email" name="email" class="form-control" id="user-name" placeholder="Enter Email" required>
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Reset Password <i
                                class="icon-circle-right2 ml-2"></i></button>
                </div>

            </div>
        </div>
    </form>

@endsection
