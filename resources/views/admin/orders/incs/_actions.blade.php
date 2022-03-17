{{--
<div class="text-center">
    <button class="show-object btn btn-xs btn-info" data-object-id="{{$row_object->id}}">
        <i class="fas fa-eye"></i>
    </button>
    
    <button class="edit-object btn btn-xs btn-warning" 
        data-object-id="{{$row_object->id}}"
        data-current-card="#objectsCard"    
        data-target-card="#editObjectsCard"    
    >
        <i class="fas fa-edit"></i>
    </button>
    
    <button class="delete-object btn btn-xs btn-danger" 
        data-object-id="{{$row_object->id}}" data-object-name="{{$row_object->code}}"
    >
        <i class="fas fa-trash-alt"></i>
    </button>

    @if($row_object->status !== -1)
    <button class="restore-object btn btn-xs btn-default" 
        data-object-id="{{$row_object->id}}" data-object-name="{{$row_object->code}}"
    >
        <!-- <i class="fas fa-trash-alt"></i> -->
        <i class="fas fa-recycle"></i>
    </button>
    @endif
</div>
--}}

<div class="text-center">
    <div class="btn-group">
        <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-sliders-h"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
            <button class="dropdown-item show-object text-info" data-object-id="{{$row_object->id}}"
                data-current-card="#objectsCard"    
                data-target-card="#showObjectsCard"  
                >
                <i class="fas fa-eye"></i>
                show
            </button>

            <button class="dropdown-item edit-object text-warning" 
                data-object-id="{{$row_object->id}}"
                data-current-card="#objectsCard"    
                data-target-card="#editObjectsCard"    
            >
                <i class="fas fa-edit"></i>
                edit
            </button>

            <button class="dropdown-item show-invoice text-success" 
                data-object-id="{{$row_object->id}}"
                data-current-card="#objectsCard"    
                data-target-card="#invoiceObjectsCard"    
            >
                <i class="fas fa-file-invoice-dollar"></i>
                invoice
            </button>

            <div class="dropdown-divider"></div>

            @if($row_object->status !== -1)
            <button class="dropdown-item restore-object btn-default" 
                data-object-id="{{$row_object->id}}" data-object-name="{{$row_object->code}}"
            >
                <i class="fas fa-recycle"></i>
                restore
            </button>
            @endif

            <button class="dropdown-item delete-object text-danger" 
                data-object-id="{{$row_object->id}}" data-object-name="{{$row_object->code}}"
            >
                <i class="fas fa-trash-alt"></i>
                delete
            </button>
        </div>
    </div>
</div>
