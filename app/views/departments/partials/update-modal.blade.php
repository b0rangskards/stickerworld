<div class="modal fade modal-form" id="updateDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Department</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::open(['route' => 'update_department_path', 'method' => 'PUT', 'id' => 'update-department-form', 'role' => 'form']) }}

                            <div class="form-group">
                                {{ Form::label('name', 'Department', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-6">
                                    {{ Form::text('name', null,
                                       ['class'      => 'form-control',
                                       'autofocus'   => 'autofocus',
                                       'required'    => 'required']) }}
                                     <p class="help-block"></p>
                                </div>
                            </div>

                            {{ Form::hidden('id', null) }}

                        {{ Form::close() }}
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-primary modalSubmitBtnForm" type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>

