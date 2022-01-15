<div class="text-center">

    <button class="show-object btn btn-xs btn-info" data-object-id="{{$row_object->order_id}}">
        <i class="fas fa-eye"></i>
    </button>
    
    <button class="edit-object btn btn-xs btn-warning" 
        data-object-id="{{$row_object->id}}"
        data-current-card="#objectsCard"    
        data-target-card="#editObjectsCard"    
    >
        <i class="fas fa-edit"></i>
    </button>
    
    @if($row_object->status === 1)
    <button class="restore-object btn btn-xs btn-default" 
        data-object-id="{{$row_object->id}}" data-object-name="{{$row_object['ar_name'] . '/' . $row_object['en_name']}}"
    >
        <i class="fas fa-recycle"></i>
    </button>
    @endif

    <button class="delete-object btn btn-xs btn-danger" 
        data-object-id="{{$row_object->id}}" data-object-name="{{$row_object['ar_name'] . '/' . $row_object['en_name']}}"
    >
        <i class="fas fa-trash-alt"></i>
    </button>

</div>