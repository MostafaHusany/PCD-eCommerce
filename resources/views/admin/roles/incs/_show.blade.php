
<div style="display: none" id="showObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('roles.Show_Role')</h5>
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
                <td>@lang('roles.Name')</td>
                <td id="show-name"></td>
            </tr>
            <tr>
                <td>@lang('roles.Description')</td>
                <td id="show-description"></td>
            </tr>
            <tr>
                <td>@lang('roles.Permissions')</td>
                <td id="show-permissions"></td>
            </tr>
        </table>
    </div>

    <h3>@lang('roles.Assigned_Users')</h3>
    <div style="height: 300px; overflow-y: scroll">
        <table class="table">
            <tr>
                <td>#</td>
                <td>@lang('roles.Name')</td>
                <td>@lang('roles.Category')</td>
                <td>@lang('roles.Email')</td>
                <td>@lang('roles.Phone')</td>
            </tr>
            <tbody id="show-users">

            </tbody>
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
        let target_role = $(this).data('object-id');
        let keys = ['name', 'description', 'permissions'];
        
        clearForm();
        $('#loddingSpinner').show();

        axios.get(`{{ url('admin/roles') }}/${target_role}`, {
            params : {
                'fast_acc' : true
            }
        }).then(res => {
            let { data, success } = res.data;
            
            if (success) {
                console.log(data);
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

                renderUsers(data.users);
            }
        }).catch((err) => {
            console.log(err);
            $('#dangerAlert').text('Somthing went wrong please refresh the page !').slideDown();
        }).finally(() => {
            $('#loddingSpinner').hide();
        });
    });

    function renderUsers (users) {
        let usersEls = '';

        users.forEach(user => {
            usersEls += `
                <tr>
                    <td>${ user.id }</td>
                    <td>${Boolean(user.name) ? user.name : '---'}</td>
                    <td>${Boolean(user.category) ? user.category : '---'}</td>
                    <td>${Boolean(user.email) ? user.email : '---'}</td>
                    <td>${Boolean(user.phone) ? user.phone : '---'}</td>
                </tr>
            `;
        });

        $('#show-users').html(usersEls);
    }
    
    function clearForm() {
        let keys = ['name', 'description', 'permissions'];

        keys.forEach(key => {
            $(`#show-${key}`).text('---');
        });

        $('#show-users').html('');
    }
});
</script>