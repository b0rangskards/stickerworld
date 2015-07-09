<div class="modal fade modal-form" id="updatePermissionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Permission</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                     <div class="col-md-12">
                        {{ Form::open(['route' => 'update_permission_path', 'method' => 'PUT', 'id' => 'update-permission-form', 'class' => 'form-horizontal', 'role' => 'form']) }}
                              {{ Form::hidden('id') }}

                              <div class="form-group">
                                  {{ Form::label('route', 'Select Group', ['class' => 'col-md-3 control-label']) }}
                                  <div class="col-md-8">
                                      <select name="group_id" class="form-control" id="permission-group-select">
                                      @foreach(PermissionGroup::all() as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                      @endforeach
                                      </select>
                                      <p class="help-block"></p>
                                  </div>
                              </div>
                            <div class="form-group">
                                {{ Form::label('name', 'Name', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-8">
                                    {{ Form::text('name', null,
                                       ['class'      => 'form-control',
                                       'autofocus'   => 'autofocus',
                                       'placeholder' => 'eg. Add Item, View All Item',
                                       'required'    => 'required']) }}
                                     <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('route', 'Select Route', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-8">
                                    <select name="route" class="form-control" id="permission-route-select">
                                        @foreach($selectOptionAllRoutes as $routeValue => $prettyRoute)
                                            <option value="{{$routeValue}}">{{$prettyRoute}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('description', 'Description', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-8">
                                    {{ Form::textarea('description', null,
                                       ['class'      => 'form-control',
                                       'rows'        => '6',
                                       'placeholder' => 'Enter permission description here...' ]) }}
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

