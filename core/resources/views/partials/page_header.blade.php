<div class="page-header">
    <div class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4 mt-4">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ url('dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">@yield('name')</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>


        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">

                @hasSection('add_record')
                    <button type="button" class="btn btn-outline alpha-purple text-purple-800" id="btn_add"><i
                                class="icon-plus3"></i> @lang('common.add')</button>
                @endif

                @hasSection('add_new_customer')
                    <a href="{{ route('customer-new') }}" class="btn btn-outline alpha-purple text-purple-800">
                        <i class="icon-plus3"></i> @lang('common.add')
                    </a>
                @endif


            </div>
        </div>
    </div>
</div>




