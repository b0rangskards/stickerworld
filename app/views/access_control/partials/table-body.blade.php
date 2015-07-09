@foreach($data as $permissionGroup)
<tr>
    <td>
        <span>
            <h5 class="inline-block"><b>
                {{ HTML::link('#', $permissionGroup->present()->prettyName, [
                    'class'          => 'permission-group-xedit',
                    'data-type'      => 'text',
                    'data-pk'        => $permissionGroup->id,
                    'data-url'       => URL::route('update_permission_group_path'),
                    'data-title'     => 'Update Group Name',
                    'data-emptytext' => 'Click to change permission group name'
                ]) }}
                </b>
            </h5>

            <span class="permission-group-delete-span">
                {{ Form::open(
                    ['method'=> 'DELETE',
                     'class' => 'inline-block',
                     'route' => ['delete_permission_group_path', $permissionGroup->id],
                     'role'  => 'form',
                     'data-remote-delete-record']) }}
                {{ Form::button('<i class="fa fa-times"></i>', [
                    'type' => 'submit',
                    'class' => 'btn btn-default btn-xs tooltips ordinary delete-permission-group-btn',
                    'data-placement' => 'top',
                    'data-toggle' => 'tooltip',
                    'title' => 'Delete Group',
                    'data-confirm' => 'Are you sure?',
                    'data-confirm-yes' => 'Yes, cancel it!'
                ]) }}
                {{ Form::close() }}
            </span>
        </span>
    </td>

    @foreach($columns as $role)
        @unless($role['column'] === 'Permission')
        <td class="reset-margin-top-bottom">
            <div class="flat-green icheck-permission-group single-row col-md-2 col-md-offset-3">
                <div class="radio">
                    <input type="checkbox"
                    data-permission-group-id="{{$permissionGroup->id}}"
                    data-role-id="{{$role['id']}}"
                    {{{PermissionGroup::isPermissionRelatedSelectedAll($role['id'], $permissionGroup->id) ? 'checked' : ''}}}>
                </div>
            </div>
            {{-- Loader here --}}
            <span class="ui active small loader inline pull-right margin-top-10" style="display:none"></span>
        </td>
        @endunless
    @endforeach

</tr>
    @foreach($permissionGroup['permissions'] as $permission)
        <tr>
            <td style="vertical-align: middle;">
                <span data-trigger="hover" data-placement="top" class="popovers" data-original-title="{{$permission->present()->prettyName . ' <Click to Update>'}}"
                 data-content="{{{ $permission->present()->prettyDescription or 'No description specified.'}}}">
                    {{HTML::link('#', $permission->present()->prettyName, [
                        'class'         => 'col-md-8 col-md-offset-1 update-permission-toggle-modal',
                        'data-id'       => $permission->id,
                        'data-toggle'   => 'modal',
                        'data-target'   => '#updatePermissionModal'
                    ]) }}
                    <span class="pull-right permission-delete-span">
                        {{ Form::open(
                            ['method'=> 'DELETE',
                             'class' => 'inline-block',
                             'route' => ['delete_permission_path', $permission->id],
                             'role'  => 'form',
                             'data-remote-delete-record']) }}
                        {{ Form::button('<i class="fa fa-times"></i>', [
                            'type' => 'submit',
                            'class' => 'btn btn-default btn-xs tooltips ordinary delete-permission-btn',
                            'data-placement' => 'top',
                            'data-toggle' => 'tooltip',
                            'title' => 'Delete Permission',
                            'data-confirm' => 'Are you sure?',
                            'data-confirm-yes' => 'Yes, cancel it!'
                        ]) }}
                        {{ Form::close() }}
                    </span>
                </span>
            </td>

            @foreach($columns as $role)
                @unless($role['column'] === 'Permission')
                <td class="reset-margin-top-bottom" style="padding-top: 0;padding-bottom: 0;">
                    <div class="flat-green icheck-permission single-row col-md-2 col-md-offset-3">
                        <div class="radio">
                            <input type="checkbox"
                            data-grant-url="{{URL::route('grant_role_permission_path')}}"
                            data-revoke-url="{{URL::route('revoke_role_permission_path')}}"
                            data-permission-id="{{$permission->id}}"
                            data-role-id="{{$role['id']}}"
                            data-permission-group-id="{{$permissionGroup->id}}"
                            data-id="{{PermissionRole::getId($role['id'], $permission->id)}}"
                            {{{PermissionRole::isPermissionExists($role['id'], $permission->id) ? 'checked' : ''}}}>
                        </div>
                    </div>
                    {{-- Loader here --}}
                    <span class="ui active small loader inline pull-right margin-top-10" style="display:none"></span>
                </td>
                @endunless
            @endforeach
        </tr>
    @endforeach
@endforeach