<div class="modal fade modal-form" id="newPermissionGroupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Permission Group</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                     <div class="col-md-12">
                        {{ Form::open(['route' => 'new_permission_group_path', 'id' => 'new-permission-group-form', 'class' => 'form-horizontal', 'role' => 'form']) }}
                            <div class="form-group">
                                {{ Form::label('name', 'Group Name', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-8">
                                    {{ Form::text('name', null,
                                       ['class'      => 'form-control',
                                       'autofocus'   => 'autofocus',
                                       'placeholder' => 'eg. User Management, User Registration',
                                       'required'    => 'required']) }}
                                     <p class="help-block"></p>
                                </div>
                            </div>
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

