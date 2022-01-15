@if ($row_object->status === 1)
<span class="badge badge-pill badge-success">Sold</span>
@else 
<span class="badge badge-pill badge-danger">Restored</span>
@endif