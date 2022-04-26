<div class="text-center">
    <div class="dropdown">
        <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
            <i class="nav-icon fas fa-flag"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach(order_status() as $order_status)
            <a style="color: {{$order_status->color}}" class="dropdown-item change-order-status-btn" href="#" data-id="{{ $row_object->id }}" data-status="{{$order_status->status_code}}">{{$order_status->status_name}}</a>
            @endforeach
        </div>
    </div>
</div>