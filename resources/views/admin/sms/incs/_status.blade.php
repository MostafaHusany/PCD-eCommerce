<div class="text-center">
    @if($row_object->status == 1)
    <span class="badge badge-success">Success</span>
    @elseif($row_object->status == -1)
    <span class="badge badge-danger">Failed</span>
    @else
    <span class="badge badge-dark">No Response</span>
    @endif
</div>