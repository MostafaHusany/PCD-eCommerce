@foreach($row_object->product->categories as $category)
<span class="badge badge-pill badge-primary">{{$category['ar_title']}}</span>
<br />
@endforeach