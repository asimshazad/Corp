@extends('layouts.staff')

@section('content')


    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Account Statistic</h4>
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
                            <div class="row">

                                <div class="col-xl-3 col-lg-6 col-12">
                                    <div class="card bg-gradient-directional-primary">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body white text-left">
                                                        <h3>{{ $basic->symbol }}{{ $basic->balance }}</h3>
                                                        <span class="font-weight-bold text-uppercase">Current Cash</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <i class="ft ft-credit-card white font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12">
                                    <div class="card bg-gradient-directional-danger">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body white text-left">
                                                        <h3>{{ $basic->symbol }}{{ $total_expense }}</h3>
                                                        <span class="font-weight-bold text-uppercase">Total Expense</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <i class="ft ft-cloud-lightning white font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12">
                                    <div class="card bg-gradient-directional-grey-blue">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body white text-left">
                                                        <h3>{{ $total_sell }}+</h3>
                                                        <span class="font-weight-bold text-uppercase">Total Sell</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <i class="ft ft-bar-chart-2 white font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12">
                                    <div class="card bg-gradient-directional-success">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body white text-left">
                                                        <h3>{{ $companyCount }}+</h3>
                                                        <span class="font-weight-bold text-uppercase">Total Company</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <i class="ft ft-briefcase white font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Store Statistic</h4>
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
                            <div class="row">

                                <div class="col-xl-3 col-lg-6 col-12">
                                    <div class="card bg-gradient-directional-blue-grey">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body white text-left">
                                                        <h3>{{ $categoryCount }}+</h3>
                                                        <span class="font-weight-bold text-uppercase">Total Category</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <i class="ft ft-grid white font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12">
                                    <div class="card bg-gradient-directional-blue">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body white text-left">
                                                        <h3>{{ $customer }}</h3>
                                                        <span class="font-weight-bold text-uppercase">Total Customer</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <i class="ft ft-users white font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12">
                                    <div class="card bg-gradient-directional-grey-blue">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body white text-left">
                                                        <h3>{{ $productCount }}+</h3>
                                                        <span class="font-weight-bold text-uppercase">Total Product</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <i class="ft ft-box white font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12">
                                    <div class="card bg-gradient-directional-purple">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body white text-left">
                                                        <h3>{{ $stockCount }} items</h3>
                                                        <span class="font-weight-bold text-uppercase">Stock Product</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <i class="ft ft-layers white font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->


@stop
@section('scripts')

    <script type="text/javascript" src="{{ asset('assets/admin/js/Chart.min.js') }}"></script>

@endsection