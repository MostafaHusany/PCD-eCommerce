<div class="custom-control custom-switch">
  <input class="c-activation-btn custom-control-input" id="customSwitch{{ $row_object->id }}" data-user-target="{{ $row_object->id }}" type="checkbox" @if($row_object->is_active) checked="true" @endif>
  <label class="custom-control-label" for="customSwitch{{ $row_object->id }}"></label>
</div>