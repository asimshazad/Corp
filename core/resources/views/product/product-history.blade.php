@extends('layouts.dashboard')
@section('name')@lang('product.p_cat')@endsection
@section('add_record')@lang('product.p_cat')@endsection
@section('content')
    <div class="page-content pt-0">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <table class="table datatable-basic table-bordered table-striped table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th>{{ __('product.id') }}</th>
                            <th>{{ __('product.created_at') }}</th>
                            <th>{{ __('product.company') }}</th>
                            <th>{{ __('product.category') }}</th>
                            <th>{{ __('product.code_name') }}</th>
                            <th class="text-center">{{ __('common.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($product as $k => $p)
                            <tr>
                                <td>{{ ++$k }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M,y h:i A') }}</td>
                                <td>{{ $p->company->name }}</td>
                                <td>{{ $p->category->name }}</td>
                                <td>{{ $p->code }} - {{ $p->name }}</td>

                                <td class="text-center">
                                    <a href="{{ route('product-edit',$p->id) }}" id="{{$p->id}}"  class="open_modal list-icons-item"  title="{{ __('common.edit') }}" data-container="body">
                                        <i class="icon-pencil7"></i>
                                    </a>

                                    <a href="{{ route('product-view',$p->id) }}" id="{{$p->id}}"  class="open_modal list-icons-item"  title="{{ __('common.view') }}" data-container="body">
                                        <i class="icon-pencil7"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
