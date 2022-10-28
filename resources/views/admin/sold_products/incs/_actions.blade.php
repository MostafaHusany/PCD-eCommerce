{{--
<div class="text-center">
    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('orders_show'))    
    <button class="show-object btn btn-xs btn-info" data-object-id="{{$row_object->order_id}}">
        <i class="fas fa-eye"></i>
    </button>
    @endif
    
    <!-- There is no edit for sold products -->
    <!-- <button class="edit-object btn btn-xs btn-warning" 
        data-object-id="{{$row_object->id}}"
        data-current-card="#objectsCard"    
        data-target-card="#editObjectsCard"    
    >
        <i class="fas fa-edit"></i>
    </button> -->
    
    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('sold_products_edit'))    
        @if($row_object->status === 1)
        <button class="restore-object btn btn-xs btn-default" 
            data-object-id="{{$row_object->id}}" data-object-name="{{$row_object['ar_name'] . '/' . $row_object['en_name']}}"
        >
            <i class="fas fa-recycle"></i>
        </button>
        @endif
    @endif

    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('sold_products_delete'))    
    <button class="delete-object btn btn-xs btn-danger" 
        data-object-id="{{$row_object->id}}" data-object-name="{{$row_object['ar_name'] . '/' . $row_object['en_name']}}"
    >
        <i class="fas fa-trash-alt"></i>
    </button>
    @endif

</div>
--}}

@php 
    $is_ar = LaravelLocalization::getCurrentLocale() == 'ar'; 
@endphp

<div class="text-center">
    <div class="btn-group">
        <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-sliders-h"></i>
        </button>
        <div class="dropdown-menu {{ !$is_ar ? 'dropdown-menu-right dropdown-menu-lg-right' : 'dropdown-menu-left dropdown-menu-lg-left' }}">
            @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('orders_show'))    
            <button class="dropdown-item show-object text-info" data-object-id="{{$row_object->order_id}}"
                data-current-card="#objectsCard"    
                data-target-card="#showObjectsCard"  
                >
                <i class="fas fa-eye"></i>
                show
            </button>
            @endif 

            <div class="dropdown-divider"></div>

            @if($row_object->is_child === 0)
                @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('sold_products_edit'))
                    @if($row_object->status === 1)
                    <button class="dropdown-item restore-object btn-default" 
                        data-object-id="{{$row_object->id}}" data-object-name="{{$row_object['ar_name'] . '/' . $row_object['en_name']}}"
                    >
                        <i class="fas fa-recycle"></i>
                        restore
                    </button>
                    @endif
                @endif
            @endif

            @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('sold_products_delete'))
            <button class="dropdown-item delete-object text-danger" 
                data-object-id="{{$row_object->id}}" data-object-name="{{$row_object['ar_name'] . '/' . $row_object['en_name']}}"
            >
                <i class="fas fa-trash-alt"></i>
                delete
            </button>
            @endif

        </div>
    </div>
</div>
