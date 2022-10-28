@extends('layouts.admin.app')


@push('page_css')
<style>

    .btn {
        padding: 2px 2px 2px 4px;
        font-size: 12px;
    }
    .footer-layout {
        color : #fff;
        background-color: #202325;
        /* min-height: 500px; */

        overflow: hidden;
    }

    .inner-container {
        width: 90%;
        margin: 50px auto;
    }

    .footer-layout hr {
        color: #fffdfd !important;
        height: 0.01px;
        background-color: #b1adad;
    }

    .footer-text {
        text-align: center;
        color: #fff;
        padding: 20px;
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
            <div id="loddingSpinner" style="display: none" class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <!-- load the look of the footer -->
        <div class="form-group">
            <div class="footer-layout">
                <div class="inner-container">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="col-content mb-3">
                                <button class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div><!-- /.col-content -->

                            <img style="width: 75px" src="{{ asset('images/logo-light.webp') }}" alt="">
                            
                            <div class="column-content mt-3">
                                <h5>Add Pargaraph</h5>
                            </div><!-- /.column-content -->
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3">
                            <div class="col-content mb-3">
                                <button class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div><!-- /.col-content -->
                            
                            <div class="column-content">
                                <h5>Add Links ...</h5>
                            </div><!-- /.column-content -->
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3">
                            <div class="col-content mb-3">
                                <button class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div><!-- /.col-content -->

                            <div class="column-content">
                                <h5>Add Links ...</h5>
                            </div><!-- /.column-content -->
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3">
                            <div class="col-content mb-3">
                                <button class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div><!-- /.col-content -->

                            <div class="column-content">
                                <h5>Add Links ...</h5>
                            </div><!-- /.column-content -->
                        </div><!-- /.col-md-3 -->

                    </div><!-- /.row -->
                </div><!-- /.inner-container -->
                <hr/>
                <p class="footer-text">© 2020 All Rights Reserved by Dwingsa</p>
            </div><!-- /.footer-layout -->
        </div><!-- /.form-group -->
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
            columns : {
                col1 : null,
                col2 : null,
                col3 : null,
                col4 : null,
            }
        };
        
        const setters = {};

        const getters = {};

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
        
        const frontGetter = {};

        const frontSetter = {};

        const helpers = {};

        const pluginCall = (() => {})();

        return {
            fields,
            frontGetter,
            frontSetter
        }
    })();

    const Controller = ((store, view) => {
        const inite = () => {}

        return {
            inite
        }
    })(Store, View);

    Controller.inite()
});
</script>
@endpush