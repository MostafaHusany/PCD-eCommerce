<script>

/**
 * My DynamicTable Class, is a way ti hande datatable objects in genaric way
 * without the need re-do the routine work, like... 
 * The store, edit, & delete ui logic. 
 * 
 * So you only need to create an instance of DynamicTable, than give it the
 * required prams server routs, table id, and other ui elements id, than the whole 
 * logic is created !!
*/
class DynamicTable {
    routs;
    table_id;
    table_el_ids;
    table_object;
    current_objct;
    msg_container;

    constructor (
        routs = {
            index_route   : '',
            store_route   : '',
            show_route    : '',
            update_route  : '',
            destroy_route : '',
        },
        table_id = '#dataTable',
        msg_container = {
            success_el : '#successAlert',
            danger_el  : '#dangerAlert',
            warning_el : '#warningAlert'
        },
        table_el_ids = {
            table_id        : '#dataTable',
            toggle_btn      : '.toggle-btn',
            create_obj_btn  : '.create-object',
            update_obj_btn  : '.update-object',
            fields_list     : ['id', 'name', 'email', 'phone', 'category', 'category', 'password'],
            imgs_fields     : []
        },
        columns = [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'name', name: 'name' },
            { data: 'category', name: 'category' },
            { data: 'actions', name: 'actions' },
        ],
        search_function = () => {},
        custome_msg = {
            delete_msg : null
        }
    ) {

        let this_objct       = this;
        this.routs           = routs;
        this.table_id        = table_id;
        this.columns         = columns;
        this.table_el_ids    = table_el_ids;
        this.msg_container   = msg_container;
        this.search_function = search_function;
        this.search_request  = null;
        this.custome_msg     = custome_msg;

        // inite data-table
        this.table_object = $(this.table_id).DataTable({
            dom: "Btipl",
            // dom : 'Bfrtipl',
            buttons: [
                'copy', 'csv', 'excel', 'print'//, 'pdf'//
            ],
            processing: true,
            serverSide: true,
            ajax: this_objct.routs.index_route,
            columns : this_objct.columns,
            ajax: {
                url : this_objct.routs.index_route,
                data: this_objct.search_function
            },
        });
        
        // view manuplation model
        const toggleCard = (current_el_id , target_el_id) => {
            $(current_el_id).slideUp(500);
            $(target_el_id).slideDown(500);
        }

        // inite my event 
        $(this.table_el_ids.toggle_btn).click(function () {
            let current_el_id = $(this).data('current-card');
            let target_el_id  = $(this).data('target-card');

            toggleCard(current_el_id, target_el_id);
        });

        // submit form
        $(this.table_el_ids.create_obj_btn).click(function (e, current_objct = this_objct) {
            e.preventDefault();

            // get field attributes
            let data = current_objct._getFromData(current_objct.table_el_ids.fields_list, current_objct.table_el_ids.imgs_fields);
            
            // validate data
            let is_valied = current_objct.validateData(data);

            // send request
            if (is_valied) {
                $('#loddingSpinner').show(500);

                current_objct._postRequest(current_objct.routs.store_route, data)
                .then(res => {
                    if (res.success) {
                        current_objct.table_object.draw();
                        current_objct.clearForm(current_objct.table_el_ids.fields_list);
                        current_objct.showAlertMsg('Request made successfully', current_objct.msg_container.success_el);
                        
                        toggleCard('#createObjectCard', '#objectsCard');
                    } else {
                        current_objct.showAlertMsg('Somthing went rong please !!', current_objct.msg_container.danger_el);
                        console.log('my err response', res);// keep me for debuging
                        current_objct.showValidationErr(res.msg)
                    }// end :: if
                    
                    $('#loddingSpinner').hide(500);
                });
            }// end :: if
        });

        // update form
        $(this.table_el_ids.update_obj_btn).click(function (e, current_objct = this_objct) {
            e.preventDefault();

            // get field attributes
            let data = current_objct._getFromData(current_objct.table_el_ids.fields_list, current_objct.table_el_ids.imgs_fields, 'edit-');
            data.append('_method', 'put');
            
            // validate data
            let is_valied = current_objct.validateData(data, 'edit-');

            // send request
            if (is_valied) {
                $('#loddingSpinner').show(500);

                current_objct._postRequest(current_objct.routs.update_route + `/${data.get('id')}`, data)
                .then(res => {
                    if (res.success) {
                        current_objct.table_object.draw();
                        current_objct.clearForm(current_objct.table_el_ids.fields_list);
                        current_objct.showAlertMsg('Request made successfully', current_objct.msg_container.success_el);
                        
                        toggleCard('#editObjectsCard', '#objectsCard');
                    } else {
                        current_objct.showAlertMsg('Somthing went rong please refresh the page !!', current_objct.msg_container.danger_el);
                        console.log('my err response', res);// keep me for debuging
                        current_objct.showValidationErr(res.msg, 'edit-')
                    }// end :: if
                    
                    $('#loddingSpinner').hide(500);
                });
            }// end :: if
        });

        
        $('.search-action').on('keyup change', function (e, current_objct = this_objct) {
            if (current_objct.search_request != null) {
                clearTimeout(current_objct.search_request)
            }
            
            current_objct.search_request = setTimeout(() => {
                current_objct.table_object.draw();
            }, 1000);
        });

        // handle edit & delete event
        $(this.table_id).on('click', '.show-object', function (e, current_objct = this_objct) {
            let current_el_id = $(this).data('current-card');
            let target_el_id  = $(this).data('target-card');
            toggleCard(current_el_id, target_el_id);
        })
        .on('click', '.edit-object', function (e, current_objct = this_objct) {
            // console.log('test edit event !!', current_objct);
            // get object id
            let object_id = $(this).data('object-id');
            
            $('#loddingSpinner').show(500);
            
            // send a get request for object data
            current_objct._getRequest(current_objct.routs.show_route + `/${object_id}?fast_acc=true`)
            .then(res => {
                if (res.success) {
                    // show object data in edit form 
                    current_objct.addDataToForm(current_objct.table_el_ids.fields_list, current_objct.table_el_ids.imgs_fields, res.data, 'edit-');

                    // toggle edit card
                    let current_el_id = $(this).data('current-card');
                    let target_el_id  = $(this).data('target-card');
                    toggleCard(current_el_id, target_el_id);
                } else {
                    current_objct.showAlertMsg('Somthing went rong please refresh the page !!', current_objct.msg_container.danger_el);
                    console.log('my err response', res);// keep me for debuging
                }// end :: if
                
                $('#loddingSpinner').hide(500);
            });

            // show the edit form and show user data
        }).on('click', '.delete-object', function (e, current_objct = this_objct) {
            // console.log('test delete event !!', current_objct);
            // get object id
            let object_id   = $(this).data('object-id');
            let object_name = $(this).data('object-name');

            let message = current_objct.custome_msg.delete_msg != null ? current_objct.custome_msg.delete_msg + `"${object_name}"` 
                                                           : `Are you sure you want to delete "${object_name}"`;
            let flag = confirm(message);

            if (flag) {
                
                $('#loddingSpinner').show(500);
                let data = new FormData();
                data.append('_method', 'delete');
                data.append('_token' , $('meta[name="csrf-token"]').attr('content'));

                current_objct._postRequest(current_objct.routs.destroy_route + `/${object_id}`, data)
                .then(res => {
                    current_objct.table_object.draw();
                    $('#loddingSpinner').hide(500);
                });
            }// end :: if
        }).on('click', '.toggle-cards-btn', function () {
            let current_el_id = $(this).data('current-card');
            let target_el_id  = $(this).data('target-card');
            toggleCard(current_el_id, target_el_id);
        });
    }

    // get data
    _getRequest = async (url = '') => {
        const response = await fetch(url);
        
        // parses JSON response into native JavaScript objects
        return response.json(); 
    }

    // post data
    _postRequest = async (url = '', data = {}) => {
        const response = await fetch(url, {
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            // headers: {
            //     'Content-Type': 'application/json'
            // },
            body: data // body data type must match "Content-Type" header
        });
        
        // parses JSON response into native JavaScript objects
        return response.json();
    };

    // get form data 
    _getFromData = (fields_id_list, imgs_fields, prefix = '') => {
        // const data = {
        //     _token : $('meta[name="csrf-token"]').attr('content')
        // };
        
        const data = new FormData();
        data.append('_token', $('meta[name="csrf-token"]').attr('content'));

        fields_id_list.forEach(el_id => {
            // data[el_id] = $(`#${prefix + el_id}`).val();
            data.append(el_id, $(`#${prefix + el_id}`).val());
        });
        
        imgs_fields.forEach(el_id => {
            let files_list    = $(`#${prefix + el_id}`).get(0).files;

            for (let index = 0; index < files_list.length; index++) {
                data.append(`${el_id}[]`, files_list[index]);
            }// end :: for 
        });// imgs_fields
        
        return data;
    }

    // show object data in form fields
    addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        fields_id_list = fields_id_list.filter(el_id => !imgs_fields.includes(el_id) );
        fields_id_list.forEach(el_id => {
            $(`#${prefix + el_id}`).val(data[el_id]).change();
        });
    }

    // clear form fields values
    clearForm = (fields_id_list) => {
        fields_id_list.forEach(el_id => {
            $(`#${el_id}`).val('').change();
        });
    }

    // show dynamic messages
    showAlertMsg = (msg, el_id) => {
        $(el_id).text(msg).slideDown(500);
        setTimeout(() => {
            $(el_id).slideUp(500);
        }, 3000);
    }

    // validate data, uses polymorphism, because it diffre from user to other
    validateData = (data, prefix = '') => true;

    showValidationErr = (msgs, prefix = '') => {
        console.log(msgs);
        let keys = Object.keys(msgs);
        keys.forEach(key => {
            // for case of sub validation specialy for images !!
            let tmp_key = (key.split('.'))[0];
            $(`#${prefix}${tmp_key}Err`).html(msgs[key]).slideDown(500);
        });
    }
}
</script>