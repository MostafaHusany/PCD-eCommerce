@if(isset($row_object->icon))
<div class="text-center">
    <div style="background-color: #ddd; border-radius: 20px; display: inline-block">
        <img width="50px" src="{{ asset('images/Icons/') . '/' . $row_object->icon }}" />
    </div>
</div>
@else 
---
@endif