<div style="display: none" id="showObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Show {{$object_title}}</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#showObjectsCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <div action="/" id="objectForm">
        <input type="hidden" id="edit-id">
        
        <div class="form-group row">
            <label for="show-name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="show-name" placeholder="Name" disabled="disabled">
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="show-description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="show-description" placeholder="Description" disabled="disabled"></textarea>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row" style="height: 300px; overflow-y: scroll">
            <label class="col-sm-2">
                Children Tags
            </label>
            <div class="col-sm-10">
                <table class="table">
                    <tr>
                        <td>Name</td>
                    </tr>
                    <tbody id="show-childrenTableContainer">

                    </tbody>
                </table>
            </div><!-- /.col-sm-10 -->
        </div>
    </div>
</div>