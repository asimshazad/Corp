<div class="navbar navbar-expand-md navbar-light">
    <div class="text-center d-md-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-navigation">
            <i class="icon-unfold mr-2"></i>
            Navigation
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-navigation">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="navbar-nav-link active">
                    <i class="icon-home4 mr-2"></i>
                    {{ __('sidebar.dashboard') }}
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-strategy mr-2"></i>
                    Payments
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('upcoming-instalment-repayment') }}" class="dropdown-item {{ Request::is('admin/upcoming-instalment-repayment') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> Upcoming Repayment </a>
                    <a href="{{ route('instalment-repayment') }}" class="dropdown-item {{ Request::is('admin/instalment-repayment') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> New Repayment</a>
                    <a href="{{ route('instalment-repayment-history') }}" class="dropdown-item {{ Request::is('admin/instalment-repayment-history') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> Repayment History</a>


                    <div class="dropdown-header">Due Payments</div>

                    <a href="{{ route('upcoming-due-repayment') }}" class="dropdown-item {{ Request::is('admin/upcoming-due-repayment') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> Upcoming Due Repayment </a>
                    <a href="{{ route('instalment-repayment') }}" class="dropdown-item {{ Request::is('admin/due-repayment') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> Due Repayment</a>
                    <a href="{{ route('due-repayment-history') }}" class="dropdown-item {{ Request::is('admin/due-repayment-history') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> Repayment History</a>
                    <div class="dropdown-header">Company Payments</div>


                    <a href="{{ route('payment-new') }}" class="dropdown-item {{ Request::is('admin/payment-new') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> New Payment </a>
                    <a href="{{ route('payment-history') }}" class="dropdown-item {{ Request::is('admin/payment-history') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> Payment History</a>



                </div>
            </li>






            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-strategy mr-2"></i>
                    Products
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('sell-new') }}" class="dropdown-item {{ Request::is('admin/sell-new') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> New Sell </a>
                    <a href="{{ route('sell-history') }}" class="dropdown-item {{ Request::is('admin/sell-history') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> Sell History</a>

                    <a href="{{ route('product-new') }}" class="dropdown-item {{ Request::is('admin/product-new') ? 'active' : '' }}">
                        <i class="icon-align-center-horizontal"></i> New Product
                    </a>
                    <a href="{{ route('product-history') }}" class="dropdown-item {{ Request::is('admin/product-history') ? 'active' : '' }}">
                        <i class="icon-align-center-horizontal"></i> Product History
                    </a>
                    <a href="{!! route('manage-category') !!}" class="dropdown-item {{ Request::is('admin/manage-category') ? 'active' : '' }}">
                        <i class="icon-align-center-horizontal"></i> Product Category
                    </a>

                    <a href="{!! route('manage-company') !!}" class="dropdown-item {{ Request::is('admin/manage-company') ? 'active' : '' }}">
                        <i class="icon-align-center-horizontal"></i> Manage Company
                    </a>




                </div>
            </li>


            <li class="nav-item">
                <a href="{{ route('customer-history') }}" class="navbar-nav-link">
                    <i class="icon-align-center-horizontal"></i>
                    {{ __('sidebar.customers') }}
                </a>
            </li>








            <li class="nav-item">
               {{-- <a href="{{ route('customer-history') }}" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-strategy mr-2"></i>
                    Customers
                </a>--}}
               {{-- <div class="dropdown-menu">
                    <a href="{{ route('customer-new') }}" class="dropdown-item {{ Request::is('admin/customer-new') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> New Customer </a>
                    <a href="{{ route('customer-history') }}" class="dropdown-item {{ Request::is('admin/customer-history') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> Customer History</a>
                </div>--}}
            </li>




           {{-- <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-strategy mr-2"></i>
                    Accounts
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('mange-account') }}" class="dropdown-item {{ Request::is('admin/mange-account') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> New Action </a>
                    <a href="{{ route('account-history') }}" class="dropdown-item {{ Request::is('admin/account-history') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> Account History</a>
                </div>
            </li>--}}






            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-strategy mr-2"></i>
                    @lang('common.store')
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('current-store') }}" class="dropdown-item {{ Request::is('admin/current-store') ? 'active' : '' }}">
                        <i class="icon-align-center-horizontal"></i> Current Store
                    </a>
                    <a href="{{ route('store-new') }}" class="dropdown-item {{ Request::is('admin/store-new') ? 'active' : '' }}">
                        <i class="icon-align-center-horizontal"></i> New Store
                    </a>
                    <a href="{{ route('store-history') }}" class="dropdown-item {{ Request::is('admin/store-history') ? 'active' : '' }}">
                        <i class="icon-align-center-horizontal"></i> Store History
                    </a>
                </div>
            </li>







            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-strategy mr-2"></i>
                    @lang('common.accounts')
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('mange-account') }}" class="dropdown-item {{ Request::is('admin/mange-account') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> New Action </a>
                    <a href="{{ route('account-history') }}" class="dropdown-item {{ Request::is('admin/account-history') ? 'active' : '' }}"><i class="icon-align-center-horizontal"></i> Account History</a>
                </div>
            </li>




            <li class="nav-item">
                <a href="{{ route('manage-instalment') }}" class="navbar-nav-link {{ Request::is('admin/manage-instalment') ? 'active' : '' }}">
                    <i class="icon-strategy mr-2"></i>
                    @lang('common.instalments')
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('manage-staff') }}" class="navbar-nav-link {{ Request::is('admin/manage-staff') ? 'active' : '' }}">
                    <i class="icon-strategy mr-2"></i>
                    @lang('common.staff')
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('salaries') }}" class="navbar-nav-link">
                    <i class="icon-align-center-horizontal"></i>
                    {{ __('sidebar.salaries') }}
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('transaction-log') }}" class="navbar-nav-link {{ (\Route::current()->getName() == 'transaction-log' ?'active':'') }}">
                    <i class="icon-strategy mr-2"></i>
                    @lang('common.log')
                </a>
            </li>

        </ul>

    </div>
</div>