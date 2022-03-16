@extends('layouts.shop.app')

@section('title')
Thanks page
@endsection

@section('content')
@include('shop.incs.breadcramp', [
'name' => 'Thanks page',
])

<!-- START MAIN CONTENT -->
<div class="main_content">
    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container text-center">
            <div class="row">
                <h4>Your order has received and management will contact with you soon </h4>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
@endsection