<div class="text-center">
    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('sms_delete'))
    <button class="delete-object btn btn-xs btn-danger" 
        data-object-id="{{$row_object->id}}" data-object-name="{{$row_object['phone']}} sms"
    >
        <i class="fas fa-trash-alt"></i>
    </button>
    @else
        ---
    @endif
</div>