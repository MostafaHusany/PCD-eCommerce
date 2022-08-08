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
                <label for="products" class="col-sm-2 col-form-label">Section Title</label>
                <div class="col-sm-4">
                    <input type="text" name="title" id="title" class="form-control">
                    <div style="padding: 5px 7px; display: none" id="titleErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div><!-- /.col-sm-5 -->

                <label for="products" class="col-sm-1 col-form-label">Order</label>
                <div class="col-sm-5">
                    <input type="number" min="0" value="0" name="order" id="order" class="form-control">
                    <div style="padding: 5px 7px; display: none" id="orderErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div><!-- /.col-sm-5 -->
            </div><!-- /.form-group -->

            {{--
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select name="category" id="category" class="form-control">
                        <option value="">-- select category --</option>
                        @foreach($all_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->ar_title . ' || ' . $category->ar_title }}</option>
                        @endforeach
                    </select>
                    <div style="padding: 5px 7px; display: none" id="categoryErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div><!-- /.form-group -->
            --}}

            <div class="form-group row">
                <label for="products" class="col-sm-2 col-form-label">Products</label>
                <div class="col-sm-10">
                    <select name="products" id="products" multiple="multiple" class="form-control">
                        <option value="">-- select products --</option>
                    </select>
                    <div style="padding: 5px 7px; display: none" id="productsErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div><!-- /.form-group -->

            <button !disabled="disabled" id="addLink" class="btn btn-primary float-right">Add Section</button>
        </div>

        <div style="display: none" id="editForm" class="clearfix">
            <div class="row">
                <div class="col-6">
                    <h5>Update Slider</h5>
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
                <label for="edit-title" class="col-sm-2 col-form-label">Section Title</label>
                <div class="col-sm-4">
                    <input type="text" name="edit-title" id="edit-title" class="form-control">
                    <div style="padding: 5px 7px; display: none" id="edit-titleErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div><!-- /.col-sm-5 -->

                <label for="edit-products" class="col-sm-1 col-form-label">Order</label>
                <div class="col-sm-5">
                    <input type="number" min="0" value="0" name="edit-order" id="edit-order" class="form-control">
                    <div style="padding: 5px 7px; display: none" id="edit-orderErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div><!-- /.col-sm-5 -->
            </div><!-- /.form-group -->

            {{--
            <div class="form-group row">
                <label for="edit-category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select name="edit-category" id="edit-category" class="form-control">
                        <option value="">-- select category --</option>
                        @foreach($all_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->ar_title . ' || ' . $category->ar_title }}</option>
                        @endforeach
                    </select>
                    <div style="padding: 5px 7px; display: none" id="edit-categoryErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div><!-- /.form-group -->
            --}}

            <div class="form-group row">
                <label for="edit-products" class="col-sm-2 col-form-label">Products</label>
                <div class="col-sm-10">
                    <select name="edit-products" id="edit-products" multiple="multiple" class="form-control">
                        <option value="">-- select products --</option>
                    </select>
                    <div style="padding: 5px 7px; display: none" id="edit-productsErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div><!-- /.form-group -->

            <button !disabled="disabled" id="editLink" class="btn btn-warning float-right">Update Section</button>
        </div>

        <hr />

        <div class="alerts-container">
            <div id="successAlert" style="display: none" class="alert alert-success"></div>
            
            <div id="dangerAlert"  style="display: none" class="alert alert-danger"></div>
                
            <div id="warningAlert" style="display: none" class="alert alert-warning"></div>
            
            <!-- <div class="d-flex justify-content-center mb-3">
                <div id="loddingSpinner" style="display: none" class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div> -->

            <!-- <div id="loddingSpinner" class="overlay  mb-3">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div> -->
        </div><!-- /.alerts-container -->

        <!-- load the look of the navbar -->
        <div class="form-group" style="position: relative">
            <div style="
                    position: absolute;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    font-size: 2rem;
                    left: 0;" 
            id="loddingSpinner" class="overlay  mb-3">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
            
            <div style="background: #fff; min-height: 400px; border: 1px solid #ddd" id="linksContainer" class="p-4 look-container">
                
            </div><!-- /.look-container -->
            
            <div class="text-right my-2">
                <button id="upgradeSection" class="btn btn-warning">
                    Update Slider
                </button>
            </div>
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
            _token : "{{ csrf_token() }}",
            targetEditId : null,
            sections : []
        };
        
        const setters = {
            addSection : (newSection) => {
                newSection.id = Boolean(newSection.id) ? newSection.id : Math.round(Math.random() * 1000); 
                /**
                 * 1- the order is bigger than the index
                 * add to the end of the list
                 * 
                 * 2- the order is start of the index
                 * add to the start of the list and update
                 * the rest of the list order + 1
                 * 
                 * the order is between the index
                 * add in the determin order and 
                 * update the rest of the list
                */
                
                let new_sections = [];
                if(Boolean(data.sections.length) && newSection.order < data.sections.length) {
                    data.sections.forEach((section, index) => {
                        if (newSection.order == index) {
                            section.order += 1;
                            new_sections.push(newSection);
                            new_sections.push(section);
                        } else if (newSection.order > index) {
                            section.order += 1;
                            new_sections.push(section);
                        } else {
                            new_sections.push(section);
                        }
                    });
                } else {
                    new_sections = [...data.sections]
                    new_sections.push(newSection);
                }
                
                data.sections = new_sections;
                return data.sections;
            },
            editSection : (newSection) => {
                newSection.id    = data.targetEditId;
                let new_sections = data.sections.filter(section => section.id != newSection.id);
                data.sections    = new_sections;
                new_sections     = setters.addSection(newSection);
                
                return data.sections;
            },
            removeSection : (sectionId) => {
                data.sections = data.sections.filter(section => section.id != sectionId);
                return data.sections;
            },
            setSections : (sectionsList) => {
                data.sections = sectionsList;
            },
            setTargetEdit : (sectionId) => {
                data.targetEditId = sectionId;
            }
        };
        
        const getters = {
            getNewOrder : () => {
                return data.sections.length;
            },
            getSections : () => {
                return data.sections;
            },
            findSection : (sectionId) => {
                let targetSection = data.sections.find(section => section.id == sectionId);

                return Boolean(targetSection) ? targetSection : false;
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
            inputFields : ['title', 'order', 'products'],
            formMode : 'create',
            linksContainer : $('#linksContainer'),
        };
        
        const frontGetter = {
            getFormData : (isEdit = false) => {
                
                let formData   = {};
                let elSelector = '';
                let isValied   = true;

                fields.inputFields.forEach(field => {
                    elSelector = `#${isEdit ? 'edit-' : ''}${field}`;
                    formData[field] = $(elSelector).val();
                    
                    if (!Boolean(formData[field]) || (typeof formData[field] == 'object' && formData[field].length == 0)) {
                        isValied = false;
                        $(`${elSelector}Err`).text('This field is required !').slideDown(500);
                    } else {
                        $(`${elSelector}Err`).slideUp(500).text('');
                    }
                });

                if (isValied) {
                    // formData['cSection'] = true;
                    // formData['_token']   = $('meta[name="csrf-token"]').attr('content');
                    // formData['_method']  = isEdit ? 'PUT' : 'POST';

                    fields.inputFields.forEach(field => {
                        elSelector = `#${isEdit ? 'edit-' : ''}${field}`;
                        $(elSelector).val('').trigger('change');
                    });
                }

                return isValied ? formData : isValied;
            }
        };

        const frontSetter = {
            renderSections : (sections) => {
                /**
                 * 1- clear old sections
                 * 2- create sections elements as string
                 * 3- append the string to the list 
                 * */   
                $('.section-container').remove();
                
                sectionsEl = '';
                sections = sections.sort((a, b) => {
                    return a.order - b.order;
                });
                
                sections.forEach(section => {
                    let count = 0;
                    let sectionProducts = '';

                    section.products.forEach((product, index) => {

                        if (count == 0) {
                            sectionProducts += `<div class="row"> ${ helpers.createProductEl(product) }`;
                        } else if (count == 3) {
                            sectionProducts += `${ helpers.createProductEl(product) }</div>`;
                            count = -1;
                        } else {
                            sectionProducts += `${ helpers.createProductEl(product) }`;
                        }

                        if (section.products.length == index + 1 && count < 3) {
                            sectionProducts += `</div>`;
                        }

                        count++;
                    });
                    
                    sectionsEl += `
                    <div id="sectionContainer${section.id}" class="section-container p-2 mb-5">
                        <h3 class="row">
                            <div class="col-6">${section.title}</div>
                            <div class="col-6 text-right">
                                <button data-id="${section.id}" class="btn-edit btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button data-id="${section.id}" class="btn-delete btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </h3>
                        <hr/>
                        
                        ${sectionProducts}
                    </div><!-- /.section-container -->
                    `;
                });

                $(fields.linksContainer).append(sectionsEl);
            }, 
            updateOrder : (order, isEdit = false) => {
                $(`#${isEdit ? 'edit-' : ''}order`).val(0);
                $(`#${isEdit ? 'edit-' : ''}order`).attr('min', 0);
                $(`#${isEdit ? 'edit-' : ''}order`).attr('max', Number(order));
            },
            toggleEditForm : (targetSection = null) => {
                /**
                 * # If targetSection if null this means
                 * we eant to clode the edit mode;
                 * 
                 * # Else we will get the section data
                 * and put it in the edit form and show edit form.
                 */
                if (Boolean(targetSection)) {
                    // show edit form
                    $('#createForm').slideUp(500);
                    $('#editForm').slideDown(500);
                    
                    helpers.addDataToEditForm(targetSection);
                } else {
                    // show create form
                    $('#createForm').slideDown(500);
                    $('#editForm').slideUp(500);

                    helpers.clearEditForm();
                }
            }
        };

        const helpers = {
            createProductEl : (product) => {
                let productPrice = product.price > product.price_after_sale ? 
                `
                <div class="row">
                    <div class="col-6">
                        <h5 class="text-danger">${product.price_after_sale} SR</h5>
                    </div>
                    <div class="col-6">
                        <p class="text-default" style="text-decoration: line-through;">${product.price} SR</p>
                    </div>
                </div>
                ` : 
                `
                <div class="row">
                    <div class="col-6">
                        <h5 class="text-default">${product.price} SR</h5>
                    </div>
                </div>
                `;

                let productEl = `
                <div class="col-3 p-2">
                    <div class="card m-2" style="height: 100%">
                        <img src="{{ url('/') }}/${product.main_image}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5>${product.en_name.length >= 20 ? product.en_name.slice(0, 15) + ' ...' : product.en_name }</h5>
                            ${productPrice}
                            <button type="button" class="btn btn-outline-danger btn-block">Build your product!!!</button>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col-3 -->
                `;

                return productEl;
            }, 
            clearEditForm : () => {
                fields.inputFields.forEach(field => {
                    $(`#edit-${field}`).val('').trigger('change')
                });
                $('.section-container').css('background-color', '').css('opacity', '');
            }, 
            addDataToEditForm (targetSection) {
                $('#edit-title').val(targetSection.title);
                $('#edit-order').val(Number(targetSection.order));

                $('#edit-products options').remove();
                $('#edit-products').val('').trigger('change');
                targetSection.products.forEach(product => {
                    var product_option = new Option(`${product['ar_name']} || ${product['en_name']}`, product.id, true, true);
                    $('#edit-products').append(product_option)
                });
                $('#edit-products').trigger('change');

                $('.section-container').css('background-color', '').css('opacity', '');
                $(`#sectionContainer${targetSection.id}`).css('background-color', '#ffc107').css('opacity', '0.5');
            }
        };

        const pluginCall = (() => {
            $('#category, #edit-category').select2({
                width: '100%',
                placeholder: 'Select categories',
            });

            $('#products, #edit-products').select2({
                allowClear: true,
                width: '100%',
                placeholder: 'Select products, by name, id, or sku',
                ajax: {
                    url: '{{ url("admin/products-search") }}?all_products=true',
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

            $('#addLink').click(function () {
                /**
                 * 1- get data from the from ,
                 * 2- validate the data, and clear the form 
                 * 3- get the data and added to the store
                 * 4- re-render the sections after update
                 * 5- update order attr
                 */
                let data = view.frontGetter.getFormData();

                fetch(`{{ route('admin.products.show', 0) }}?products_list=${JSON.stringify(data.products)}`)
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        data.products = res.products; 
                        let sectionsList = store.setters.addSection(data);
                        view.frontSetter.renderSections(sectionsList);

                        view.frontSetter.updateOrder(sectionsList.length);
                    }
                });
            });

            $('#editLink').click(function () {
                let data = view.frontGetter.getFormData(true);

                fetch(`{{ route('admin.products.show', 0) }}?products_list=${JSON.stringify(data.products)}`)
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        data.products = res.products; 
                        let sectionsList = store.setters.editSection(data);
                        view.frontSetter.renderSections(sectionsList);

                        view.frontSetter.updateOrder(sectionsList.length);
                        view.frontSetter.toggleEditForm();
                    }
                })
                .catch(err => {
                    console.log('Error while edit link', err);
                    $('#dangerAlert').text('Something went wrong, please refresh the page !!').slideDown(500);
                });
            })

            $('#linksContainer').on('click', '.btn-delete', function () {
                let sectionId = $(this).data('id');
                let flag = confirm('Are you sure you want to delete this section ?!');
                
                if (flag && Boolean(sectionId)) {
                    let sectionsList = store.setters.removeSection(sectionId);
                    view.frontSetter.renderSections(sectionsList);
                    
                    view.frontSetter.updateOrder(sectionsList.length);
                }
            }).on('click', '.btn-edit', function () {
                /**
                 * 1- get target sction id
                 * 2- get target section from store
                 * 3- show target section in the edit form; show edit form and hide the create form
                 */
                let sectionId = $(this).data('id');
                let targetSection = store.getters.findSection(sectionId);
                
                if (Boolean(targetSection)) {
                    store.setters.setTargetEdit(sectionId);
                    view.frontSetter.toggleEditForm(targetSection);
                }
            });

            $('#upgradeSection').click(function () {
                // send request upgrade option
                let sections = store.getters.getSections();
                $('#loddingSpinner').show(500);

                fetch('{{ url("admin/theme") }}', {
                    method : 'POST',
                    headers : {
                        "Content-Type" : "applications/json"
                    },
                    body : JSON.stringify({
                        cSection : true,
                        _token   : "{{ csrf_token() }}",
                        sections : sections
                    })
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        $('#loddingSpinner').hide(500);
                        $('#successAlert').text('Sections was updated successfully !').slideDown(500);

                        setTimeout(() => {
                            $('#successAlert').slideUp(500).text('');
                        }, 5000);
                    }
                })
                .catch(err => {
                    console.log('Error while updating sctions', err);
                    $('#dangerAlert').text('Something went wrong, please refresh the page !!').slideDown(500);
                });
            });
            

            $('#closeEditForm').click(function () {
                view.frontSetter.toggleEditForm();
            });

            $(document).ready(function () {
                $('#loddingSpinner').show(500);

                fetch(`{{ url('admin/theme/custome-section') }}?cSection=true`)
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        $('#loddingSpinner').hide(500);
                        
                        let sectionsList = [];
                        res.data.forEach(product => {
                            let data = JSON.parse(product.meta);
                            data.id = product.id;
                            data.products = product.products;
                            sectionsList.push(data);
                        });

                        store.setters.setSections(sectionsList);
                        view.frontSetter.renderSections(sectionsList);
                        
                        view.frontSetter.updateOrder(sectionsList.length);
                    }
                })
                .catch(err => {
                    console.log('Error while initing sctions', err);
                    $('#dangerAlert').text('Something went wrong, please refresh the page !!').slideDown(500);
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