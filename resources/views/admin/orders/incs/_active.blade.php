<div class="custom-control custom-switch">
  <input class="c-activation-btn custom-control-input" id="customSwitch{{ $row_object->user->id }}" data-user-target="{{ $row_object->user->id }}" type="checkbox" @if($row_object->user->email_verified_at) checked="true" @endif>
  <label class="custom-control-label" for="customSwitch{{ $row_object->user->id }}"></label>
</div>