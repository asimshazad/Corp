@extends('layouts.dashboard')
@section('style')
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true}).panelInstance('area1'); });
    </script>

@endsection

@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('speciality-control') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Speciality</a>
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
                    <form class="form-horizontal" action="{{ route('speciality-update',$menu->id) }}" method="post" role="form">

                        {!! csrf_field() !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-12"><strong style="text-transform: uppercase;">Title</strong></label>
                                <div class="col-md-12">
                                    <input class="form-control input-lg" name="name" placeholder="" value="{{ $menu->name }}" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><strong style="text-transform: uppercase;">Font awesome icon</strong></label>
                                <div class="col-md-12">
                                    <input class="form-control input-lg" name="icon" placeholder="" value="{{ $menu->icon }}" type="text" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12"><strong style="text-transform: uppercase;">CONTENT</strong></label>
                                <div class="col-md-12">
                                    <textarea id="area1" class="form-control" rows="5" name="description">{{ $menu->description }}</textarea>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> Update Speciality</button>
                                </div>

                        </div>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->


@endsection
@section('scripts')


@endsection