
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Create New {{ $object_title }}y</h5>
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
            <label for="en_title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-5">
                <input type="text" tabindex="1"  class="form-control" id="en_title" placeholder="Title">
                <div style="padding: 5px 7px; display: none" id="en_titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <input type="text"  tabindex="3" class="form-control text-right" dir="rtl" id="ar_title" placeholder="العنوان">
                <div style="padding: 5px 7px; display: none" id="ar_titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="en_description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <textarea  tabindex="2" class="form-control" id="en_description" placeholder="Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="en_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <textarea  tabindex="4" class="form-control text-right" id="ar_description" dir="rtl" placeholder="الوصف"></textarea>
                <div style="padding: 5px 7px; display: none" id="ar_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="is_main" class="col-sm-2 col-form-label">Is Main</label>
            <div class="col-sm-5">
                <select tabindex="5" class="form-control" id="is_main" data-target="#category_id">
                    <option selected="selected" value="1">Is Main</option>
                    <option value="0">Is Sub</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="is_mainErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>

            <div class="col-sm-5">
                <select  tabindex="6" class="form-control" id="category_id" disabled="disabled">
                    <option value="">-- select main category --</option>
                    @foreach($all_categories as $category)
                    <option value="{{ $category->id }}">{{ $category['ar_title'] . '||' . $category['en_title'] }}</option>
                    @endforeach
                </select>
                <div style="padding: 5px 7px; display: none" id="category_idErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="brands" class="col-sm-2 col-form-label">Brands</label>
            <div class="col-sm-10">
                <select tabindex="8" class="form-control" id="brands" min="0" value="0" multiple="multiple"></select>
                <div style="padding: 5px 7px; display: none" id="brandsErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <?php
                $categories_icons = ['ac-1.webp' => 'air cooling', 'ca-1.webp' => 'case', 'cpu.webp' => 'CPU', 'fa-1.webp' => 'fans',
                'gc.webp' => 'graphic cards', 'hdd.webp' => 'hard disck', 'ssdm2.webp' => 'solid state', 'mb.webp' => 'mother board', 'ps-1.webp' => 'power supply',
                'ram.webp' => 'ram', 'wc-1.webp' => 'water cooling', 'wf-1.webp' => 'wifi adapter'];
            ?>
            <label for="rule" class="col-sm-2 col-form-label">Category Icon</label>
            <div class="col-5">
                <select tabindex="9" id="icon" class="form-control">
                    <option value="">-- select icon --</option>
                    @foreach($categories_icons as $key => $icon)
                    <option data-icon="glyphicon-glass" value="{{$key}}">
                        {{$icon}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-5 text-center" id="show-icon">
                
            </div>
        </div><!-- /.form-group -->

        <hr/>

        
        
        <div class="form-group row">
            <div class="col-sm-12">
                <div style="padding: 5px 7px;" class="alert alert-info">
                    <b>
                        Here you can create an order limitation rule, that the customer can't order more than given number of this category.
                        <br/>If there is no rule leave the dafault value 0
                    </b>  
                </div>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="rule" class="col-sm-2 col-form-label">Rule</label>
            <div class="col-sm-12">
                <input tabindex="10" type="number" class="form-control" id="rule" min="0" value="0">
                <div style="padding: 5px 7px; display: none" id="ruleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <button tabindex="10" class="create-object btn btn-primary float-right">Create {{ $object_title }}y</button>
    </form>
</div>

@push('page_scripts')
<script>
$(document).ready(function () {
    const create_form_custome_option = (function () {
        function starter_event () {
            $('#field_options').select2({
                tags  : true,
                width : '100%'
            });

            $('#icon').change(function () {
                let icon_name = $(this).val();
                if (Boolean(icon_name)) {
                    let icon = `
                        <div style="background-color: #ddd; border-radius: 20px; display: inline-block">
                            <img width="80px" src="{{ asset('images/Icons/') }}/${ icon_name }" >
                        </div>
                    `
                    $("#show-icon").html(icon)
                } else {
                    $("#show-icon").html('')
                }
            });

        }// end :: starter_event

        return {
            starter_event : starter_event
        }
    })();
    
    create_form_custome_option.starter_event();
});
</script>
@endpush