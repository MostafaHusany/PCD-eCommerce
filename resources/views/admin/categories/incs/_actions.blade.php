<div class="text-center">
    <div class="btn-group">
        <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-sliders-h"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">

            @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products-categories_show'))
            <button class="dropdown-item show-object text-info" data-object-id="{{$row_object->id}}">
                <i class="fas fa-eye"></i>
                    show
            </button>
            @endif

            @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products-categories_edit'))
            <button class="dropdown-item edit-object text-warning" 
                data-object-id="{{$row_object->id}}"
                data-current-card="#objectsCard"    
                data-target-card="#editObjectsCard"    
            >
                <i class="fas fa-edit"></i>
                edit
            </button>
            @endif

            @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products-categories_edit'))
            <button class="dropdown-item custome-object text-default" 
                data-object-id="{{$row_object->id}}"
                !data-current-card="#objectsCard"    
                !data-target-card="#customeObjectCard"    
            >
                <i class="fas fa-sliders-h"></i>
                attributes
            </button>
            @endif



            <div class="dropdown-divider"></div>

            @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products-categories_delete'))
            <button class="dropdown-item delete-object text-danger" 
                data-object-id="{{$row_object->id}}" data-object-name="{{$row_object['ar_title'] . '/' . $row_object['en_title']}}"
            >
                <i class="fas fa-trash-alt"></i>
                delete
            </button>
            @endif
        </div><!-- /.dropdown-menu -->
    </div><!-- /.btn-group -->
</div><!-- /.text-center -->

