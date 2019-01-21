@extends('layouts.dashboard')
@section('title', 'Slider')
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

                            {!! Form::open(['method'=>'post','files'=>true,'class'=>'form-horizontal']) !!}
                            <div class="form-body">


                                <div class="row">
                                    <div class="col-md-10 offset-1">

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Slider Main Title</strong></label>
                                            <div class="col-md-12">
                                                <input name="main_title" type="text" class="form-control input-lg" placeholder="Slider Main Title" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Slider Sub Title</strong></label>
                                            <div class="col-md-12">
                                                <input name="sub_title" type="text" class="form-control input-lg" placeholder="Slider Sub Title" required />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Slider Image</strong></label>
                                            <div class="col-md-12">
                                                <input name="image" type="file" class="form-control input-lg" required />
                                                <code><b style="color:red; font-weight: bold;margin-top: 10px">ONE IMAGE ONLY | Image Will Resized to 1900 x 730 </b></code>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> SAVE SLIDER</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
    <hr>
    <div class="row">
        @foreach($slider as $s)
            <div class="col-md-6">
                <div class="images">
                    <img class="center-block" src="{{ asset('assets/images/slider') }}/{{ $s->image }}" alt="" style="margin-top: 20px;margin-bottom: 10px;width:100%;">
                    <h3><b>Main Title : </b> {{ $s->main_title }} </h3>
                    <h4><b>Sub Title : </b>{{ $s->sub_title }} </h4>
                    <button type="button" class="btn btn-danger btn-block btn-lg delete_button"
                            data-toggle="modal" data-target="#DelModal"
                            data-id="{{ $s->id }}">
                        <i class='fa fa-trash'></i> Delete Slider
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-trash'></i> Delete !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('slider-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
@section('scripts')

    <script>
        $(document).ready(function () {
            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);
            });
        });
    </script>

@endsection

