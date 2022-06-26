@extends('layouts.admin.app')


@push('page_css')
<style>
.categories_menu {
    width: 229px;
}

.categories-list {
    min-height: 200px;
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
$object_title = 'Navbar Editor';
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

        <div class="clearfix" id="createForm">
            <div class="row">
                <div class="col-6">
                    <h5>Create New Link</h5>
                </div>
                <div class="col-6 text-right">
                </div>
            </div><!-- /.row -->

            <hr />

            <div class="form-group row"> 
                <label for="nav_selected_categories" class="col-sm-2 col-form-label">Link Type</label>
                <div class="col-sm-10">
                    <select type="text" tabindex="1" class="form-control" id="linkType">
                        <option value="">-- select link type --</option>
                        <option value="category">category</option>
                        <option value="externalLink">external link</option>
                        <!-- <option value="subList">sub list</option> -->
                    </select>
                    <div style="padding: 5px 7px; display: none" id="linkTypeErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div><!-- /.form-group -->

            <div style="display: none;" class="category-link form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-5">
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
                
                <div class="col-5">
                    <div class="form-group">
                        <input id="categoryTitle" type="text" placeholder="category title" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="categoryTitleErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-5 -->
            </div>

            <div style="display: none;" class="external-link form-group row">
                <div class="col-2">
                    <label for="" class="form-label">External Link</label>
                </div>
                
                <div class="col-5">
                    <div class="form-group">
                        <input id="externalUrl" type="url" placeholder="link url" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="externalUrlErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-5 -->

                <div class="col-5">
                    <div class="form-group">
                        <input id="externalUrlTitle" type="text" placeholder="link title" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="externalUrlTitleErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-5 -->
            </div><!-- /.form-group -->
            
            <button !disabled="disabled" id="addLink" class="btn btn-primary float-right">Add Link</button>
        </div>

        <div style="display: none;" class="clearfix" id="editForm">
            <div class="row">
                <div class="col-6">
                    <h5>Edit Link</h5>
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
                <label for="nav_selected_categories" class="col-sm-2 col-form-label">Link Type</label>
                <div class="col-sm-10">
                    <select type="text" tabindex="1" class="form-control" id="edit-linkType">
                        <option value="">-- select link type --</option>
                        <option value="category">category</option>
                        <option value="externalLink">external link</option>
                        <!-- <option value="subList">sub list</option> -->
                    </select>
                    <div style="padding: 5px 7px; display: none" id="edit-linkTypeErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div><!-- /.form-group -->

            <div style="display: none;" class="edit-category-link form-group row">
                <label for="edit-category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-5">
                    <select type="text" tabindex="1" class="form-control" id="edit-category">
                        <option value="">-- select category --</option>
                        @foreach($all_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->ar_title . ' || ' . $category->ar_title }}</option>
                        @endforeach
                    </select>
                    <div style="padding: 5px 7px; display: none" id="categoryErr"
                        class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
                
                <div class="col-5">
                    <div class="form-group">
                        <input id="edit-categoryTitle" type="text" placeholder="category title" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="edit-categoryTitleErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-5 -->
            </div>

            <div style="display: none;" class="edit-external-link form-group row">
                <div class="col-2">
                    <label for="" class="form-label">External Link</label>
                </div>
                
                <div class="col-5">
                    <div class="form-group">
                        <input id="edit-externalUrl" type="url" placeholder="link url" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="edit-externalUrlErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-5 -->

                <div class="col-5">
                    <div class="form-group">
                        <input id="edit-externalUrlTitle" type="text" placeholder="link title" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="edit-externalUrlTitleErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-5 -->
            </div><!-- /.form-group -->
            
            <button id="editLink" class="btn btn-warning float-right">Edit Link</button>
        </div>

        <hr />


        <!-- load the look of the navbar -->
        <div class="form-group">
            <div style="background: #fff; min-height: 400px; border: 1px solid #ddd" class="p-4 look-container">
                <div class="custome-nav d-flex">
                    <div class="categories_menu">
                        <div class="btn categories-btn">
                            <span>All Categories </span>
                            <i class="category-icon fas fa-bars"></i>
                        </div>

                        <div class="categories-list">
                            <ul>

                            </ul>
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
            </div><!-- /.look-container -->
        </div>

        <button id="updateNavbar" class="btn btn-warning float-right">Update Navbar Settings</button>
        </form>
    </div>
</div>
@endsection

@push('page_scripts')
<script>
$(document).ready(function() {
    /*
        $('#nav_selected_categories').select2({
            allowClear: true,
            width: '100%',
            placeholder: 'Select categories',
            ajax: {
                url: '{{ url("admin/products-categories-search") }}?is_main=true',
                dataType: 'json',
                delay: 150,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: `${item['ar_title']} || ${item['en_title']}`,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        }).change(function() {
            let categoreis_id = $(this).val();

            axios("{{ url('admin/products-categories') }}/0", {
                params: {
                    group_acc: true,
                    categoreis_id: categoreis_id
                }
            }).then(res => {
                console.log(res);
                if (res.data.success) {
                    append_category(res.data.data);
                }
            })
        });

        $('.update-navbar').click(function(e) {
            e.preventDefault();

            $('#loddingSpinner').show();

            axios.post(`{{ url('admin/products-categories') }}/0`, {
                _token: "{{ csrf_token() }}",
                _method: "PUT",
                categories: $('#nav_selected_categories').val()
            })
            .then(res => {
                $('#loddingSpinner').hide();

                if (res.data.success) {
                    $('#objectsCard').slideDown(500);
                    $('#selectNavbarCategories').slideUp(500);

                    $('#successAlert').text('Navbar selected categories was updated !!')
                        .slideDown(500);
                    setTimeout(() => {
                        $('#successAlert').text('').slideUp(500);
                    }, 3000);
                } else {
                    $('#dangerAlert').text('Something went wrong, please contact admin !!')
                        .slideDown(500);
                    setTimeout(() => {
                        $('#dangerAlert').text('').slideUp(500);
                    }, 3000);
                }
            });
        });

        function append_category(categories_list) {
            $('.categories-el-li').remove();

            let el_list = '';
            categories_list.forEach(category => {
                el_list += `
            <li class="my-2 categories-el-li">
                <i class="mx-2 fas fa-cog"></i>
                <span>${category.en_title}</span>
                <i class="show-sub fas fa-angle-right"></i>
            </li>`;
            });

            $('.categories-list ul').append(el_list);
        }
    */
   
    const Store = (() => {
        const data = {
            navbar : true,
            _token : "{{ csrf_token() }}",
            target_edit : null,
            links : [
                {
                    id : 1,
                    type : "externalLink",
                    title : "Link 1",
                    value : "http://google.com"
                },
                {
                    id : 2,
                    type : "category",
                    title : "category 2",
                    value : ""
                }
            ]
        };
        
        const setters = {
            addLink : (new_link) => {
                new_link.id = Math.round(Math.random() * 10000);
                data.links.push(new_link);
                return data.links;
            },
            removeLink : (link_id) => {
                data.links = data.links.filter(link => link.id != link_id);
                return data.links;
            },
            setTargetForEdit : (target_edit) => {
                data.target_edit = target_edit;
            },
            updateData : (updated_link) => {
                let new_links = [];
                updated_link.id = data.target_edit;

                data.links.forEach(link => {
                    if (link.id == data.target_edit) {
                        new_links.push(updated_link);
                    } else {
                        new_links.push(link);
                    }
                });

                data.links = new_links;
                return data.links;
            }
        };

        const getters = {
            getData : () => {
                return data;
            },
            getLinks : () => {
                return data.links;
            },
            findLink : (link_id) => {
                let target_link = data.links.find(link => link.id == link_id);
                return Boolean(target_link) ? target_link : false;
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
            toggleFormFields : {
                category : {
                    hide : ['external-link'],
                    show : ['category-link'],
                },
                externalLink : {
                    hide : ['category-link'],
                    show : ['external-link'],
                },
                subList : {
                    hide : ['external-link', 'category-link'],
                    show : [],
                },
            },
            formFields : {
                'category' : [
                    'category', 'categoryTitle'
                ],
                'externalLink' : [
                    'externalUrl', 'externalUrlTitle'
                ],
                'keys' : {
                    'category' : 'value', 
                    'categoryTitle' : 'title', 
                    'externalUrl' : 'value', 
                    'externalUrlTitle' : 'title', 
                }
            }
        };

        const frontGetter = {
            getFormData : (is_edit = false) => {
                let data = {};
                let is_valied  = true;
                let type_field = $(`#${is_edit ? 'edit-' : '' }linkType`).val();

                if (type_field === '') {
                    is_valied = false;
                    $(`#${is_edit ? 'edit-' : '' }linkType`).css('border-color', 'red');
                } else {
                    $(`#${is_edit ? 'edit-' : '' }linkType`).css('border-color', '');
                    data['type'] = type_field;
                    fields.formFields[type_field].forEach(field => {
                        let field_val = $(`#${is_edit ? 'edit-' : '' }${field}`).val(); 
                        if (!Boolean(field_val)) {
                            is_valied = false;
                            $(`#${is_edit ? 'edit-' : '' }${field}Err`).text('This Field is required').slideDown(500);
                        } else {                            
                            data[fields.formFields['keys'][field]] = field_val;
                            $(`#${is_edit ? 'edit-' : '' }${field}Err`).text('').slideUp(500)
                        }
                    });
                }

                if (is_valied) {
                    fields.formFields[type_field].forEach(field => {
                        $(`#${is_edit ? 'edit-' : '' }${field}`).val('').trigger('change');
                    });
                }

                return is_valied ? data : is_valied;
            }
        };

        const frontSetter = {
            editDataForm : (data) => {
                $('#edit-linkType').val(data.type).trigger('change');

                if (data.type == 'category') {
                    $('#edit-category').val(data.value).trigger('change');
                    $('#edit-categoryTitle').val(data.title);
                } else {
                    $('#edit-externalUrl').val(data.value);
                    $('#edit-externalUrlTitle').val(data.title);
                }
            },
            toggleForm : (is_edit = false) => {
                $(is_edit ? '#editForm' : '#createForm').slideUp(500);
                setTimeout(() => {
                    $(is_edit ? '#createForm' : '#editForm').slideDown(500);
                }, 500);
            },
            toggleFormFields : (link_type, is_edit = false) => {
                fields.toggleFormFields[link_type]['hide'].forEach(field => {
                    $(`.${is_edit ? 'edit-' : ''}${field}`).slideUp(500);
                });

                fields.toggleFormFields[link_type]['show'].forEach(field => {
                    $(`.${is_edit ? 'edit-' : ''}${field}`).slideDown(500);
                });
            },
            navRender : (nav_list) => {
                $('.nav-link-item').remove();
                nav_list.forEach(nav_link => {
                    let nav_link_li = `
                        <li class="nav-link-item nav-item active">
                            <span class="nav-link" href="#">
                                ${nav_link.title}
                                <span data-id="${nav_link.id}" class="edit-link badge rounded-pill bg-warning text-dark" style="cursor: pointer;padding: 5px;margin: 0 2px;">
                                    <i class="fas fa-pen"></i>
                                </span>

                                <span data-id="${nav_link.id}" data-title="${nav_link.title}" class="delete-link badge rounded-pill bg-danger" style="cursor: pointer;padding:5px 7px 4px 6px">
                                    <i class="fas fa-times"></i>
                                </span>
                            </span>
                        </li>
                    `;

                    $('#linksContainer').append(nav_link_li);
                });
            },
        };

        const helpers = {};

        const pluginCall = (() => {
            $('#category, #edit-category').select2({
                width: '100%',
                placeholder: 'Select categories',
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
            $('#linksContainer').on('click', '.delete-link', function () {

                let target_id    = $(this).data('id');
                let target_title = $(this).data('title');
                let flag = confirm(`are you sure you want to delete "${target_title}" ?!`);

                if(Boolean(target_id) && flag) {
                    let navbar_list = store.setters.removeLink(target_id);
                    view.frontSetter.navRender(navbar_list);
                }
            }).on('click', '.edit-link', function () {
                /**
                 * 1- get target link, 
                 * 2- change form mode to edit mode
                 * 3- show target link in the data
                 */
                let target_id   = $(this).data('id');
                let target_link = store.getters.findLink(target_id);
                if (target_link) {
                    store.setters.setTargetForEdit(target_id);
                    view.frontSetter.editDataForm(target_link);
                    view.frontSetter.toggleForm();
                }
            });

            $('#closeEditForm').click(function () {
                view.frontSetter.toggleForm(true);
            });

            $('#linkType').change(function () {
                let link_type = $(this).val();
                view.frontSetter.toggleFormFields(link_type);
            });

            $('#edit-linkType').change(function () {
                let link_type = $(this).val();
                view.frontSetter.toggleFormFields(link_type, 'edit-');
            });

            $('#addLink').click(function () {
                /**
                 * get data from the form 
                 * if data is valied add the data to the store
                 * re-render the data in the navbar
                 * clear the form
                 */
                let data = view.frontGetter.getFormData();
                if (data) {
                    let navbar_list = store.setters.addLink(data);
                    view.frontSetter.navRender(navbar_list);
                }
            });

            $('#editLink').click(function () {
                /**
                 * 1- get form data,
                 * 2- update the target link
                 * 3- re-render th links 
                */
                let data = view.frontGetter.getFormData(true);
                if (data) {
                    let navbar_list = store.setters.updateData(data);
                    view.frontSetter.navRender(navbar_list);
                }
            });

            $('#updateNavbar').click(function () {
                /**
                 * 1- get links from the store
                 * 2- send axios request update navbar settings
                 * 3- show success/err msg
                */
                let data = store.getters.getData();
                fetch('{{url("admin/theme/navbar")}}', {
                    method: 'POST',
                    headers: {
                        // Accept: 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data) 
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                })
            });

            let navbar_list = store.getters.getLinks();
            view.frontSetter.navRender(navbar_list);
        }

        return {
            inite
        }
    })(Store, View);

    Controller.inite()
});
</script>
@endpush