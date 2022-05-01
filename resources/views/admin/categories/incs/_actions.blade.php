<div class="text-center">
    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products-categories_show'))
    <button class="show-object btn btn-xs btn-info" data-object-id="{{$row_object->id}}">
        <i class="fas fa-eye"></i>
    </button>
    @endif
    
    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products-categories_edit'))
    <button class="edit-object btn btn-xs btn-warning" 
        data-object-id="{{$row_object->id}}"
        data-current-card="#objectsCard"    
        data-target-card="#editObjectsCard"    
    >
        <i class="fas fa-edit"></i>
    </button>
    @endif
    
    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products-categories_delete'))
    <button class="delete-object btn btn-xs btn-danger" 
        data-object-id="{{$row_object->id}}" data-object-name="{{$row_object['ar_title'] . '/' . $row_object['en_title']}}"
    >
        <i class="fas fa-trash-alt"></i>
    </button>
    @endif
</div>