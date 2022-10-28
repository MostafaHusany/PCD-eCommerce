@extends('layouts.admin.app')

@php 
    $is_ar = LaravelLocalization::getCurrentLocale() == 'ar'; 
@endphp

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
    
    @if($is_ar)
        @include('layouts.admin.incs._rtl')
    @endif
@endpush

@section('content')
<div dir="{{ $is_ar ? 'rtl' : 'ltr' }}" class="text-left">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('navbar.Navbar_Editor')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('navbar.Dashboard')</a>
                        </li>

                        <li class="breadcrumb-item active">
                            @lang('navbar.Navbar_Editor')
                        </li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div id="selectNavbarCategories" class="card card-body">
        
        <div>

            @include('admin.themes.navbar.incs._create')

            @include('admin.themes.navbar.incs._edit')

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
                        {{--
                        <div class="categories_menu">
                            <div class="btn categories-btn">
                                <span>All Categories </span>
                                <i class="category-icon fas fa-bars"></i>
                            </div>

                            <div style="display: none" class="categories-list">
                                <ul>

                                </ul>
                            </div>
                        </div><!-- /.categories_menu -->
                        --}}

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

            <button id="updateNavbar" class="btn btn-warning float-right">@lang('navbar.Update_Navbar_Settings')</button>
            </form>
        </div>
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
            links : [
                // {
                //     id : 1,
                //     type : "externalLink",
                //     title : "Link 1",
                //     value : "http://google.com"
                // },
                // {
                //     id : 2,
                //     type : "category",
                //     title : "category 2",
                //     value : ""
                // }
            ]
        };
        
        const setters = {
            addLink : (new_link) => {
                new_link.id = Boolean(new_link.id) ? new_link.id : Math.round(Math.random() * 10000);
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
            },
            getTargetForEdit : () => {
                return data.target_edit;
            },
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
                    'category', 'categoryTitleAr', 'categoryTitleEn'
                ],
                'externalLink' : [
                    'externalUrl', 'externalUrlTitleAr', 'externalUrlTitleEn'
                ],
                'keys' : {
                    'category' : 'value', 
                    'categoryTitleAr' : 'ar_title', 
                    'categoryTitleEn' : 'en_title', 
                    'externalUrl' : 'value', 
                    'externalUrlTitleAr' : 'ar_title', 
                    'externalUrlTitleEn' : 'en_title', 
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
                            $(`#${is_edit ? 'edit-' : '' }${field}Err`).text('@lang("navbar.This_Field_is_required")').slideDown(500);
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
                    $('#edit-categoryTitleAr').val(data.ar_title);
                    $('#edit-categoryTitleEn').val(data.en_title);
                } else {
                    $('#edit-externalUrl').val(data.value);
                    $('#edit-externalUrlTitleAr').val(data.ar_title);
                    $('#edit-externalUrlTitleEn').val(data.en_title);
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
                                ${nav_link.en_title}
                                <span data-id="${nav_link.id}" class="edit-link badge rounded-pill bg-warning text-dark" style="cursor: pointer;padding: 5px;margin: 0 2px;">
                                    <i class="fas fa-pen"></i>
                                </span>

                                <span data-id="${nav_link.id}" data-title-en="${nav_link.en_title}" data-title-ar="${nav_link.ar_title}" class="delete-link badge rounded-pill bg-danger" style="cursor: pointer;padding:5px 7px 4px 6px">
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
                let target_title = $(this).data('title-en');
                let flag = confirm(`@lang("navbar.are_you_sure_you_want_to_delete") "${target_title}" ?!`);

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
                    view.frontSetter.toggleForm(true);
                }
            });

            $('#updateNavbar').click(function () {
                /**
                 * 1- get links from the store
                 * 2- send axios request update navbar settings
                 * 3- show success/err msg
                */

                $('#loddingSpinner').show(500);
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
                    if (data.success) {
                        $('#loddingSpinner').hide(500);
                        $('#successAlert').text('@lang("navbar.Navbar_was_updated_successfully")').slideDown(500);

                        setTimeout(() => {
                            $('#successAlert').slideUp(500).text('');
                        }, 5000);
                    }
                })
            });

            $(document).ready(function () {
                $('#loddingSpinner').show(500);

                fetch(`{{ url('admin/theme/navbar') }}?navbra_links=true`)
                .then(res => res.json())
                .then(res => {
                    $('#loddingSpinner').hide(500);

                    if (res.success) {
                        res.data.forEach(link => {
                            let link_obj = JSON.parse(link.meta);
                            link_obj.id = link.id;
                            store.setters.addLink(link_obj);
                        });

                        let navbar_list = store.getters.getLinks();
                        view.frontSetter.navRender(navbar_list);
                    } else {
                        $('#dangerAlert').text('@lang("navbar.Something_went_rong_Please_refresh_the_page")').slideDown(500);
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