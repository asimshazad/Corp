@extends('layouts.user')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
@endsection
@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Title : {{$signal->title}}</h4>
                    </div>
                    <hr>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <h4 class="card-title" id="horz-layout-basic">Signal Description : </h4>

                            {!!$signal->description!!}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->

@endsection

