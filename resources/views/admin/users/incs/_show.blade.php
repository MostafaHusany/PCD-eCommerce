
<div style="display: none" id="showObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('users.Show_User')</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#showObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <div>
        <table class="table">
            <tr>
                <td>@lang('users.Name')</td>
                <td id="show-name"></td>
            </tr>
            <tr>
                <td>@lang('users.Email')</td>
                <td id="show-email"></td>
            </tr>
            <tr>
                <td>@lang('users.Phone')</td>
                <td id="show-phone"></td>
            </tr>
            <tr>
                <td>@lang('users.Category')</td>
                <td id="show-category"></td>
            </tr>
            <tr>
                <td>@lang('users.Role')</td>
                <td id="show-role"></td>
            </tr>
            <tr>
                <td>@lang('users.Permissions')</td>
                <td id="show-permissions"></td>
            </tr>
        </table>
    </div>
</div>

<script>
$(document).ready(function () {
    
    // clear old session 
    $('.toggle-btn').click(function () {
        $('#category').val('admin').trigger('change');
    });

    
    $('#dataTable').on('click', '.show-object', function () {
        let target_user = $(this).data('object-id');
        let keys = ['name', 'email', 'phone', 'category', 'permissions'];
        
        $('#loddingSpinner').show();

        axios.get(`{{ url('admin/users') }}/${target_user}`, {
            params : {
                'fast_acc' : true
            }
        }).then(res => {
            let { data, success } = res.data;
            
            if (success) {
                if (Boolean(data.role)) {
                    let user_role = `<span class="badge badge-pill badge-primary">${data.role.display_name}</span>`;
                    $(`#show-role`).html(user_role);
                } else {
                    $(`#show-role`).text('---');
                }

                keys.forEach(key => {
                    if (Boolean(data[key]) && key == 'permissions') {
                        let permissions = '';
                        data[key].forEach(permission => {
                            permissions += `<span class="badge badge-pill badge-warning mx-1">${permission.display_name}</span>`;
                        });
                        $(`#show-${key}`).html(permissions);
                    } else if (Boolean(data[key])) {
                        $(`#show-${key}`).text(data[key]);
                    } else {
                        $(`#show-${key}`).text('---');
                    }
                });
            }
        }).catch((err) => {
            console.log(err);
            $('#dangerAlert').text('Somthing went wrong please refresh the page !').slideDown();
        }).finally(() => {
            $('#loddingSpinner').hide();
        });
    });
    
});
</script>