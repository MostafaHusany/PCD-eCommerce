@extends('layouts.admin.app')

@php 
    $is_ar = LaravelLocalization::getCurrentLocale() == 'ar'; 
@endphp

@push('page_css')
    @if($is_ar)
        @include('layouts.admin.incs._rtl')
    @endif
@endpush

@section('content')
<div dir="{{ $is_ar ? 'rtl' : 'ltr' }}" class="text-left">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('dashboard.Dashboard')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <a href="#">@lang('dashboard.Dashboard')</a>
                        </li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="newOrdersCount">0</h3>
                        <p>@lang('dashboard.New_Orders')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div><!-- /.small-box -->
            </div><!-- /.col-lg-3 -->

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><span id="ordersSales">0</span> <sup style="font-size: 20px">SR</sup></h3>
                        <p>@lang('dashboard.Sales')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div><!-- /.small-box -->
            </div><!-- /.col-lg-3 -->

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="soldProducts">0</h3>
                        <p>@lang('dashboard.Sold_Products')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div><!-- /.small-box -->
            </div><!-- /.col-lg-3 -->

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="restoredProductsCount">0</h3>
                        <p>@lang('dashboard.Restored_Products')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div><!-- /.small-box -->
            </div><!-- /.col-lg-3 -->
        </div><!-- /.row -->

        <!-- START SHOWING THE SALIES OVER THE YEAR -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title">@lang('dashboard.Sales_Over_Year') <b>{{ Date('Y') }}</b></h3>
                            </div><!-- /.col-6 --> 
                            <div class="col-6 text-right">
                                <select name="" id="getSalesYear" class="form-control">
                                @for ($y = Date('Y') ; $y >= 2022; $y--) {
                                    <option @if($y == Date('Y')) selected="selected" @endif>{{ $y }}</option>
                                @endfor
                                </select>
                            </div><!-- /.col-6 --> 
                        </div><!-- /.row -->
                    </div>

                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="orders-chart" height="200" style="display: block; width: 487px; height: 200px;" width="487" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col-lg-12-->
        </div><!-- /.row -->
        
        <!-- START ORDER STATUS -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title mt-2">@lang('dashboard.Orders_Status_Over')</h3>
                            </div>
                            <div class="col-6">
                                <select name="" id="getYearOrderStatus" class="form-control">
                                @for ($y = Date('Y') ; $y >= 2022; $y--) {
                                    <option @if($y == Date('Y')) selected="selected" @endif>{{ $y }}</option>
                                @endfor
                                </select>
                            </div><!-- /.col-6 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="orders-types" height="200" style="display: block; width: 487px; height: 200px;" width="487" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-lg-6 -->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title mt-2">@lang('dashboard.Orders_Status_Over')</h3>
                            </div><!-- /.col-6 -->
                            <div class="col-6">
                                <select id="getMonthOrderStatus" class="form-control">
                                    <option value="">-- select option --</option>
                                    @for ($m=1; $m<=12; $m++)
                                        <?php 
                                            $text_month = date('F', mktime(0,0,0,$m, 1, date('Y')));   
                                            $num_month  = date('m', mktime(0,0,0,$m, 1, date('Y')));   
                                        ?>
                                        <option value="{{ $num_month }}"
                                            @if($num_month == Date('m'))  selected="selected" @endif
                                        >{{ $text_month }}</option>
                                    @endfor
                                </select>
                            </div><!-- /.col-6 -->
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="orders-month-types" height="200" style="display: block; width: 487px; height: 200px;" width="487" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->

        <!-- SOLD ITEMS TABLE -->
        <div class="row">
            <div class="col-md-6">
                <div class="card card-boy">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title mt-2">@lang('dashboard.Top_Sold_Item_Over')</h3>
                            </div><!-- /.col-6 -->
                            <div class="col-6">
                                <select name="" id="getYearSoldProduct" class="form-control">
                                @for ($y = Date('Y') ; $y >= 2022; $y--) {
                                    <option @if($y == Date('Y')) selected="selected" @endif>{{ $y }}</option>
                                @endfor
                                </select>
                            </div><!-- /.col-6 -->
                        </div><!-- /.row --->
                    </div><!-- /.card-header --> 

                    <div class="card-body" style="height: 400px; overflow-y:scroll;">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <td>sku</td>
                                    <td>@lang('dashboard.name')</td>
                                    <td>@lang('dashboard.sold')</td>
                                    <td>@lang('dashboard.quantity')</td>
                                    <td>@lang('dashboard.storage')</td>
                                </tr>
                            </thead>
                            <tbody id="soldProductsTable">

                            </tbody>
                        </table>
                    </div><!-- /.card-body -->
                    
                </div><!-- /.card --> 
            </div><!-- /.col-md-6 -->

            <div class="col-md-6">
                <div class="card card-boy">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title mt-2">@lang('dashboard.Top_Sold_Item_Over')</h3>
                            </div><!-- /.col-6 -->
                            <div class="col-6">
                                <select name="" id="getMonthSoldProduct" class="form-control">
                                    <option value="">-- select option --</option>
                                    @for ($m=1; $m<=12; $m++)
                                        <?php 
                                            $text_month = date('F', mktime(0,0,0,$m, 1, date('Y')));   
                                            $num_month  = date('m', mktime(0,0,0,$m, 1, date('Y')));   
                                        ?>
                                        <option value="{{ $num_month }}"
                                            @if($num_month == Date('m'))  selected="selected" @endif
                                        >{{ $text_month }}</option>
                                    @endfor
                                </select>
                            </div><!-- /.col-6 -->
                        </div>
                    </div><!-- /.card-header --> 

                    <div class="card-body" style="height: 400px; overflow-y:scroll;">
                        <table class="table text-center">
                            <tr>
                                <td>sku</td>
                                <td>@lang('dashboard.name')</td>
                                <td>@lang('dashboard.sold')</td>
                                <td>@lang('dashboard.quantity')</td>
                                <td>@lang('dashboard.storage')</td>
                            </tr>
                            <tbody id="soldProductsMonthTable"><tbody>
                        </table>
                    </div><!-- /.card-body -->
                    
                </div><!-- /.card --> 
            </div><!-- /.col-md-6 -->
        </div><!-- /.row --> 

        <div class="row">
            <div class="col-md-6">
                <div class="card card-boy">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title mt-2">@lang('dashboard.Top_Restored_Item_Over')</h3>
                            </div><!-- /.col-6 -->
                            <div class="col-6">
                                <select name="restoredProductsYear" id="" class="form-control">
                                @for ($y = Date('Y') ; $y >= 2022; $y--) {
                                    <option @if($y == Date('Y')) selected="selected" @endif>{{ $y }}</option>
                                @endfor
                                </select>
                            </div><!-- /.col-6 -->
                        </div><!-- /.row --->
                    </div><!-- /.card-header --> 

                    <div class="card-body" style="height: 400px; overflow-y:scroll;">
                        <table class="table text-center">
                            <tr>
                                <td>sku</td>
                                <td>@lang('dashboard.name')</td>
                                <td>@lang('dashboard.restored')</td>
                                <td>@lang('dashboard.sold')</td>
                            </tr>
                            <tbody id="restoredProductsTable"><tbody>

                            @foreach($restoredProducts as $restoredProduct)
                            <tr>
                                <td>{{ $restoredProduct->product->sku }}</td>
                                <td>{{ $restoredProduct->product->ar_name }}</td>
                                <td>{{ $restoredProduct->total }}</td>
                                <td>{{ $restoredProduct->product->product_orders()->where('status', 1)
                                    ->where('created_at', 'like', Date('Y-').'%')->count() }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div><!-- /.card-body -->
                    
                </div><!-- /.card --> 
            </div><!-- /.col-md-6 -->

            <div class="col-md-6">
                <div class="card card-boy">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title mt-2">@lang('dashboard.Top_Restored_Item_Over') <b>{{ Date('M') }}</b></h3>
                            </div><!-- /.col-6 -->
                            <div class="col-6">
                                <select name="" id="" class="form-control">
                                @for ($m=1; $m<=12; $m++) {
                                    <?php 
                                        $month = date('F', mktime(0,0,0,$m, 1, date('Y')));   
                                    ?>
                                    <option @if($m == Date('m')) selected="selected" @endif>{{ $month }}</option>
                                @endfor
                                </select>
                            </div><!-- /.col-6 -->
                        </div>
                    </div><!-- /.card-header --> 

                    <div class="card-body" style="height: 400px; overflow-y:scroll;">
                        <table class="table text-center">
                            <tr>
                                <td>sku</td>
                                <td>@lang('dashboard.name')</td>
                                <td>@lang('dashboard.restored')</td>
                                <td>@lang('dashboard.sold')</td>
                            </tr>
                            @foreach($restoredProductsMonth as $restoredProduct)
                            <tr>
                                <td>{{ $restoredProduct->product->sku }}</td>
                                <td>{{ $restoredProduct->product->ar_name }}</td>
                                <td>{{ $restoredProduct->total }}</td>
                                <td>{{ $restoredProduct->product->product_orders()->where('status', 1)
                                    ->where('created_at', 'like', Date('Y-m-').'%')->count() }}</td>
                                <!-- <td>{{ $restoredProduct->product->storage_quantity }}</td> -->
                            </tr>
                            @endforeach
                        </table>
                    </div><!-- /.card-body -->
                    
                </div><!-- /.card --> 
            </div><!-- /.col-md-6 -->
        </div><!-- /.row --> 

        <div class="row">
            {{--
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Online Store Visitors</h3>
                                <a href="javascript:void(0);">View Report</a>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">820</span>
                                    <span>Visitors Over Time</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> 12.5%
                                    </span>
                                    <span class="text-muted">Since last week</span>
                                </p>
                            </div>

                            <div class="position-relative mb-4">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="visitors-chart" height="200" width="487" style="display: block; width: 487px; height: 200px;" class="chartjs-render-monitor"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> This Week
                                </span>
                                <span>
                                    <i class="fas fa-square text-gray"></i> Last Week
                                </span>
                            </div>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Products</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Sales</th>
                                        <th>More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Some Product
                                        </td>
                                        <td>$13 USD</td>
                                        <td>
                                            <small class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                12%
                                            </small>
                                            12,000 Sold
                                        </td>
                                        <td>
                                            <a href="#" class="text-muted">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Another Product
                                        </td>
                                        <td>$29 USD</td>
                                        <td>
                                            <small class="text-warning mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                0.5%
                                            </small>
                                            123,234 Sold
                                        </td>
                                        <td>
                                            <a href="#" class="text-muted">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Amazing Product
                                        </td>
                                        <td>$1,230 USD</td>
                                        <td>
                                            <small class="text-danger mr-1">
                                                <i class="fas fa-arrow-down"></i>
                                                3%
                                            </small>
                                            198 Sold
                                        </td>
                                        <td>
                                            <a href="#" class="text-muted">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Perfect Item
                                            <span class="badge bg-danger">NEW</span>
                                        </td>
                                        <td>$199 USD</td>
                                        <td>
                                            <small class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                63%
                                            </small>
                                            87 Sold
                                        </td>
                                        <td>
                                            <a href="#" class="text-muted">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col-lg-6 -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Sales</h3>
                                <a href="javascript:void(0);">View Report</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">$18,230.00</span>
                                    <span>Sales Over Time</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> 33.1%
                                    </span>
                                    <span class="text-muted">Since last month</span>
                                </p>
                            </div>

                            <div class="position-relative mb-4">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="sales-chart" height="200" style="display: block; width: 487px; height: 200px;" width="487" class="chartjs-render-monitor"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> This year
                                </span>
                                <span>
                                    <i class="fas fa-square text-gray"></i> Last year
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Online Store Overview</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-sm btn-tool">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-tool">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-success text-xl">
                                    <i class="ion ion-ios-refresh-empty"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <i class="ion ion-android-arrow-up text-success"></i> 12%
                                    </span>
                                    <span class="text-muted">CONVERSION RATE</span>
                                </p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-warning text-xl">
                                    <i class="ion ion-ios-cart-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                                    </span>
                                    <span class="text-muted">SALES RATE</span>
                                </p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-0">
                                <p class="text-danger text-xl">
                                    <i class="ion ion-ios-people-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <i class="ion ion-android-arrow-down text-danger"></i> 1%
                                    </span>
                                    <span class="text-muted">REGISTRATION RATE</span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div><!-- /.col-lg-6 -->
            --}}
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div>
@endsection

@push('page_scripts')
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script>

    $(function () {
        'use strict'

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        };
        var mode = 'index'
        var intersect = true;

        const data = {
            sales_year         : '{{ Date("Y") }}',
            
            year_order_status  : '{{ Date("Y") }}',
            month_order_status : '{{ Date("m") }}',

            year_sold_products  : '{{ Date("Y") }}',
            month_sold_products : '{{ Date("m") }}',
        };

        const chartObjects = {
            ordersChart : new Chart($('#orders-chart'), {
                type: 'bar',
                data: {
                    labels : [],
                    datasets: [
                        {
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            data : []
                        }, 
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                callback: function(value) {
                                    if (value >= 1000) {
                                        value /= 1000
                                        value += 'k'
                                    }
                                    return ' SR ' + value
                                }
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            }),

            ordersTypes : new Chart($('#orders-types'), {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [
                        {
                            backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)', 'rgba(255, 259, 64, 0.2)'],
                            borderColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)', 'rgba(255, 259, 64, 0.2)'],
                            data: []
                        }, 
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                }
            }),

            ordersTypesMonth : new Chart($('#orders-month-types'), {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [
                        {
                            backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)', 'rgba(255, 259, 64, 0.2)'],
                            borderColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)', 'rgba(255, 259, 64, 0.2)'],
                            data: []
                        }, 
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    }
                }
            })
        };
        
        $('#getSalesYear').change(function () {
            let year_val = data.sales_year = $(this).val();

            axios.get('{{ route("admin.dashboard") }}', {
                params : { 
                    is_ajax : true,
                    salies_over_year : true,
                    date    : year_val
                }
            }).then(res => {
                let { data, success } = res.data;
                
                updateTotals(data.totals);
                updateChart(chartObjects.ordersChart, data.salies_over_year, {label :'new_date', data : 'data'});
            });
        });

        $('#getYearOrderStatus').change(function () {
            $('#getMonthOrderStatus').val('');

            let year_val = data.year_order_status = $(this).val();
            axios.get('{{ route("admin.dashboard") }}', {
                params : { 
                    is_ajax : true,
                    year_orders_status : true,
                    date    : year_val
                }
            }).then(res => {
                let { data, success } = res.data;
                
                updateChart(chartObjects.ordersTypes, data.year_orders_status, {label :'status_name_ar', data : 'orders_count'});
                updateChart(chartObjects.ordersTypesMonth, [], {label :'status_name_ar', data : 'orders_count'});
            });
        });

        $('#getMonthOrderStatus').change(function () {
            let month_val = data.month_order_status = $(this).val();

            if (month_val != '') {
                axios.get('{{ route("admin.dashboard") }}', {
                    params : { 
                        is_ajax : true,
                        month_orders_status : true,
                        date    : data.year_order_status + '-' + month_val
                    }
                }).then(res => {
                    let { data, success } = res.data;
                    
                    updateChart(chartObjects.ordersTypesMonth, data.month_orders_status, {label :'status_name_ar', data : 'orders_count'});
                });
            }
        });

        $('#getYearSoldProduct').change(function () {
            $('#getMonthSoldProduct').val('');
            
            let year_val = data.year_sold_products = $(this).val();
            axios.get('{{ route("admin.dashboard") }}', {
                params : { 
                    is_ajax : true,
                    sold_products : true,
                    date    : year_val
                }
            }).then(res => {
                let { data, success } = res.data;

                renderSoldProducts(data.sold_products, 'soldProductsTable');
                renderSoldProducts([], 'soldProductsMonthTable');
            });
        });

        $('#getMonthSoldProduct').change(function () {
            let month_val = data.month_sold_products = $(this).val();

            if (month_val != '') {
                axios.get('{{ route("admin.dashboard") }}', {
                    params : { 
                        is_ajax : true,
                        sold_products_month : true,
                        date    : data.year_sold_products + '-' + month_val
                    }
                }).then(res => {
                    let { data, success } = res.data;

                    renderSoldProducts(data.sold_products_month, 'soldProductsMonthTable');
                });
            }
        });

        
        // update chart data
        function updateChart (chartObj, dataObj, keys) {
            let labels = [];
            let values = [];

            dataObj.forEach(orderTypeObje => {
                labels.push(orderTypeObje[keys.label]);
                values.push(orderTypeObje[keys.data]);
            });

            chartObj.data.labels = labels;
            chartObj.data.datasets[0].data = values;
            chartObj.update();
        }

        function updateTotals (totalsObj) {
            Object.keys(totalsObj).forEach(key => {
                $(`#${key}`).text(Math.round(Number(totalsObj[key])));
            });
        }

        function renderSoldProducts (sold_products, table_id) {
            // sold_products
            let tableContent = '';

            sold_products.forEach(product => {
                tableContent += `
                    <tr>
                        <td>${ product.product.sku }</td>
                        <td>${ product.product.ar_name }</td>
                        <td>${ product.total }</td>
                        <td>${ product.product.quantity }</td>
                        <td>${ product.product.storage_quantity }</td>
                    </tr>
                `;
            });

            $(`#${table_id}`).html(tableContent);
        }

        function renderRestoredProducts (restored_products, table_id) {
            let tableContent = '';

            restored_products.forEach(product => {
                tableContent += ``;
            });

            $(`#${table_id}`).html(tableContent);
        }

        // After app loading send request and get all charts data
        function initateChartData () {
            axios.get("{{ route('admin.dashboard') }}", {
                params : {
                    is_ajax  : true,
                    all_data : true
                }
            })
            .then(res => {
                let { data, success } = res.data;
                
                if (success) {
                    updateTotals(data.totals);
                    updateChart(chartObjects.ordersChart, data.salies_over_year, {label :'new_date', data : 'data'});
                    updateChart(chartObjects.ordersTypes, data.year_orders_status, {label :'status_name_ar', data : 'orders_count'});
                    updateChart(chartObjects.ordersTypesMonth, data.month_orders_status, {label :'status_name_ar', data : 'orders_count'});
                    
                    renderSoldProducts(data.sold_products, 'soldProductsTable');
                    renderSoldProducts(data.sold_products_month, 'soldProductsMonthTable');
                }

            });
        }

        initateChartData();
    });

    $(function () {
        $('#orderTypesMonth').change(function () {
            let val = $(this).val();

            if (Boolean(val)) {

            }
        });
    })
</script>
@endpush