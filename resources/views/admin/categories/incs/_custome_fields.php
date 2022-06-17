
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
            <label for="is_main" class="col-sm-2 col-form-label">Is Main</label>
            <div class="col-sm-5">
                <select class="form-control" id="is_main" data-target="#category_id">
                    <option selected="selected" value="1">Is Main</option>
                    <option value="0">Is Sub</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="is_mainErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>

            <div class="col-sm-5">
                <select class="form-control" id="category_id" disabled="disabled">
                    <option value="">-- select main category --</option>
                    @foreach($all_categories as $category)
                    <option value="{{ $category->id }}">{{ $category['ar_title'] . '||' . $category['en_title'] }}</option>
                    @endforeach
                </select>
                <div style="padding: 5px 7px; display: none" id="category_idErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <hr />

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label mt-4">Custome Fields</label>

            <div class="col-sm-2">
                <label for="field_title">Field Title</label>
                <input tabindex="6" id="field_title" class="form-control" placeholder="Field Title">
                <div style="padding: 5px 7px; display: none" id="field_titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.col-sm-2 -->

            <div class="col-sm-2">
                <label for="">Field Type</label>
                <select tabindex="7" id="field_type" class="form-control">
                    <option value="options" selected="selected">Options</option>
                    <option value="number">Number</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="field_typeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.col-sm-2 -->

            <div class="col-sm-3" style="!display: none">

                <div class="field_values field_options">
                    <label for="">Field Options</label>
                    <select tabindex="8" id="field_options" multiple="multiple" name="" id="" class="form-control"></select>
                    <div style="padding: 5px 7px; display: none" id="field_optionsErr" class="err-msg mt-2 alert alert-danger">
                    </div>
                </div><!-- /.field_options -->

                <div class="row field_values field_number" style="display: none">
                    <div class="col-6">
                        <label for="field_number_from">From</label>
                        <input tabindex="8" id="field_number_from" type="number" min="0" class="form-control" placeholde="Start from">
                        <div style="padding: 5px 7px; display: none" id="field_number_fromErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div><!-- /.col-6 -->
                    <div class="col-6">
                        <label for="field_number_to">To</label>
                        <input tabindex="8" id="field_number_to" type="number"  min="0" class="form-control" placeholde="end at">
                        <div style="padding: 5px 7px; display: none" id="field_number_toErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div><!-- /.col-6 -->
                </div><!-- /. field_number -->
            </div><!-- /.col-sm-3 -->

            <div class="col-sm-2 field_values field_number" style="display: none">
                <label for="">Metric</label>
                <input tabindex="9" id="field_number_metric" class="form-control" placeholder="metric inc, ghz, etc..">
                <div style="padding: 5px 7px; display: none" id="field_number_metricErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.col-sm-2 -->

            <div class="col-sm-1">
                <button tabindex="10" class="btn btn-sm btn-primary add_custome_field" style="margin-top: 35px">
                    <i class="fas fa-plus"></i>
                </button>
            </div><!-- /.col-sm-2 -->
        </div><!-- /.form-group -->

        <div class="form-group" style="height: 300px; overflow-y: scroll">
            <table class="table">
                <tr>
                    <td>Title</td>
                    <td>Type</td>
                    <td>Values</td>
                    <td>Actions</td>
                </tr>
                <input id="custome_fields" type="hidden" value="">
                <tbody id="fields_container"></tbody>
            </table>
        </div>

        <button class="create-object btn btn-primary float-right">Create {{ $object_title }}y</button>
    </form>
</div>

@push('page_scripts')
<script>
$(document).ready(function () {
    const AttrStore = (() => {})();
    const AttrView  = (() => {})();
    const AttrController = ((store, view) => {})(AttrStore, AttrView);
});
</script>
@endpush