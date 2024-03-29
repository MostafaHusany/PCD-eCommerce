<div class="text-center">
    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('brands_edit'))
    <button class="edit-object btn btn-xs btn-warning" 
        data-object-id="{{$row_object->id}}"
        data-current-card="#objectsCard"    
        data-target-card="#editObjectsCard"    
    >
        <i class="fas fa-edit"></i>
    </button>
    @endif
    
    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('brands_delete'))
    <button class="delete-object btn btn-xs btn-danger" 
        data-object-id="{{$row_object->id}}" data-object-name="{{$row_object['ar_title'] . '/' . $row_object['en_title']}}"
    >
        <i class="fas fa-trash-alt"></i>
    </button>
    @endif
</div>