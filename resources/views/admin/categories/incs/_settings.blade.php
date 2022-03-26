
<div style="display: none" id="selectNavbarCategories" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Select Navbar Main Categories</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#selectNavbarCategories" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <div>
        <div class="form-group row">
            <label for="nav_selected_categories" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <select type="text" tabindex="1"  class="form-control" id="nav_selected_categories" multiple="multiple"></select>
                <div style="padding: 5px 7px; display: none" id="nav_selected_categoriesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>

        <button class="update-navbar btn btn-warning float-right">Update Navbar Settings</button>
    </form>
</div>

@push('page_scripts')
<script>
$(document).ready(function () {
    $('#nav_selected_categories').select2({
        allowClear: true,
        width: '100%',
        placeholder: 'Select categories',
        ajax: {
            url: '{{ url("admin/products-categories-search") }}?is_main=true',
            dataType: 'json',
            delay: 150,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: `${item['ar_title']} || ${item['en_title']}`,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('.update-navbar').click(function (e) {
        e.preventDefault();

        $('#loddingSpinner').show();

        axios.post(`{{ url('admin/products-categories') }}/0`, {
            _token  : "{{ csrf_token() }}",
            _method : "PUT",
            categories : $('#nav_selected_categories').val()
        })
        .then(res => {
            $('#loddingSpinner').hide();

            if (res.data.success) {
                $('#objectsCard').slideDown(500);    
                $('#selectNavbarCategories').slideUp(500);   
                
                $('#successAlert').text('Navbar selected categories was updated !!').slideDown(500);
                setTimeout(() => {
                    $('#successAlert').text('').slideUp(500);
                }, 3000);
            } else {
                $('#dangerAlert').text('Something went wrong, please contact admin !!').slideDown(500);
                setTimeout(() => {
                    $('#dangerAlert').text('').slideUp(500);
                }, 3000);
            }
        });
    });
});
</script>
@endpush