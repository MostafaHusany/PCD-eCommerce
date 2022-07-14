@extends('layouts.admin.app')


@section('content')
@php
$object_title = 'User';
@endphp
{{--
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">
                        <a href="#">Dashboard</a>
                    </li>
                </ol>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->
--}}

<div class="container-fluid mt-4">

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $newOrdersCount }}</h3>
                    <p>New Orders</p>
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
                    <h3>{{ round($ordersSales) }} <sup style="font-size: 20px">SR</sup></h3>
                    <p>Sales</p>
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
                    <h3>{{ $soldProducts }}</h3>
                    <p>Sold Products</p>
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
                    <h3>{{ $restoredProductsCount }}</h3>
                    <p>Restored Products</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div><!-- /.small-box -->
        </div><!-- /.col-lg-3 -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title">Sales Over Year <b>{{ Date('Y') }}</b></h3>
                        </div><!-- /.col-6 --> 
                        <div class="col-6 text-right">
                            <select name="" id="" class="form-control">
                            @for ($m=2022; $m<=2022; $m++) {
                                <?php 
                                    $month = date('F', mktime(0,0,0,$m, 1, date('Y')));   
                                ?>
                                <option @if($m == Date('Y')) selected="selected" @endif>{{ $m }}</option>
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

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title mt-2">Orders Status Over {{ Date('Y') }}</h3>
                        </div>
                        <div class="col-6">
                            <select name="" id="" class="form-control">
                            @for ($m=2022; $m<=2022; $m++) {
                                <?php 
                                    $month = date('F', mktime(0,0,0,$m, 1, date('Y')));   
                                ?>
                                <option @if($m == Date('Y')) selected="selected" @endif>{{ $m }}</option>
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

                    <div>
                        @foreach($orderStatus as $index => $status)
                        <span class="badge badge-pill badge-default">{{ $status->status_name_en }} : {{ $status->orders_count }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!-- /.col-lg-6 -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title mt-2">Orders Status Over <b>{{ Date('M') }}</b></h3>
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

                    <div>
                        @foreach($orderStatus as $index => $status)
                        <span class="badge badge-pill badge-default">{{ $status->status_name_en }} : {{ $status->orders_count }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-md-6">
            <div class="card card-boy">
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title mt-2">Top Sold Item Over <b>{{Date('Y')}}</b></h3>
                        </div><!-- /.col-6 -->
                        <div class="col-6">
                            <select name="" id="" class="form-control">
                            @for ($m=2022; $m<=2022; $m++) {
                                <?php 
                                    $month = date('F', mktime(0,0,0,$m, 1, date('Y')));   
                                ?>
                                <option @if($m == Date('Y')) selected="selected" @endif>{{ $m }}</option>
                            @endfor
                            </select>
                        </div><!-- /.col-6 -->
                    </div><!-- /.row --->
                </div><!-- /.card-header --> 

                <div class="card-body" style="height: 400px; overflow-y:scroll;">
                    <table class="table text-center">
                        <tr>
                            <td>sku</td>
                            <td>name</td>
                            <td>sold</td>
                            <td>quantity</td>
                            <td>storage</td>
                        </tr>

                        @foreach($soldeProducts as $soldeProduct)
                        <tr>
                            <td>{{ $soldeProduct->product->sku }}</td>
                            <td>{{ $soldeProduct->product->ar_name }}</td>
                            <td>{{ $soldeProduct->total }}</td>
                            <td>{{ $soldeProduct->product->quantity }}</td>
                            <td>{{ $soldeProduct->product->storage_quantity }}</td>
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
                            <h3 class="card-title mt-2">Top Sold Item Over <b>{{ Date('M') }}</b></h3>
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
                            <td>name</td>
                            <td>sold</td>
                            <td>quantity</td>
                            <td>storage</td>
                        </tr>
                        @foreach($soldeProductsMonth as $soldeProduct)
                        <tr>
                            <td>{{ $soldeProduct->product->sku }}</td>
                            <td>{{ $soldeProduct->product->ar_name }}</td>
                            <td>{{ $soldeProduct->total }}</td>
                            <td>{{ $soldeProduct->product->quantity }}</td>
                            <td>{{ $soldeProduct->product->storage_quantity }}</td>
                        </tr>
                        @endforeach
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
                            <h3 class="card-title mt-2">Top Restored Item Over <b>{{Date('Y')}}</b></h3>
                        </div><!-- /.col-6 -->
                        <div class="col-6">
                            <select name="" id="" class="form-control">
                            @for ($m=2022; $m<=2022; $m++) {
                                <?php 
                                    $month = date('F', mktime(0,0,0,$m, 1, date('Y')));   
                                ?>
                                <option @if($m == Date('Y')) selected="selected" @endif>{{ $m }}</option>
                            @endfor
                            </select>
                        </div><!-- /.col-6 -->
                    </div><!-- /.row --->
                </div><!-- /.card-header --> 

                <div class="card-body" style="height: 400px; overflow-y:scroll;">
                    <table class="table text-center">
                        <tr>
                            <td>sku</td>
                            <td>name</td>
                            <td>restored</td>
                            <td>sold</td>
                        </tr>

                        @foreach($restoredProducts as $restoredProduct)
                        <tr>
                            <td>{{ $restoredProduct->product->sku }}</td>
                            <td>{{ $restoredProduct->product->ar_name }}</td>
                            <td>{{ $restoredProduct->total }}</td>
                            <td>{{ $restoredProduct->product->product_orders()->where('status', 1)
                                ->where('created_at', 'like', Date('Y-').'%')->count() }}</td>
                            <!-- <td>{{ $restoredProduct->product->storage_quantity }}</td> --> -->
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
                            <h3 class="card-title mt-2">Top Restored Item Over <b>{{ Date('M') }}</b></h3>
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
                            <td>name</td>
                            <td>restored</td>
                            <td>sold</td>
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
        var intersect = true

        var $ordersChart = $('#orders-chart')
        var ordersChart = new Chart($ordersChart, {
            type: 'bar',
            data: {
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [
                    {
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        // data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
                        data : [
                            @foreach($saliesOverYearF as $sale)
                                {{ $sale }},
                            @endforeach
                        ]
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
                                return '$' + value
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
        });

        var $ordersTypes = $('#orders-types');
        var ordersTypes = new Chart($ordersTypes, {
            type: 'pie',
            data: {
                labels: [
                    @foreach($orderStatus as $index => $status)
                        '{{ $status->status_name_en }}',
                    @endforeach
                ],
                datasets: [
                    {
                        backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)', 'rgba(255, 259, 64, 0.2)'],
                        borderColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)', 'rgba(255, 259, 64, 0.2)'],
                        data: [
                            @foreach($orderStatus as $index => $status)
                                '{{ $status->orders_count }}',
                            @endforeach
                        ]
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
        });

        var $ordersMonthTypes = $('#orders-month-types');
        var ordersTypes = new Chart($ordersMonthTypes, {
            type: 'pie',
            data: {
                labels: [
                    @foreach($orderStatus as $index => $status)
                        '{{ $status->status_name_en }}',
                    @endforeach
                ],
                datasets: [
                    {
                        backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)', 'rgba(255, 259, 64, 0.2)'],
                        borderColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)', 'rgba(255, 259, 64, 0.2)'],
                        data: [
                            @foreach($orderStatus as $index => $status)
                                '{{ $status->orders_count }}',
                            @endforeach
                        ]
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
        });
        
    });

    $(function() {
        'use strict'
        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }
        var mode = 'index'
        var intersect = true
        var $salesChart = $('#sales-chart')
        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: {
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [
                    {
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        // data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
                        data : [
                            @foreach($saliesOverYearF as $sale)
                                {{ $sale }},
                            @endforeach
                        ]
                    }, 
                    // {
                    //     backgroundColor: '#ced4da',
                    //     borderColor: '#ced4da',
                    //     data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
                    // }
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
                                return '$' + value
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
        })
        var $visitorsChart = $('#visitors-chart')
        var visitorsChart = new Chart($visitorsChart, {
            data: {
                labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                datasets: [{
                    type: 'line',
                    data: [100, 120, 170, 167, 180, 177, 160],
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    pointBorderColor: '#007bff',
                    pointBackgroundColor: '#007bff',
                    fill: false
                }, {
                    type: 'line',
                    data: [60, 80, 70, 67, 80, 77, 100],
                    backgroundColor: 'tansparent',
                    borderColor: '#ced4da',
                    pointBorderColor: '#ced4da',
                    pointBackgroundColor: '#ced4da',
                    fill: false
                }]
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
                            suggestedMax: 200
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
        })
    });
</script>
@endpush