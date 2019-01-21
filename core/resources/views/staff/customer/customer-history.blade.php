@extends('layouts.staff')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/datatables.min.css') }}">
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

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Created Date</th>
                                        <th>Customer Name</th>
                                        <th>Customer Email</th>
                                        <th>Customer Phone</th>
                                        <th>Customer Address</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($customer as $k => $p)
                                        <tr>
                                            <td>{{ ++$k }}</td>
                                            <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M,y h:i A') }}</td>
                                            <td>{{ $p->name }}</td>
                                            <td>
                                                @if($p->email == null)
                                                    <div class="badge badge-warning font-weight-bold text-uppercase">Null</div>
                                                @else
                                                    {{ $p->email }}
                                                @endif
                                            </td>
                                            <td>{{ $p->phone }} <br> {{ $p->phone2 }}</td>
                                            <td>
                                                {{ $p->address }}
                                            </td>
                                            <td>
                                                <a href="{{ route('staff-customer-view',$p->id) }}" class="btn btn-primary btn-sm font-weight-bold text-uppercase" title="View"><i class="fa fa-eye"></i> View</a>
                                                <a href="{{ route('staff-customer-edit',$p->id) }}" class="btn btn-warning btn-sm font-weight-bold text-uppercase" title="Edit"><i class="fa fa-edit"></i> Edit</a>
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
        </div>
    </section><!---ROW-->



@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatable-basic.js') }}"></script>
@endsection
