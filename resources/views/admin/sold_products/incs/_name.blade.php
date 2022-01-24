
<span class="badge badge-pill badge-success" style="cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$row_object->ar_name}}">AR : {{strlen($row_object->ar_name) > 8 ? substr($row_object->ar_name, 0, 8) : $row_object->ar_name}} ...</span>
<br />
<span class="badge badge-pill badge-primary" style="cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$row_object->en_name}}">EN : {{strlen($row_object->en_name) > 8 ? substr($row_object->en_name, 0, 8) : $row_object->en_name }}</span>