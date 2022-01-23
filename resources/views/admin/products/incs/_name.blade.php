
<span class="badge badge-pill badge-success">AR : {{strlen($row_object->ar_name) > 8 ? substr($row_object->ar_name, 0, 8) : $row_object->ar_name}} ...</span>
<br />
<span class="badge badge-pill badge-primary">EN : {{strlen($row_object->en_name) > 8 ? substr($row_object->en_name, 0, 8) : $row_object->en_name }}</span>