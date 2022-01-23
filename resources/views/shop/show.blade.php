@extends('layouts.shop.app')

@push('custome-css')
@endpush

@section('content')
<div class="row">
    <div class="col-4">
        <img class="img-thumbnail" src="{{ url('/') . '/' . $target_product->main_image }}" alt="{{$target_product[LaravelLocalization::getCurrentLocale() . '_name']}}">
    </div>
    <div class="col-8">
        <div class="card" style="min-height: 100%">
            <div class="card-body">
                <h4 class="card-title">{{$target_product[LaravelLocalization::getCurrentLocale() . '_name']}}</h4>
                
                <hr/>

                <p class="card-text">{{ $target_product[LaravelLocalization::getCurrentLocale() . '_small_description'] }}</p>
                <p class="card-text">{{ $target_product[LaravelLocalization::getCurrentLocale() . '_description'] }}</p>

                <h5 class="card-text text-warning">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </h5>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn !btn-sm btn-outline-secondary">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button type="button" class="btn !btn-sm btn-outline-secondary">
                            <i class="fas fa-thumbs-up"></i>
                        </button>
                    </div>
                    <h4 class="text-muted">9 دقائق</h4>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->

<hr/>

<div class="row"></div>
@endsection

@push('custome-js')
@endpush