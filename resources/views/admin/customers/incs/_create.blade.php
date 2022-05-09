
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Create New User</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#createObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <form action="/" id="objectForm">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Name">
                <div style="padding: 5px 7px; display: none" id="nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Email">
                <div style="padding: 5px 7px; display: none" id="emailErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="country_id" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
                <select class="form-control" id="country_id" data-prefix="">
                    <option value="">-- select country --</option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}" data-code="{{$country->phone_code}}">{{$country->name}}</option>
                    @endforeach
                </select>
                <div style="padding: 5px 7px; display: none" id="country_idErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="gove_id" class="col-sm-2 col-form-label">Governorate</label>
            <div class="col-sm-10">
                <select class="form-control" id="gove_id">
                    <option value="">-- select governorate --</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="gove_idErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-1">
                <input class="form-control" id="phone_code" value="---" disabled="disabled">
            </div><!-- /.col-sm-1 -->
            <div class="col-sm-9">
                <input type="phone" class="form-control" id="phone" placeholder="Phone">
                <div style="padding: 5px 7px; display: none" id="phoneErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.col-sm-9 -->
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="address"></textarea>
                <div style="padding: 5px 7px; display: none" id="addressErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" placeholder="Password">
            </div>
        </div><!-- /.form-group -->

        <button class="create-object btn btn-primary float-right">Create User</button>
    </form>
</div>