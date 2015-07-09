<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::route('home')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if($currentUser->hasGroupPermission('user'))
                    <li class="sub-menu">
                        <a href="javascript:;" class="{{(Request::is('user/*')||Request::is('register')||Request::is('access_control'))?'active':''}}">
                            <i class="fa fa-user"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sub">

                            @if($currentUser->hasPermission('register_path'))
                                <li class="{{Request::is('register')?'active':''}}">
                                    <a href="{{ URL::route('register_path') }}">Register New User</a>
                                </li>
                            @endif

                            @if($currentUser->hasPermission('users_index_path'))
                                <li class="{{Request::is('user/users')?'active':''}}">
                                    <a href="{{ URL::route('users_index_path') }}">View All Users</a>
                                </li>
                            @endif

                            @if($currentUser->hasPermission('access_control_path'))
                                <li class="{{Request::is('access_control')?'active':''}}">
                                    <a href="{{ URL::route('access_control_path') }}">Roles & Permissions</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if($currentUser->hasGroupPermission('branch'))
                    <li class="sub-menu">

                    @if($currentUser->hasPermission('branches_index_path'))
                        <a href="{{ URL::route('branches_index_path') }}" id="branches-nav-btn" class="{{(Request::is('branch/*'))?'active':''}}">
                            <i class="fa fa-home"></i>
                            <span>Branches</span>
                        </a>
                    @endif

                    </li>
                @endif


                @if($currentUser->hasGroupPermission('branch'))
                    <li class="sub-menu">

                    @if($currentUser->hasPermission('departments_index_path'))
                        <a href="{{ URL::route('departments_index_path') }}" id="departments-nav-btn" class="{{(Request::is('department/*'))?'active':''}}">
                            <i class="fa fa-home"></i>
                            <span>Departments</span>
                        </a>
                    @endif

                    </li>
                @endif

                @if($currentUser->hasGroupPermission('employee'))
                    <li class="sub-menu">
                        <a href="javascript:;" class="{{(Request::is('employee/*'))?'active':''}}">
                            <i class="fa fa-user"></i>
                            <span>Employees</span>
                        </a>
                        <ul class="sub">

                            @if($currentUser->hasPermission('hire_employee_path'))
                                <li class="{{Request::is('employee/new')?'active':''}}">
                                    <a href="{{ URL::route('hire_employee_path') }}">New Employee</a>
                                </li>
                            @endif

                            @if($currentUser->hasPermission('employees_index_path'))
                                <li class="{{Request::is('employee/employees')?'active':''}}">
                                    <a href="{{ URL::route('employees_index_path') }}">View All Employees</a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif

                {{--@if($currentUser->hasGroupPermission('supplier'))--}}
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-retweet"></i>
                            <span>Suppliers</span>
                        </a>
                        <ul class="sub">
                        </ul>
                    </li>
                {{--@endif--}}

                <li>
                    <a href="fontawesome.html">
                        <i class="fa fa-th"></i>
                        <span>Logs</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bullhorn"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                        <li><a href="basic_table.html">Basic Table</a></li>
                        <li><a href="responsive_table.html">Responsive Table</a></li>
                        <li><a href="dynamic_table.html">Dynamic Table</a></li>
                        <li><a href="editable_table.html">Editable Table</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->