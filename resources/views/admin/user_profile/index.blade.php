@extends('layouts.admin.app')


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin') }}">Dashboard</a>
                    </li>
                    
                    <li class="breadcrumb-item active">
                        Profile
                    </li>
                </ol>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->


<div class="container-fluid">

    <div id="successAlert" style="display: none" class="alert alert-success"></div>
    
    <div id="dangerAlert"  style="display: none" class="alert alert-danger"></div>
        
    <div id="warningAlert" style="display: none" class="alert alert-warning"></div>

    <div class="d-flex justify-content-center mb-3">
        <div id="loddingSpinner" style="display: none" class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div id="objectsCard" class="card card-body">
        <div class="row mb-4">
            <div class="col-6">
                <h5>Hello {{$target_user->name}}</h5>
            </div>
            <div class="col-6 text-right">
                <!-- <div class="relode-btn btn btn-info btn-sm">
                    <i class="relode-btn-icon fas fa-redo"></i>
                    <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                </div> -->

                @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo(['users_add']))
                <div class="toggle-btn btn btn-warning btn-sm" data-current-card="#objectsCard" data-target-card="#editObjectCard">
                    <i class="fas fa-edit"></i>
                </div>
                @endif
            </div>
        </div><!-- /.row -->
        
        <!-- START SEARCH BAR -->
        <div class="">
            <table class="table">
                <tr>
                    <td>Email</td>
                    <td>{{isset($target_user->email) ? $target_user->email : '---'}}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{isset($target_user->phone) ? $target_user->phone : '---'}}</td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>{{isset($target_user->category) ? $target_user->category : '---'}}</td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                        @if(sizeof($target_user->roles))
                            @foreach($target_user->roles as $role)
                            <span class="badge badge-pill badge-primary">{{ $role->name }}</span>
                            @endforeach
                        @else 
                            --- 
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Permissions</td>
                    <td>
                        @if(sizeof($target_user->permissions))
                            @foreach($target_user->permissions as $permission)
                            <span class="badge badge-pill badge-info">{{ $permission->name }}</span>
                            @endforeach
                        @else 
                            --- 
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div><!-- /.card --> 

    @include('admin.user_profile.incs._edit')
    
</div>
@endsection

@push('page_scripts')
<script>
$(document).ready(function () {
    $('.toggle-btn').click(function () {
        let target_card = $(this).data('target-card');
        let current_card = $(this).data('current-card');

        $(target_card).slideDown(500);
        $(current_card).slideUp(500);
        $('#dangerAlert').html('').slideUp(500);
    });
    
});
</script>
@endpush