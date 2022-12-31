<div class="text-center">
    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('sms_add'))
    <button class="resend-btn btn btn-xs btn-info" data-target="{{$row_object->id}}">
        <i class="resend-btn-icon fas fa-redo"></i>
        <span class="resend-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
    </button>
    @else 
    ---
    @endif
</div>