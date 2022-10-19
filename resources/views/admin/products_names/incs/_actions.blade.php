<div class="text-center">    
    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('shipping_edit'))
    <button class="edit-object btn btn-xs btn-warning" 
        data-object-id="{{$row_object->id}}"
        data-current-card="#objectsCard"    
        data-target-card="#editObjectsCard"    
    >
        <i class="fas fa-edit"></i>
    </button>
    @endif
    
    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('shipping_delete'))
    <button class="delete-object btn btn-xs btn-danger" 
        data-object-id="{{$row_object->id}}" data-object-name="{{$row_object['title']}}"
    >
        <i class="fas fa-trash-alt"></i>
    </button>
    @endif
</div>