@extends('layouts.admin.app')


@push('page_css')
<style>

</style>
@endpush

@section('content')
@php
$object_title = 'Contacts Info';
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
                        {{$object_title}}
                    </li>
                </ol>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<div id="selectNavbarCategories" class="card card-body">
    
    <div>


        <div id="editForm" style="display: none;" class="clearfix" >
            <div class="row">
                <div class="col-6">
                    <h5>Edit Footer Column</h5>
                </div>
                <div class="col-6 text-right">

                    <div class="form-group">
                        <label for="Title">Column Title</label>
                        <input type="text" class="form-control" placeholder="add column title">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="" class="form-label">Link</label>
                                <input type="text" class="form-control">
                            </div><!-- /.col-4 -->
                            
                            <div class="col-4">
                                <label for="" class="form-label">Link</label>
                                <input type="text" class="form-control">
                            </div><!-- /.col-4 -->
                            
                            <div class="col-4">
                                <label for="" class="form-label">Link</label>
                                <input type="text" class="form-control">
                            </div><!-- /.col-4 -->
                        </div><!-- /.row -->
                    </div><!-- /.form-group -->

                    <div id="closeEditForm" class="toggle-btn btn btn-default btn-sm" data-current-card="#selectNavbarCategories"
                        data-target-card="#objectsCard">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            </div><!-- /.row -->

            <hr />

            
            <button !disabled="disabled" id="editLink" class="btn btn-warning float-right">Edit Slider</button>
        </div><!-- #editForm -->

        <hr />

        <div id="successAlert" style="display: none" class="alert alert-success"></div>
        
        <div id="dangerAlert"  style="display: none" class="alert alert-danger"></div>
            
        <div id="warningAlert" style="display: none" class="alert alert-warning"></div>
        
        <div class="d-flex justify-content-center mb-3">
            <!-- <div id="loddingSpinner" style="display: none" class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div> -->
        </div>

        <!-- load contacts edit form -->
        <div style="position: relative;">
            <div style="
                    display: none;
                    position: absolute;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    font-size: 2rem;
                    left: 0;" 
                    id="loddingSpinner" class="overlay mb-3"
                >
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
            
            <div class="form-group row">
                <label for="email" class="col-2 form-control-label">Email</label>
                <input type="type" id="email" class="col-10 form-control">
            </div><!-- /.form-group -->

            
            <div class="form-group row">
                <label for="phone" class="col-2 form-control-label">Phone</label>
                <input type="number" id="phone" class="col-10 form-control">
            </div><!-- /.form-group -->
            
            <div class="form-group row">
                <label for="whatsapp" class="col-2 form-control-label">Whatsapp Number</label>
                <input type="number" id="whatsapp" class="col-10 form-control">
            </div><!-- /.form-group -->

            <div class="form-group row">
                <label for="facebook" class="col-2 form-control-label">Facebook</label>
                <input type="linke" id="facebook" class="col-10 form-control">
            </div><!-- /.form-group -->
            
            <div class="form-group row">
                <label for="instagram" class="col-2 form-control-label">Instagram</label>
                <input type="linke" id="instagram" class="col-10 form-control">
            </div><!-- /.form-group -->

            <div class="form-group row">
                <label for="linkedin" class="col-2 form-control-label">Linkedin</label>
                <input type="linke" id="linkedin" class="col-10 form-control">
            </div><!-- /.form-group -->

            <div class="form-group row">
                <label for="en_description" class="col-2">Description</label>
                <div class="col-5" style="padding-left: 0;">
                    <textarea class="form-control" id="en_description" placeholder="about the company"></textarea>
                </div><!-- /.col-5 -->
                <div class="col-5" style="padding-left: 0;">
                    <textarea class="form-control" style="text-align: right;" placeholder="عن الشركة" id="ar_description" ></textarea>
                </div><!-- /.col-5 -->
            </div>

            <div class="form-group row">
                <label for="en_address" class="col-2">Address</label>
                <div class="col-5" style="padding-left: 0;">
                    <textarea class="form-control" id="en_address" placeholder="address"></textarea>
                </div><!-- /.col-5 -->
                <div class="col-5">
                    <textarea class="form-control" style="text-align: right;" placeholder="العنوان" id="ar_address"></textarea>
                </div><!-- /.col-5 -->
            </div>

            <button class="update-contacts btn btn-warning float-right mt-4">Update Contacts Info</button>
        </div><!-- /.load contacts edit form -->
    </div>
</div>
@endsection

@push('page_scripts')
<script>
$(document).ready(function() {
    
    const Store = (() => {
        const data = {
            contacts_keys : [
                'phone', 'email', 'linkedin',
                'facebook', 'whatsapp', 'instagram',
                'ar_address', 'en_address',
                'ar_description',  'en_description'
            ],
            contacts : {
                phone       : '',
                email       : '',
                linkedin    : '',
                facebook    : '',
                whatsapp    : '',
                instagram   : '',
                ar_address  : '',
                en_address  : '',
                ar_description    : '',
                en_description    : '',
            }
        };
        
        const setters = {
            addContact (key, val) {
                if (data.contacts_keys.includes(key)) {
                    data.contacts[key] = val;  
                }
            },

            setContacts (data) {
                data.contacts = data; 
            }
        };

        const getters = {
            getData () {
                return Object.assign({}, data.contacts);
            }
        };

        const helpers = {};
        
        return {
            setters,
            getters
        }
    })();

    const View = (() => {
        const fields = [
            'phone', 'email', 'linkedin',
            'facebook', 'whatsapp', 'instagram',
            'ar_address', 'en_address',
            'ar_description',  'en_description'
        ]
        
        const frontGetter = {
            getFormData () {
                let data = {};
                fields.forEach(field => {
                    data[field] = $(`#${field}`).val()
                });

                return data;
            }
        };

        const frontSetter = {
            renderFormValues (formData) {
                fields.forEach(field => {
                    $(`#${field}`).val(formData[field])
                });
            }
        };

        const helpers = {};

        const pluginCall = (() => {})();

        return {
            fields,
            frontGetter,
            frontSetter
        }
    })();

    const Controller = ((store, view) => {
        const inite = () => {
            $('#loddingSpinner').show(500);

            axios.get(`{{ url('admin/theme/contacts-info') }}`, {
                params : {
                    contacts_info : true
                }
            })
            .then(res => {
                
                $('#loddingSpinner').hide(500);

                let { data, success} = res.data;
                
                if (success) {
                    store.setters.setContacts(data);
                    view.frontSetter.renderFormValues(data);
                } else {
                    throw 'error';
                }
            })
            .catch(err => {
                $('#loddingSpinner').hide(500);
                $('#dangerAlert').text('Something went rong !').slideDown(500);
            });


            $('.update-contacts').on('click', function () {
                $('#loddingSpinner').show(500);
                
                const data = view.frontGetter.getFormData();
                data.contacts_info = true;
                
                axios.post("{{ url('admin/theme/contacts-info') }}", data)
                .then(res => {
                    const { success } = res.data;

                    if (success) {
                        $('#loddingSpinner').hide(500);
                        $('#successAlert').text('Contacts info updated successfully').slideDown(500);

                        setTimeout(() => {
                            $('#successAlert').slideUp(500);
                        }, 5000);
                    } else {
                        throw 'error';
                    }
                })
                .catch(err => {
                    $('#loddingSpinner').hide(500);
                    $('#dangerAlert').text('Something went rong !').slideDown(500);
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