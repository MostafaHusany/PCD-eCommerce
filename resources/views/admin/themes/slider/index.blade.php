@extends('layouts.admin.app')


@push('page_css')
<style>
.categories_menu {
    /* width: 229px; */
    width: 22.5%;
}

.categories-list {
    min-height: 400px;
    /* min-height: 200px; */
    padding: 5px;
    border: 1px solid #aaa;
    box-shadow: 0px 5px 10px rgb(0 0 0 / 10%);
    width: 100%;
}

.categories-list ul {
    list-style: none;
    padding: 0;
    margin: 10px 5px;
    font-size: 14px;
}

.categories-list .show-sub {
    float: right;
    margin-top: 5px;
}

.categories-btn {
    background-color: #000;
    border: 1px solid #000;
    padding: 13px 15px;
    color: #fff;
    text-align: left;
    width: 100%;
    color: #fff;
    text-transform: uppercase;
    ;
}

.categories-btn span {
    font-weight: bold;
}

.categories-btn:hover {
    color: #fff;
}

.category-icon {
    font-size: 1.3rem;
    margin-right: 0;
    float: right;
}

.nav-menu {
    height: 55px;
    width: 100%;
}

</style>
@endpush

@section('content')
@php
$object_title = 'Cover Editor';
@endphp

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{$object_title}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item active">
                        {{$object_title}}s
                    </li>
                </ol>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<div id="selectNavbarCategories" class="card card-body">
    
    <div>

        <div id="createForm" class="clearfix">
            <div class="row">
                <div class="col-6">
                    <h5>Create Slider</h5>
                </div>
                <div class="col-6 text-right">
                </div>
            </div><!-- /.row -->

            <hr />
            
            <div class="form-group row"> 
                <label for="sliderImage" class="col-sm-2 col-form-label">Select Image</label>
                <div class="col-sm-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="sliderImage" aria-describedby="inputGroupFileAddon04">
                        <label class="custom-file-label" for="sliderImage">Choose image</label>
                    </div>
                    <div style="padding: 5px 7px; display: none" id="sliderImageErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>

                <label for="sliderOrder" class="col-sm-1 col-form-label">Order</label>
                <div class="col-sm-5">
                    <div class="form-group">
                        <input type="number" min="1" value="1" class="form-control" id="sliderOrder">
                    </div>
                    <div style="padding: 5px 7px; display: none" id="sliderOrderErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div><!-- /.form-group -->

            <div class="form-group row"> 
                <label for="linkType" class="col-sm-2 col-form-label">Link Type</label>
                <div class="col-sm-8">
                    <select disabled="disabled" type="text" tabindex="1" class="form-control" id="linkType">
                        <option value="">-- select link type --</option>
                        <option value="product">product</option>
                        <option value="category">category</option>
                        <option value="externalLink">external link</option>
                    </select>
                    <div style="padding: 5px 7px; display: none" id="linkTypeErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="isClickable">
                        <label class="custom-control-label" for="isClickable">Is clickable</label>
                    </div>
                </div>
            </div><!-- /.form-group -->

            <div style="display: none;" class="category-link form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select type="text" tabindex="1" class="form-control" id="category">
                        <option value="">-- select category --</option>
                        @foreach($all_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->ar_title . ' || ' . $category->ar_title }}</option>
                        @endforeach
                    </select>
                    <div style="padding: 5px 7px; display: none" id="categoryErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div>
            
            <div style="display: none;" class="products-link form-group row">
                <label for="product" class="col-sm-2 col-form-label">Product</label>
                <div class="col-sm-10">
                    <select type="text" tabindex="1" class="form-control" id="product"></select>
                    <div style="padding: 5px 7px; display: none" id="productErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div>

            <div style="display: none;" class="external-link form-group row">
                <div class="col-2">
                    <label for="" class="form-label">External Link</label>
                </div>
                
                <div class="col-10">
                    <div class="form-group">
                        <input id="externalLink" type="url" placeholder="link url" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="externalLinkErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-5 -->

            </div><!-- /.form-group -->
            
            <button !disabled="disabled" id="addLink" class="btn btn-primary float-right">Add Link</button>
        </div>

        <div id="editForm" style="display: none;" class="clearfix" >
            <div class="row">
                <div class="col-6">
                    <h5>Edit Slider</h5>
                </div>
                <div class="col-6 text-right">
                    <div id="closeEditForm" class="toggle-btn btn btn-default btn-sm" data-current-card="#selectNavbarCategories"
                        data-target-card="#objectsCard">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            </div><!-- /.row -->

            <hr />

            <div class="form-group row"> 
                <label for="edit-sliderImage" class="col-sm-2 col-form-label">Select Image</label>
                <div class="col-sm-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="edit-sliderImage" aria-describedby="inputGroupFileAddon04">
                        <label class="custom-file-label" for="edit-sliderImage">Choose image</label>
                    </div>
                    <div style="padding: 5px 7px; display: none" id="edit-sliderImageErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>

                <label for="edit-sliderOrder" class="col-sm-1 col-form-label">Order</label>
                <div class="col-sm-5">
                    <div class="form-group">
                        <input type="number" min="1" value="1" class="form-control" id="edit-sliderOrder">
                    </div>
                    <div style="padding: 5px 7px; display: none" id="edit-sliderOrderErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div><!-- /.form-group -->

            <div class="form-group row"> 
                <label for="edit-linkType" class="col-sm-2 col-form-label">Link Type</label>
                <div class="col-sm-8">
                    <select data-edit="true" disabled="disabled" type="text" tabindex="1" class="form-control" id="edit-linkType">
                        <option value="">-- select link type --</option>
                        <option value="product">product</option>
                        <option value="category">category</option>
                        <option value="externalLink">external link</option>
                    </select>
                    <div style="padding: 5px 7px; display: none" id="edit-linkTypeErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="custom-control custom-switch mt-2">
                        <input data-edit="true" type="checkbox" class="custom-control-input" id="edit-isClickable">
                        <label class="custom-control-label" for="edit-isClickable">Is clickable</label>
                    </div>
                </div>
            </div><!-- /.form-group -->

            <div style="display: none;" class="edit-category-link form-group row">
                <label for="edit-category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select type="text" tabindex="1" class="form-control" id="edit-category">
                        <option value="">-- select category --</option>
                        @foreach($all_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->ar_title . ' || ' . $category->ar_title }}</option>
                        @endforeach
                    </select>
                    <div style="padding: 5px 7px; display: none" id="edit-categoryErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div>
            
            <div style="display: none;" class="edit-products-link form-group row">
                <label for="edit-product" class="col-sm-2 col-form-label">Product</label>
                <div class="col-sm-10">
                    <select type="text" tabindex="1" class="form-control" id="edit-product"></select>
                    <div style="padding: 5px 7px; display: none" id="edit-productErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div>

            <div style="display: none;" class="edit-external-link form-group row">
                <div class="col-2">
                    <label for="externalLink" class="form-label">External Link</label>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <input id="edit-externalLink" type="url" placeholder="link url" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="edit-externalLinkErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-5 -->

            </div><!-- /.form-group -->
            
            <button !disabled="disabled" id="editLink" class="btn btn-warning float-right">Edit Slider</button>
        </div>

        <hr />

        <div id="successAlert" style="display: none" class="alert alert-success"></div>
        
        <div id="dangerAlert"  style="display: none" class="alert alert-danger"></div>
            
        <div id="warningAlert" style="display: none" class="alert alert-warning"></div>
        
        <div class="d-flex justify-content-center mb-3">
            <div id="loddingSpinner" style="display: none" class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <!-- load the look of the navbar -->
        <div class="form-group">
            <div style="background: #fff; min-height: 400px; border: 1px solid #ddd" class="p-4 look-container">
                <div class="custome-nav d-flex">
                    <div class="categories_menu">
                        <div class="btn categories-btn">
                            <span>All Categories </span>
                            <i class="category-icon fas fa-bars"></i>
                        </div>
                    </div><!-- /.categories_menu -->
                    <nav class="nav-menu navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul id="linksContainer" class="navbar-nav">
                            </ul>
                        </div>
                    </nav>
                </div><!-- /.custome-nav -->

                <div class="row">
                    <!-- START CATEGORY LIST -->
                    <div style="display: none; !width: 18% !important; margin: 0 8px; margin-top: 5px; float: left;">
                        <div class="categories-list">
                            <ul>

                            </ul>
                        </div>
                    </div>

                    <!-- START SLIDER LIST -->
                    <div style="width: 99.9%; margin-top: 5px; position: relative;">
                        <div class="image-container">
                           
                        </div>
                        
                        <div class="slider-points"
                                style="
                                position: absolute;
                                bottom: 10px;
                                left: 25px;">
                          
                        </div>
                    </div><!-- /.image-container -->
                </div>
            </div><!-- /.look-container -->
        </div><!-- /.form-group -->

        <!-- <button id="updateNavbar" class="btn btn-warning float-right">Update Navbar Settings</button> -->
    </div>
</div>
@endsection

@push('page_scripts')
<script>
$(document).ready(function() {
    
    const Store = (() => {
        const data = {
            navbar : true,
            _token : "{{ csrf_token() }}",
            target_edit : null,
            links : [],
            slides : [
                // {
                //     id : 1,
                //     order : 1,
                //     image : "{{ asset('images/cover.png') }}",
                //     type : null,// product, category, external_link
                //     value : null
                // },
                // {
                //     id : 2,
                //     order : 2,
                //     image : "{{ asset('images/photo1.png') }}",
                //     type : 'externalLink',// product, category, externalLink
                //     value : 'google.com'
                // },
                // {
                //     id : 3,
                //     order : 3,
                //     image : "{{ asset('images/photo2.png') }}",
                //     type : null,// product, category, external_link
                //     value : null
                // }
            ]
        };
        
        const setters = {
            addLink : (new_link) => {
                new_link.id = Boolean(new_link.id) ? new_link.id : Math.round(Math.random() * 10000);
                data.links.push(new_link);
                return data.links;
            },
            setTargetForEdit : (target_edit) => {
                data.target_edit = target_edit;
            },
            updateData : (updated_link) => {
                let new_slides = [];
                updated_link.id = data.target_edit;

                data.slides.forEach(link => {
                    if (link.id == data.target_edit) {
                        updated_link.image = Boolean(updated_link.image) ? updated_link.image : link.image;  
                        new_slides.push(updated_link);
                    } else {
                        new_slides.push(link);
                    }
                });

                data.slides = new_slides;
                return data.slides;
            },
            addSlide : (newSlide) => {
                if (newSlide.order < data.slides.length) {
                    let newSlides = []; 
                    data.slides.forEach((slide, index) => {
                        if ((index + 1) == newSlide.order) {
                            newSlides.id = Boolean(newSlides.id) ? newSlides.id : Math.round(Math.random() * 10000); 
                            newSlides.push(newSlide);
                        } 

                        newSlides.push(slide);
                    });
                    
                    data.slides = newSlides;
                } else {
                    data.slides.push(newSlide);
                }
                
                return data.slides;
            },
            removeSlide : (slideId) => {
                data.slides = data.slides.filter(slide => slide.id != slideId);
                return data.slides;
            }
        };

        const getters = {
            getLinks : () => {
                return data.links;
            },
            getSlider : () => {
                return data.slides
            },
            findSlider : (slideId) => {
                return data.slides.find(slide => slide.id == slideId);
            },
            getTargetforEdit : () => {
                return data.target_edit;
            }
        };

        const helpers = {};
        
        return {
            setters,
            getters
        }
    })();

    const View = (() => {
        const fields = {
            formMode : 'create',
            linksContainer : $('#linksContainer'),
        };
        
        /**
            ['edit-sliderOrder', 'edit-linkType', 'edit-isClickable',
             'edit-category', 'edit-product', 'edit-externalLink']
         */
        const frontGetter = {
            getFormData : (is_edit = false) => {
                let isValied  = true;
                let data = new FormData();
                
                let sliderImage = document.getElementById(`${is_edit ? 'edit-' : '' }sliderImage`);
                let isClickable = $(`#${is_edit ? 'edit-' : '' }isClickable`).prop('checked');
                data.append('order', $(`#${is_edit ? 'edit-' : '' }sliderOrder`).val());

                if (sliderImage.files.length) {
                    $(`#${is_edit ? 'edit-' : '' }sliderImageErr`).text('').slideUp(500);
                    data.append('image', sliderImage.files[0])
                } else if (!is_edit) {
                    isValied = false;
                    $(`#${is_edit ? 'edit-' : '' }sliderImageErr`).text('This field is required').slideDown(500);
                }

                if (isClickable) {
                    let linkType = $(`#${is_edit ? 'edit-' : '' }linkType`).val();
                    if (Boolean(linkType)) {
                        data.append('type', linkType)
                        $(`#${is_edit ? 'edit-' : '' }linkTypeErr`).text('').slideUp(500);
                    } else {
                        isValied = false;
                        $(`#${is_edit ? 'edit-' : '' }linkTypeErr`).text('This field is required').slideDown(500);
                    }
                    
                    let value = $(`#${is_edit ? 'edit-' : '' }${linkType}`).val();
                    if (Boolean(value)) {
                        data.append('value', value) 
                        $(`#${is_edit ? 'edit-' : '' }${linkType}Err`).text('').slideUp(500);
                    } else {
                        isValied = false;
                        $(`#${is_edit ? 'edit-' : '' }${linkType}Err`).text('This field is required').slideDown(500);
                    }
                }

                if (isValied) {
                    // data.append('_token', "{{csrf_token()}}");
                    data.append('_token', $('meta[name="csrf-token"]').attr('content'));
                    is_edit && data.append('_method', "PUT");
                    data.append('slider', "true");

                    // clear fields 
                    sliderImage.value = '';
                    if (isClickable) {
                        let linkType = $('#linkType').val();
                        $(`#${is_edit ? 'edit-' : '' }sliderOrder`).val(1);
                        $(`#${is_edit ? 'edit-' : '' }linkType`).val('').trigger('change');
                        $(`#${is_edit ? 'edit-' : '' }${linkType}`).val('').trigger('change');
                        $(`#${is_edit ? 'edit-' : '' }isClickable`).prop('checked', false).trigger('change');
                    }
                }

                return isValied ? data : isValied;
            }
        };

        const frontSetter = {
            toggleIsClickableFields : (isClickable, isEdit = false) => {
                switch (isClickable) {
                    case true:
                        $(`#${isEdit ? 'edit-' : ''}linkType`).removeAttr('disabled');
                        break;
                    default :
                        $(`#${isEdit ? 'edit-' : ''}linkType`).attr('disabled', 'disabled').val('');
                        $(`.${isEdit ? 'edit-' : '' }category-link`).slideUp(500);
                        $(`.${isEdit ? 'edit-' : '' }external-link`).slideUp(500);
                }
            },
            toggleLinkTypFields : (linkType, isEdit = false) => {
                switch (linkType) {
                    case 'category':
                        $(`.${isEdit ? 'edit-' : '' }products-link`).slideUp(500);
                        $(`.${isEdit ? 'edit-' : '' }external-link`).slideUp(500);
                        $(`.${isEdit ? 'edit-' : '' }category-link`).slideDown(500);
                        break;
                    case 'externalLink':
                        $(`.${isEdit ? 'edit-' : '' }products-link`).slideUp(500);
                        $(`.${isEdit ? 'edit-' : '' }category-link`).slideUp(500);
                        $(`.${isEdit ? 'edit-' : '' }external-link`).slideDown(500);
                        break;
                    case 'product':
                        $(`.${isEdit ? 'edit-' : '' }category-link`).slideUp(500);
                        $(`.${isEdit ? 'edit-' : '' }external-link`).slideUp(500);
                        $(`.${isEdit ? 'edit-' : '' }products-link`).slideDown(500);
                        break
                    default :
                        $(`.${isEdit ? 'edit-' : '' }products-link`).slideUp(500);
                        $(`.${isEdit ? 'edit-' : '' }category-link`).slideUp(500);
                        $(`.${isEdit ? 'edit-' : '' }external-link`).slideUp(500);
                }
            },
            navRender : (nav_list) => {
                $('.nav-link-item').remove();
                nav_list.forEach(nav_link => {
                    let nav_link_li = `
                        <li class="nav-link-item nav-item active">
                            <span class="nav-link" href="#">
                                ${nav_link.title}
                            </span>
                        </li>
                    `;

                    $('#linksContainer').append(nav_link_li);
                });
            },
            slidersRender : (slidersList) => {
                $('.image-slide').remove();
                $('.image-selector').remove();
                
                slidersList.forEach((slide, index) => {
                    
                    let imgSrc = slide.image; 

                    // let img_el = `
                    // <img class="image-slide" style="width: 100%; height: 400px; ${index == 0 ? '' : 'display: none;'}" src="${imgSrc}">
                    // `;

                    let img_el = `
                    <div class="image-slide image-slide-${slide.id}" style="position: relative; ${index == 0 ? '' : 'display: none;'}">
                        <div style="position: absolute; right: 15px; top: 15px;">
                            <div class="row">
                                <div class="col-6">
                                    <button class="edit-slider btn btn-warning btn-sm" data-target="${slide.id}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="delete-slider btn btn-danger btn-sm" data-target="${slide.id}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <img style="width: 100%; height: 400px" src="${imgSrc}">
                    </div>
                    `;

                    $('.image-container').append(img_el);
                    
                    let selector = `
                    <span class="image-selector image-selector-${slide.id}"">
                        <b class="text-info">${index + 1}</b>
                        <input ${index == 0 ? 'checked="true"' : ''} class="selector-field selector-field-${slide.id}" value="${slide.id}" data-id="${slide.id}" name="selected-image" type="radio" style="margin: 0 3px;">
                    </span>
                    `;
                    
                    $('.slider-points').append(selector);
                });
            },
            setMaxOrder : (newOrder) => {
                $('#sliderOrder, #edit-sliderOrder').attr('max', newOrder);
            },
            toggleForm : (is_edit = false) => {
                $(is_edit ? '#editForm' : '#createForm').slideUp(500);
                setTimeout(() => {
                    $(is_edit ? '#createForm' : '#editForm').slideDown(500);
                }, 500);
            },
            editDataForm : (data) => {
                $('#edit-sliderOrder').val(data.order);

                if(Boolean(data.type)) {
                    $('#edit-linkType').val(data.type).trigger('change');
                    $('#edit-isClickable').prop('checked', true).trigger('change');
                }

                if (data.type == 'category') {
                    $('#edit-category').val(data.value).trigger('change');
                } else if (data.type == 'product') {
                    $('#edit-product').val(data.value).trigger('change');
                } else if (data.type == 'externalLink') {
                    $('#edit-externalLink').val(data.value).trigger('change');
                }
            },
        };

        const helpers = {};

        const pluginCall = (() => {
            $('#category, #edit-category').select2({
                width: '100%',
                placeholder: 'Select categories',
            });

            $('#product, #edit-product').select2({
                allowClear: true,
                width: '100%',
                placeholder: 'Select products, by name, id, or sku',
                ajax: {
                    url: '{{ url("admin/products-search") }}',
                    dataType: 'json',
                    delay: 150,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: `${item['en_name']} / ${item['ar_name']} , valied quantity (${item['quantity']})`,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                },
            });
        })();

        return {
            fields,
            frontGetter,
            frontSetter
        }
    })();

    const Controller = ((store, view) => {
        const inite = () => {
            
            $('#isClickable, #edit-isClickable').change(function () {
                let isClickable = $(this).prop('checked');
                let isEdit   = $(this).data('edit');

                view.frontSetter.toggleIsClickableFields(isClickable, Boolean(isEdit));
            });

            $('#linkType, #edit-linkType').change(function () {
                let linkType = $(this).val();
                let isEdit   = $(this).data('edit');

                view.frontSetter.toggleLinkTypFields(linkType, Boolean(isEdit));
            });

            $('#addLink').click(function () {
                let data = view.frontGetter.getFormData();
                
                if (Boolean(data)) {
                    // add data to the store re-render the store
                    
                    // to add data we will send the request to th server than 
                    // after the result come we append the data to the store 
                    // and re-render the slider

                    // loddingSpinner/successAlert/dangerAlert
                    $('#loddingSpinner').show(500);

                    fetch(`{{ url('admin/theme/slider') }}`, {
                        method: 'POST', // *GET, POST, PUT, DELETE, etc.
                        body : data
                    })
                    .then(res => res.json())
                    .then(res => {
                        $('#loddingSpinner').hide(500);

                        if (res.success) {
                            $('#successAlert').text('You created a new Slide Successfully').slideDown(500);
                            setTimeout(() => {
                                $('#successAlert').slideUp(500).text('');
                            }, 5000);

                            return res.data;
                        }
                    })
                    .then(res => {
                        let dataP = {
                            id : res.id,
                            image : URL.createObjectURL(data.get('image')),
                            type  : data.get('type'),// product, category, external_link
                            value : data.get('value'),
                            order : data.get('order')
                        };
                        
                        let sliderList = store.setters.addSlide(dataP);
                        view.frontSetter.setMaxOrder(sliderList.length);
                        view.frontSetter.slidersRender(sliderList);
                    });
                }
            });

            $('.slider-points').on('click', '.selector-field', function (e) {
                let selectorVal = $(this).val();
                
                $('.image-slide').css('display', "none");
                $(`.image-slide-${selectorVal}`).css('display', "");
            });

            $('.image-container').on('click', '.delete-slider', function () {
                let target_id = $(this).data('target');
                let flag = confirm('are you sure you want to delete this slide ?!');

                if (flag) {                    
                    $('#loddingSpinner').show(500);

                    fetch(`{{ url('admin/theme') }}/${target_id}`, {
                        method: 'delete',
                        headers : {
                            'Content-Type' : 'application/json'
                        },
                        body : JSON.stringify({
                            _token: "{{ csrf_token() }}"
                        }),
                    })
                    .then(res => res.json())
                    .then(res => {
                        $('#loddingSpinner').hide(500);

                        if (res.success) {
                            let sliderList = store.setters.removeSlide(target_id);
                            view.frontSetter.slidersRender(sliderList);
                            
                            $('#warningAlert').text('You deleted slide Successfully').slideDown(500);
                        }
                    });

                }
            }).on('click', '.edit-slider', function () {
                let target_id = $(this).data('target');

                /**
                 * 1- get target slide data
                 * 2- load data in the edit form
                 * 3- show edit form
                 * 
                */
                store.setters.setTargetForEdit(target_id);
                let targetSlide = store.getters.findSlider(target_id);
                view.frontSetter.editDataForm(targetSlide);
                view.frontSetter.toggleForm();
            });

            $('#closeEditForm').click(function () {
                view.frontSetter.toggleForm(true);
            });

            $('#editLink').click(function () {
                let data = view.frontGetter.getFormData(true);

                if (Boolean(data)) {
                    // add data to the store re-render the store
                    
                    // to add data we will send the request to th server than 
                    // after the result come we append the data to the store 
                    // and re-render the slider
                    // data.append('slider', true);
                    // data.append('_token', "{{ csrf_token() }}");

                    $('#loddingSpinner').show(500);

                    fetch(`{{ url('admin/theme') }}/${store.getters.getTargetforEdit()}`, {
                        method : 'POST',
                        body : data
                    })
                    .then(res => res.json())
                    .then(res => {
                        $('#loddingSpinner').hide(500);

                        if (res.success) {
                            
                            let dataP = {
                                id : Math.round(Math.random() * 10000),
                                image : Boolean(data.get('image')) ? URL.createObjectURL(data.get('image')) : null,
                                type  : data.get('type'),// product, category, external_link
                                value : data.get('value'),
                                order : data.get('order')
                            }

                            let sliderList = store.setters.updateData(dataP);
                            view.frontSetter.slidersRender(sliderList);
                            view.frontSetter.toggleForm(true);

                            $('#warningAlert').text('You updated slide Successfully').slideDown(500);
                            setTimeout(() => {
                                $('#warningAlert').slideUp(500).text('You updated slide Successfully');
                            }, 5000);
                        }    
                    });


                    
                }
            });


            let navbar_list = store.getters.getLinks();
            view.frontSetter.navRender(navbar_list);


            $(document).ready(function () {
                fetch(`{{ url('admin/theme/slider') }}?slidies=true `)
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        res.data.forEach(slide => {
                            let slide_obj = JSON.parse(slide.meta);
                            slide_obj.id = slide.id;
                            slide_obj.image = `{{url('/')}}/${slide_obj.image}`;
                            store.setters.addSlide(slide_obj);
                        })
                    }
                })
                .then(res => {
                    let sliderList = store.getters.getSlider();
                    view.frontSetter.slidersRender(sliderList);
                });

                fetch(`{{ url('admin/theme/navbar') }}?navbra_links=true`)
                .then(res => res.json())
                .then(res => {
                    // $('#loddingSpinner').hide(500);

                    if (res.success) {
                        res.data.forEach(link => {
                            let link_obj = JSON.parse(link.meta);
                            link_obj.id = link.id;
                            store.setters.addLink(link_obj);
                        });

                        let navbar_list = store.getters.getLinks();
                        view.frontSetter.navRender(navbar_list);
                    } else {
                        $('#dangerAlert').text('Something went rong! Please refresh the page.').slideDown(500);
                    }
                });
            });
        }

        return {
            inite
        }
    })(Store, View);

    Controller.inite()
});
</script>
@endpush