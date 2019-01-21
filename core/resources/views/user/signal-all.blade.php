@extends('layouts.user')
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
                                    <th>Signal Date</th>
                                    <th>Signal Title</th>
                                    <th>Signal Rating</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($signal as $k => $p)
                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td>{{\Carbon\Carbon::parse($p->created_at)->format('dS M, Y - h:i:s A')}}</td>
                                        <td>{{ $p->signal->title }}</td>
                                        @php
                                            $total_signal = \App\SignalRating::whereSignal_id($p->signal->id)->count();
                                            $sum_signal = \App\SignalRating::whereSignal_id($p->signal->id)->sum('rating');
                                            if ($total_signal == 0){
                                                $final_rating = 0;
                                            }else{
                                                $final_rating = round($sum_signal / $total_signal);
                                            }
                                        @endphp
                                        <td>{!! \App\TraitsFolder\CommonTrait::getRating($final_rating) !!} - ({{ $total_signal }})</td>
                                        <td>
                                            <a href="{{ route('user-signal-view',$p->id) }}" class="btn btn-primary bold uppercase" title="Edit"><i class="fa fa-eye"></i> View Signal</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$signal->links('basic.pagination')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
@endsection