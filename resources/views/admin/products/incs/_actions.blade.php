<div class="text-center">
    
    @if($row_object->is_composite)
    <button class="composite-object toggle-btn btn btn-xs btn-default"
        data-current-card="#objectsCard"    
        data-target-card="#createCompositeObjectCard"  
        data-object-id="{{$row_object->id}}">
        <i class="fas fa-wrench"></i>
    </button>
    @endif

    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products_show'))
    <button class="show-object btn btn-xs btn-info" data-object-id="{{$row_object->id}}">
        <i class="fas fa-eye"></i>
    </button>
    @endif

    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products_edit'))
    <button class="edit-object btn btn-xs btn-warning" 
        data-object-id="{{$row_object->id}}"
        data-current-card="#objectsCard"    
        data-target-card="#editObjectsCard"    
    >
        <i class="fas fa-edit"></i>
    </button>
    @endif
    
    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products_delete'))
    <button class="delete-object btn btn-xs btn-danger" 
        data-object-id="{{$row_object->id}}" data-object-name="{{$row_object['ar_name'] . '/' . $row_object['en_name']}}"
    >
        <i class="fas fa-trash-alt"></i>
    </button>
    @endif
</div>