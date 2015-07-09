<div class="modal fade modal-form" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Role</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                     <div class="col-md-12">
                        {{ Form::open(['route' => 'new_role_path', 'id' => 'new-role-form', 'class' => 'form-horizontal', 'role' => 'form']) }}
                            <div class="form-group">
                                {{ Form::label('name', 'Role', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-8">
                                    {{ Form::text('name', null,
                                       ['class'      => 'form-control',
                                       'autofocus'   => 'autofocus',
                                       'placeholder' => 'eg. Super Admin, Moderator',
                                       'required'    => 'required']) }}
                                     <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('description', 'Description', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-8">
                                    {{ Form::textarea('description', null,
                                       ['class'      => 'form-control',
                                       'placeholder' => 'Enter description here...',
                                       'rows'        => '6']) }}
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

