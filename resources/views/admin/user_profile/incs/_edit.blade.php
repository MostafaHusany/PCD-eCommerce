<div style="display: none" id="editObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Update User</h5>
        </div>
        <div class="col-6 text-right">
            <div class="close-btn toggle-btn btn btn-default btn-sm" data-current-card="#editObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <div id="objectForm">
        <div class="form-group row">
            <label for="edit-name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" value="{{ $target_user->name }}" class="form-control" id="edit-name" placeholder="Name" disabled="disabled">
                <div style="padding: 5px 7px; display: none" id="edit-nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" value="{{ $target_user->email }}" class="form-control" id="edit-email" placeholder="Email">
                <div style="padding: 5px 7px; display: none" id="edit-emailErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="phone" value="{{ $target_user->phone }}" class="form-control" id="edit-phone" placeholder="Phone">
                <div style="padding: 5px 7px; display: none" id="edit-phoneErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-password_old" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-10">
                <input type="password" value="12345678" class="form-control" id="edit-password_old" placeholder="Old password">
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-password" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input type="password" value="12345678" class="form-control" id="edit-password" placeholder="New password">
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" value="12345678" class="form-control" id="edit-password_confirmation" placeholder="Confirm password">
            </div>
        </div><!-- /.form-group -->

        <button class="update-object btn btn-warning float-right">Update Account</button>
    </div>
</div>

<script>
$(document).ready(function () {
    const fields = ['email', 'phone', 'password_old', 'password', 'password_confirmation']
    $('.update-object').click(function () {
        
        let data = getData();
        
        if (validateData(data)) {
            $('#loddingSpinner').show(500);
            
            data._token = "{{ csrf_token() }}";
            axios.post('{{ url("admin/my-profile") }}', data)
            .then(res => {
                const { data } = res;
                console.log(data.success);

                if (data.success) {
                    $('.close-btn').trigger('click');
                    $('#successAlert').text('You updated your profile successfuly !').slideDown(500);
                    setTimeout(() => {
                        $('#successAlert').text('').slideUp(500);
                    }, 3000);
                } else {
                    const { msg } = data;
                    const keys    = Object.keys(msg);
                    let ulElm     = document.createElement('ul');
                    let errMsgStr = '';

                    keys.forEach(key => {
                        msg[key].forEach(err => {
                            errMsgStr += `<li>${key} : ${err}</li>`;
                        });
                    });

                    ulElm.innerHTML = errMsgStr;
                    $('#dangerAlert').html('').append(ulElm).slideDown(500);
                }

                $('#loddingSpinner').hide(500);
            })
        }
    });

    function getData () {
        let data = {};

        fields.forEach(key => data[key] = $(`#edit-${key}`).val());

        return data;
    }

    function validateData (data) {
        let is_valied = true;

        fields.forEach(key => {
            if (!Boolean(data[key])) {
                is_valied = false;
                $(`#edit-${key}`).css('border', '1px solid red');
            } else {
                $(`#edit-${key}`).css('border', '');
            }
        });
        
        return is_valied;
    }
    
});
</script>