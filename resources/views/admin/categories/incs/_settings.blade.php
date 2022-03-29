@push('page_css')
<style>
    .categories_menu {
        width: 229px;
    }

    .categories-list {
        min-height: 200px;
        padding: 5px;
        border: 1px solid #aaa;
        box-shadow: 0px 5px 10px rgb(0 0 0 / 10%);
        width: 100%;
    }

    .categories-list ul {
        list-style: none;
        padding: 0;
        margin: 10px 5px;
        font-size: 14px;
    }

    .categories-list .show-sub {
        float: right;
        margin-top: 5px;
    }

    .categories-btn {
        background-color: #FF324D;
        border: 1px solid #FF324D;
        padding: 13px 15px;
        color: #fff;
        text-align: left;
        width: 100%;
        color: #fff;
        text-transform: uppercase;;
    }

    .categories-btn span {
        font-weight: bold;
    }

    .categories-btn:hover {
        color: #fff;
    }

    .category-icon {
        font-size: 1.3rem;
        margin-right: 0;
        float: right;
    }
</style>
@endpush

<div style="!display: none" id="selectNavbarCategories" class="card card-body">
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

        <div class="form-group">
            <!-- load the look of the navbar -->
            <div style="background: #fff; min-height: 400px; border: 1px solid #ddd" class="p-4 look-container">
                    <div class="categories_menu">
                        <div class="btn categories-btn">
                            <span>All Categories </span>
                            <i class="category-icon fas fa-bars"></i>
                        </div>

                        <div class="categories-list">
                            <ul>
                                
                            </ul> 
                        </div>
 
                    </div><!-- /.categories_menu -->

            </div><!-- /.look-container -->
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
    }).change(function () {
        let categoreis_id = $(this).val();
        
        axios("{{ url('admin/products-categories') }}/0", { 
            params : {
                group_acc : true,
                categoreis_id : categoreis_id
            }
        }).then(res => {
            console.log(res);
            if (res.data.success) {
                append_category(res.data.data);
            }
        })
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

    function append_category (categories_list) {
        $('.categories-el-li').remove();
        
        let el_list = '';
        categories_list.forEach(category => {
            el_list += `
            <li class="my-2 categories-el-li">
                <i class="mx-2 fas fa-cog"></i>
                <span>${category.en_title}</span>
                <i class="show-sub fas fa-angle-right"></i>
            </li>`;
        });

        $('.categories-list ul').append(el_list);
    }

});
</script>
@endpush