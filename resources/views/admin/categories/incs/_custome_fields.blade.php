@push('page_css')
<style>
    .blinker {
        background-color: #f8d7da
    }
</style>
@endpush

<div style="display: none" id="customeObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Category Custome Fields</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#customeObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <div id="objectForm">
        <div class="form-group row">
            <label for="custome-en_title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-5">
                <input disabled="disabled" type="text" tabindex="1"  class="form-control" id="custome-en_title" placeholder="Title">
            </div>
            <div class="col-sm-5">
                <input disabled="disabled" type="text" tabindex="3" class="form-control text-right" dir="rtl" id="custome-ar_title" placeholder="العنوان">
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="is_main" class="col-sm-2 col-form-label">Is Main</label>
            <div class="col-sm-5">
                <select disabled="disabled" class="form-control" id="custome-is_main">
                    <option selected="selected" value="1">Is Main</option>
                    <option value="0">Is Sub</option>
                </select>
            </div>

            <div class="col-sm-5">
                <select disabled="disabled" class="form-control" id="custome-category_id">
                    <option value="">-- select main category --</option>
                    @foreach($all_categories as $category)
                    <option value="{{ $category->id }}">{{ $category['ar_title'] . '||' . $category['en_title'] }}</option>
                    @endforeach
                </select>
            </div>
        </div><!-- /.form-group -->

        <hr />

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label mt-4">Custome Fields</label>

            <div class="col-sm-2">
                <label for="field_title">Field Title</label>
                <input tabindex="6" id="custome-title" class="form-control" placeholder="Field Title">
            </div><!-- /.col-sm-2 -->

            <div class="col-sm-2">
                <label for="">Field Type</label>
                <select tabindex="7" id="custome-type" class="form-control">
                    <option value="options" selected="selected">Options</option>
                    <option value="number">Number</option>
                </select>
            </div><!-- /.col-sm-2 -->

            <div class="col-sm-1">
                <button tabindex="10" id="custome-add_custome_field" class="btn btn-sm btn-primary" style="margin-top: 35px">
                    <i class="fas fa-plus"></i>
                </button>
            </div><!-- /.col-sm-2 -->
        </div><!-- /.form-group -->

        <div class="form-group" style="height: 300px; overflow-y: scroll">
            <table class="table">
                <tr>
                    <td>Title</td>
                    <td>Type</td>
                    <td>Values</td>
                    <td>Actions</td>
                </tr>
                <!-- <input id="custome-attributes" type="hidden" value="">
                <input id="custome-category_id" type="hidden" value=""> -->
                <tbody id="custome-fields_container">
                    
                </tbody>
            </table>
        </div>

        <button class="custome-field-create btn btn-warning float-right">Update Category Custome Fields</button>
    </div>
</div>

@push('page_scripts')
<script>
$(document).ready(function () {
    
    const AttrStore = (() => {
        const data = {
            category : null, // {}
            attributes : null,// []
        };

        // getters 
        const getters = {
            getData : () => data,
            
            getRequestData : () => ({
                category_id : data.category.id,
                attributes : data.attributes,
                update_category_attr : true
            }),

            isTitleExist : (title) => {
                /**
                 * 1- check if the title do exist
                 * if exist return the id of target attr, else return false
                 */
                let is_valied = false;
                data.attributes.forEach(attr => {
                    is_valied = attr.title === title ? attr.id : is_valied;
                });

                return is_valied
            },
        }

        // setters
        const setters = {
            setCategory : (category) => {
                data.category = category;
                data.attributes = category.attributes.map(attr => {
                    attr.status = 0;
                    attr.meta   = Boolean(attr.meta) ? JSON.parse(attr.meta) : {};
                    return attr
                });
            },
            addNewAttr : (new_attr) => {
                if (!getters.isTitleExist(new_attr.title)) {
                    new_attr.id     = Math.round(Math.random() * 100000)
                    new_attr.status = 2;
                    new_attr.meta   =  new_attr.type == 'options' ? {options : []} : {
                        number : {    
                            field_number_from: 0,
                            field_number_to: 0,
                            field_number_metric: ""
                        }
                    };

                    data.attributes.push(new_attr);
                    return new_attr;
                }

                return false;
            },
            removeAttr : (attr_id) => {
                // data.attributes = data.attributes.filter(attr => attr.id != attr_id);
                let new_attributes = [];
                data.attributes.forEach(attr => {
                    if (attr.id == attr_id && (attr.status == 1 || attr.status == 0)) {
                        attr.status = -1;
                        new_attributes.push(attr);
                    } else if (attr.id != attr_id) {
                        new_attributes.push(attr);
                    } 
                });

                data.attributes = new_attributes;
            },
            updateAttribute : (attr_id, new_attr_val, key = null) => {
                data.attributes.forEach(attr => {
                    if (attr.id === attr_id) {
                        switch (attr.type) {
                            case "options":
                                attr.meta.options = new_attr_val;
                                attr.status = attr.status != 2 ? 1 : attr.status; 
                                break; 
                            case "number":
                                attr.meta.number[key] = new_attr_val;
                                attr.status = attr.status != 2 ? 1 : attr.status;
                                break;
                        }
                    }
                });
            }
        }

        // helpers 
        const helpers = {
            parseDataToInput : () => {
                let stringified_data = JSON.stringify(data.attributes);
                console.log(stringified_data); 
            }
        }

        return {
            getters,
            setters
        }
    })();

    const AttrView  = (() => {
        const render_keys = {
            prefix : 'custome-',
            keys : ['en_title', 'ar_title', 'is_main', 'category_id'],
            new_attr_keys : ['title', 'type'],
        };

        //get data
        const getNewAttData = () => {
            let data = {};
            let is_valied = true;
            
            render_keys.new_attr_keys.forEach((key) => {
                let input_val = $(`#${render_keys.prefix + key}`).val();
                if (Boolean(input_val)) {
                    data[key] = input_val;
                    $(`#${render_keys.prefix + key}`).css('border-color', '');
                } else {
                    is_valied = false;
                    $(`#${render_keys.prefix + key}`).css('border-color', 'red');
                }
            });

            if (is_valied) {
                render_keys.new_attr_keys.forEach((key) => {
                    $(`#${render_keys.prefix + key}`).val('');
                });
            }

            return is_valied ? data : is_valied;
        }

        const render = (data) => {
            helpers.renderCategory(data.category);
            helpers.renderAttributes(data.attributes);
            helpers.callSelect2JQ();
            
            $('#objectsCard').slideUp(500);
            $('#customeObjectCard').slideDown(500);
        };
        
        const renderNewAttrRow = ({id, title, type}) => {
            let active_field = type == 'options' ? 
            `<select class="attr-meta custome-m-options" data-target="${id}" data-type="option" multiple="multiple"></select>`
            : 
            `
                <input class="attr-meta" data-target="${id}" data-type="field_number_from" min="0" type="number" placeholder="min"/>
                <input class="attr-meta" data-target="${id}" data-type="field_number_to" min="0" type="number" placeholder="max"/>
                <input class="attr-meta" data-target="${id}" data-type="field_number_metric" type="text" placeholder="metric"/>
            `;
                    
            let attr_el = `
                <tr class="custome-attr-tr" id="customeAttr${id}">
                    <td>${title}</td>
                    <td>${type}</td>
                    <td>
                        ${active_field}
                    </td>
                    <td>
                        <button data-target="${id}" class="remove-tr-el btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            `;

            $('#custome-fields_container').prepend(attr_el);
            
            helpers.callSelect2JQ();
        };

        const showAlertOnAttrRow = (id) => {
            let backgroundInterval = setInterval(function(){
                $(`#customeAttr${id}`).toggleClass("blinker");
            },300)

            setTimeout(() => {
                clearInterval(backgroundInterval);
                $(`#customeAttr${id}`).removeClass("blinker");
            }, 1500);
        };

        const helpers = {
            renderCategory : (category) => {
                render_keys.keys.forEach(key => {
                    $(`#${render_keys.prefix}${key}`).val(category[key]);
                });
            },
            renderAttributes : (attributes) => {
                $('.custome-attr-tr').remove();

                attributes.forEach(attr => {
                    let { meta } = attr;
                    let active_field = attr.type == 'options' ? 
                    `
                        <select class="attr-meta custome-m-options" data-target="${attr.id}" data-type="option" multiple="multiple">
                            ${(meta.options.map(option => `<option selected="selected">${option}</option>`)).join()}
                        </select>
                    `
                    : 
                    `
                        <input class="attr-meta" data-target="${attr.id}" data-type="field_number_from" value="${meta.number.field_number_from}" type="number" placeholder="min"/>
                        <input class="attr-meta" data-target="${attr.id}" data-type="field_number_to" value="${meta.number.field_number_to}"    type="number" placeholder="max"/>
                        <input class="attr-meta" data-target="${attr.id}" data-type="field_number_metric"  value="${meta.number.field_number_metric}" type="text" placeholder="metric"/>
                    `;
                            
                    let attr_el = `
                        <tr class="custome-attr-tr" id="customeAttr${attr.id}">
                            <td>${attr.title}</td>
                            <td>${attr.type}</td>
                            <td>
                                ${active_field}
                            </td>
                            <td>
                                <button data-target="${attr.id}" class="remove-tr-el btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    `;

                    attr_el.status != -1 && $('#custome-fields_container').append(attr_el);
                });
            },
            callSelect2JQ : () => {
                $('.custome-m-options').select2({
                    tags: true,
                    width: '400px'
                });
            }
        };

        return {
            getNewAttData,
            render,
            renderNewAttrRow,
            showAlertOnAttrRow
        }
    })();

    const AttrController = ((store, view) => {
        const inite = () => {
            $('#dataTable').on('click', '.custome-object', function () {
                let target_id = $(this).data('object-id');

                if (target_id) {
                    $('#loddingSpinner').show(500);
                    axios.get(`{{ url('admin/products-categories') }}/${target_id}`, {
                        params : {
                            fast_acc : true
                        }
                    }).then(res => {
                        if (res.data.success) {
                            store.setters.setCategory(res.data.data);
                            return store.getters.getData();
                        }

                        return false;
                    }).then(data => {
                        view.render(data);
                        $('#loddingSpinner').hide(500);
                    });
                }
            })

            $('#custome-fields_container').on('click', '.remove-tr-el', function () {
                let target_id = $(this).data('target');

                $(`#customeAttr${target_id}`).remove();
                store.setters.removeAttr(target_id);
            });
            
            $('#custome-fields_container').on('change', '.attr-meta', function () {
                let target_id   = $(this).data('target');
                let target_type = $(this).data('type');
                let target_val  = $(this).val();

                if (Boolean(target_id)) {
                    store.setters.updateAttribute(target_id, target_val, target_type)
                }
            });
            
            $('#custome-add_custome_field').click(function () {
                /**
                 * 1- get data from the new attr fields
                 * 2- validate that the data we got is valied
                 * 3- send data to the store
                 * 4- make sure that ther is no replication,
                 * if not add new data to store, else show alert on the replication 
                 */
                let data = view.getNewAttData();
                let is_title_exist = store.getters.isTitleExist(data.title);
                
                if (is_title_exist) {
                    view.showAlertOnAttrRow(is_title_exist);
                } else if (data) {
                    data = store.setters.addNewAttr(data);
                    view.renderNewAttrRow(data);
                }
            });

            // submit the form 
            $('.custome-field-create').click(function () {
                /**
                 * # We will get the data direct from the store,
                 * so we dont need to get data from the form any more,
                 * we will do all required validation on this data
                 * to make sure that all fields are valied.
                 * 
                 * Than we will sent the request with data using
                 * axios.
                 * 
                 * # Notice this new senario for handling the data in the
                 * form we didn't need to get data from any fields directly 
                 * or from hidden fields.
                 * 
                 * # can we make same model in abstract class that can handle any
                 * form data ?! and can we use redux in this senario ?!
                 * 
                 */

                let data = store.getters.getRequestData();
                
                $('#loddingSpinner').show(500);

                axios.put(`{{ url('admin/products-categories') }}/${data.category_id}`, data)
                .then(res => {
                    $('#loddingSpinner').hide(500);
                    $('#objectsCard').slideDown(500);
                    $('#customeObjectCard').slideUp(500);
                });
                
            });
        };

        return {
            inite
        }
    })(AttrStore, AttrView);

    AttrController.inite();

});
</script>
@endpush