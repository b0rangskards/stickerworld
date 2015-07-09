<div class="adv-table">

    {{-- Primary Buttons here--}}
    <div class="clearfix">
        <div class="inline-block">
            {{ Form::button('<i class="fa fa-user"></i> New Role',
            ['id' => 'new-role-btn',
            'class' => 'btn btn-primary',
            'data-toggle' => 'modal',
            'data-target' => '#newRoleModal']) }}

            {{ Form::button('<i class="fa fa-eye-slash"></i> New Permission',
            ['id' => 'new-permission-btn',
            'class' => 'btn btn-success',
            'data-toggle' => 'modal',
            'data-target' => '#newPermissionModal']) }}

            {{ Form::button('<i class="fa fa-users"></i> New Permission Group',
            ['id' => 'new-permission-group-btn',
            'class' => 'btn btn-danger',
            'data-toggle' => 'modal',
            'data-target' => '#newPermissionGroupModal']) }}

            @include('access_control.partials.new-role-modal')
            @include('access_control.partials.new-permission-modal')
            @include('access_control.partials.new-permission-group-modal')

            @include('access_control.partials.update-permission-modal')


        </div>
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right">
                <li><a href="#">Print</a></li>
                <li><a href="#">Save as PDF</a></li>
                <li><a href="#">Export to Excel</a></li>
            </ul>
        </div>
    </div>

    <div class="clearfix margin-top-10">
        <div class="col-md-4 pull-right reset-padding">
            <div class="form-group">
            {{Form::open(['route' => 'access_control_path', 'method' => 'GET', 'class' => 'form-horizontal', 'id' => 'search-permission-form', 'role' => 'form'])}}
                 {{ Form::label('search', 'Search: ',['class'=>'col-md-2 control-label']) }}
                       <div class="col-md-10 reset-padding-right">
                       {{ Form::input('search', 'q', null, ['class' => 'form-control']) }}
                       </div>
                {{ Form::submit('',['class' => 'hidden', 'id' => 'search-permission-btn']) }}
            {{Form::close()}}
            </div>
        </div>
    </div>
    {{--Spacer--}}
    <table id="table-permission" class="display table table-bordered table-curved">
        <thead>
        <tr>
            @foreach($columns as $role)
             <th class="col-md-{{$role['width']}}">
                    @if($role['column'] === 'Permission')
                        {{ $role['column'] }}
                    @else
                        <span class="popovers"
                        data-trigger="hover"
                        data-placement="top"
                        data-original-title="{{ $role['column'] . ' <Click to Update>' }}"
                        data-content="{{ !empty($role['role_desc']) ? $role['role_desc'] : 'No description specified.'}}">
                        {{ HTML::link('#', $role['column'], [
                            'class'          => 'role',
                            'data-type'      => 'text',
                            'data-pk'        => $role['id'],
                            'data-url'       => URL::route('update_role_path'),
                            'data-title'     => 'Update role name',
                            'data-emptytext' => 'Click to change role name'
                        ]) }}
                        </span>
                    @endif
                    @unless($role['column'] === 'Permission')
                    <span class="col-md-1 pull-right">
                    {{ Form::open(
                        ['method'=> 'DELETE',
                         'route' => ['delete_role_path', $role['id']],
                         'role'  => 'form',
                         'data-remote-delete-record']) }}
                    {{ Form::button('<i class="fa fa-times"></i>', [
                        'type' => 'submit',
                        'class' => 'btn btn-default btn-xs tooltips ordinary delete-role-btn',
                        'data-placement' => 'top',
                        'data-toggle' => 'tooltip',
                        'title' => 'Delete Role',
                        'data-confirm' => 'Are you sure?',
                        'data-confirm-yes' => 'Yes, cancel it!'
                    ]) }}
                    {{ Form::close() }}
                    </span>
                    @endunless
               </th>
            @endforeach
        </tr>
        </thead>
        <tbody>
            @include('access_control.partials.table-body')
        </tbody>
    </table>

    {{--Table starts here--}}
    <div class="space15"></div>

</div>