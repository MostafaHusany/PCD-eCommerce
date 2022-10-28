
<div style="display: none" id="showObjectCard" class="card card-body">
    <div class="row mb-1">
        <div class="col-6">
            <h5>@lang('categories.Show_Category')</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#showObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->

    <hr/>

    <div class="form-container">
        <div class="form-group row">
            <label for="show-en_title" class="col-sm-2 col-form-label">@lang('categories.Title')</label>
            <div class="col-sm-10">
                <div class="row" dir="ltr">
                    <div class="col-sm-6">
                        <input disabled="disabled" type="text" tabindex="1"  class="form-control" style="text-align: left !important;" id="show-en_title" placeholder="@lang('categories.title_en')">
                    </div>
                    <div class="col-sm-6">
                        <input disabled="disabled" type="text"  tabindex="3" class="form-control" style="text-align: right !important;" dir="rtl" id="show-ar_title" placeholder="@lang('categories.title_ar')">
                    </div>
                </div><!-- /.row -->
            </div><!-- /.col-sm-10 -->
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="show-en_description" class="col-sm-2 col-form-label">@lang('categories.Description')</label>
            <div class="col-sm-10">
                <div class="row" dir="ltr">
                    <div class="col-sm-6">
                        <textarea disabled="disabled" tabindex="2" class="form-control" style="text-align: left !important;"  id="show-en_description" placeholder="@lang('categories.description_en')"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <textarea disabled="disabled" tabindex="4" class="form-control" style="text-align: right !important;" dir="rtl" id="show-ar_description" dir="rtl" placeholder="@lang('categories.description_ar')"></textarea>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.col-sm-10 -->
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="show-is_main" class="col-sm-2 col-form-label">@lang('categories.Is_Main')</label>
            <div class="col-sm-5">
                <input disabled="disabled" class="form-control" id="show-is_main" data-target="#category_id" />
            </div>

            <div class="col-sm-5">
                <input disabled="disabled" class="form-control" id="show-category" disabled="disabled" />
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="rule" class="col-sm-2 col-form-label">@lang('categories.Rule')</label>
            <div class="col-sm-5" id="show-rule">
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="show-brands" class="col-sm-2 col-form-label">@lang('categories.Brands')</label>
            <div class="col-sm-10" id="show-brands">
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row" id="show-categories-container">
            <label for="show-brands" class="col-sm-2 col-form-label">@lang('categories.Child_Categories')</label>
            <div class="col-sm-10" id="show-categories">
            </div>
        </div><!-- /.form-group -->

        
        <div class="form-group row" id="show-categories-container">
            <label for="show-brands" class="col-sm-2 col-form-label">@lang('categories.Attributes')</label>
            <div class="col-sm-10">
                <ul id="show-attributes" class="list-group" style="padding: 0;"></li>
            </div>
        </div><!-- /.form-group -->

    </div><!-- /.form-container -->
</div><!-- /.card -->

@push('page_scripts')
<script>
    $(document).ready(() => {
        const Store = (() => {
            
            const store = {
                category : null,
            };

            const getters = {
                isCategoryMain : () => store.is_main,
                getTargetCategory : () => store.category,
                getChildrenCategories : () => store.children_categories
            };

            const setters = {
                setCategory : (category) => {
                    store.category = category;
                    return store;
                },
                resetCategory : () => {
                    store.category = null;
                }
            };

            return {
                getters,
                setters
            }
        })();

        const View = (() => { 

            const category_ty = []

            const openShowModal = () => {
                $('#objectsCard').slideUp(500);
                $('#showObjectCard').slideDown(500);
                $('#loddingSpinner').hide(500);
            }

            const renderCategory = (store) => {
                helpers.clear_fields();
                helpers.main_fields(store.category);
                helpers.is_main(store.category);
                helpers.rules(store.category);
                helpers.brands(store.category);
                helpers.children(store.category);
                helpers.attributes(store.category.attributes);
            }

            const helpers = {
                clear_fields : () => {
                    // remove previos session brands
                    $('#show-brands').html('')

                    // remove previos session attributes
                    $('.show-attr').remove();

                    // clear previous session categories  
                    $('#show-categories').html('');
                    $('#show-categories-container').slideUp(500);
                },
                main_fields : (category) => {
                    const input_fields = [
                        'en_title', 'ar_title',
                        'en_description', 'ar_description'
                    ];

                    input_fields.forEach(input_field => {
                        $(`#show-${input_field}`).val(category[input_field]);
                    });
                },
                is_main : (category) => {
                    if (category.is_main == 1) {
                        $('#show-is_main').val('Main Category');
                        $('#show-category').val('---');
                    } else {
                        $('#show-is_main').val('Sub Category');
                        $('#show-category').val(`${category.category_parent.en_title} / ${category.category_parent.ar_title}`);
                    }
                },
                rules : (category) => {
                    let rule_message = Number(category.rule) > 0 ? `
                        <span class="badge bg-warning">There is order limitation rules ${category.rule}</span>
                    ` : `
                        <span class="badge bg-secondary">There is no order limitation</span>
                    `;
                    $('#show-rule').html(rule_message);
                },
                brands : (category) => {
                    let brand_els = '<span>---</span>';
                    if (Boolean(category.brands) && category.brands.length) {
                        brand_els = '';
                        category.brands.forEach(brand => {
                            brand_els += `
                                <span class="badge bg-primary">${brand.en_title}</span>
                            `;

                        });    
                    }

                    $('#show-brands').html(brand_els);
                },
                attributes : (attributes) => {
                    let attribute_tr = '---';

                    if (Boolean(attributes) && attributes.length) { 
                        attribute_tr = '';
                        attributes.forEach(attributs => {
                            let meta = JSON.parse(attributs.meta)
                            console.log('attributes test : ', meta);
                            attribute_tr += `
                                <li class="show-attr list-group-item">
                                    <h5>${attributs.title}</h5>
                                    <span class="badge badge-pill ${attributs.type == 'options' ? 'badge-danger' : 'badge-warning'}">Type of : ${attributs.type}</span>
                                    <span>
                                        ${ attributs.type == 'options' ? 
                                            'Options : ' + (meta.options.map(attr => attr)).join(" / ") 
                                            :
                                            'Min : ' + meta.number.field_number_from + ', Max : ' + meta.number.field_number_to
                                        }
                                    </span>
                                </li>
                            `;
                        })
                    }
                    
                    $('#show-attributes').html(attribute_tr);
                },
                children : (category) => {
                    if(category.is_main == 1) {
                        let child_tr = '';
                        category.children.forEach(child => {
                            child_tr += `
                                <span class="badge bg-primary">${child.en_title} / ${child.ar_title}</span>
                            `;
                        });

                        $('#show-categories').html(Boolean(child_tr) ? child_tr : '---');
                        $('#show-categories-container').slideDown(500);
                    }
                }
            }

            return {
                openShowModal,
                renderCategory
            }
        })();

        const Controller = ((store, view) => {
            const init = () => {
                $('#dataTable').on('click', '.show-object', function () {
                    // send request, to the server get the data about the order
                    // we need data about the customer, the products of the order
                    // and the total 

                    $('#loddingSpinner').show();

                    let category_id = $(this).data('object-id');
                    axios.get(`{{ url('admin/products-categories') }}/${category_id}`, {
                        params : {
                            get_children : true
                        }
                    }).then(res => {
                        if (res.status == 200) {
                            console.log(res.data.data);
                            const data = store.setters.setCategory(res.data.data);
                            view.renderCategory(data);
                        }
                    }).then(res => {
                        view.openShowModal();
                    }).catch(err => {
                        $('#dangerAlert').text('Something went rong !!').slideDown(500);

                        setTimeout(() => {
                            $('#dangerAlert').text('').slideUp(500);
                        }, 5000);
                    }); 
                });
            }

            return {
                init
            }
        })(Store, View);

        Controller.init();
    });
</script>
@endpush