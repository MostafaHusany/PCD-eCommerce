<div class="text-center">
    @if($row_object->status_obj)
    <span style="color: {{ $row_object->status_obj->color }}">{{ $row_object->status_obj->status_name_en }}</span>
    @else
    <span>{{ $row_object->status }}</span>
    @endif
</div>