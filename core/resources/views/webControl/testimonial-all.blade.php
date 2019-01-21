@extends('layouts.dashboard')
@section('style')
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

                            <table class="table table-striped table-bordered table-hover" id="sample_1">

                                <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Author Name</th>
                                    <th>Author Details</th>
                                    <th>Author Image</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php $i=0;@endphp
                                @foreach($testimonial as $p)
                                    @php $i++;@endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->position }}</td>
                                        <td>
                                            <img style="width: 100px" class="img-responsive" src="{{ asset('assets/images/testimonial') }}/{{ $p->image }}">
                                        </td>
                                        <td>{!! $p->message !!}</td>
                                        <td>
                                            <a href="{{ route('testimonial-edit',$p->id) }}" class="btn btn-primary bold uppercase"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger bold uppercase delete_button"
                                                    data-toggle="modal" data-target="#DelModal"
                                                    data-id="{{ $p->id }}">
                                                <i class='fa fa-trash'></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->

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
                    <form method="post" action="{{ route('testimonial-delete') }}" class="form-inline">
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
