<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::route('dashboard')}}">
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
                            <i class="fa fa-building"></i>
                            <span>Branches</span>
                        </a>
                    @endif

                    </li>
                @endif


                @if($currentUser->hasGroupPermission('department'))
                    <li class="sub-menu">

                    @if($currentUser->hasPermission('departments_index_path'))
                        <a href="{{ URL::route('departments_index_path') }}" id="departments-nav-btn" class="{{(Request::is('department/*'))?'active':''}}">
                            <i class="fa fa-certificate"></i>
                            <span>Departments</span>
                        </a>
                    @endif

                    </li>
                @endif

                @if($currentUser->hasGroupPermission('employee'))
                    <li class="sub-menu">
                        <a href="javascript:;" class="{{(Request::is('employee/*'))?'active':''}}">
                            <i class="fa fa-users"></i>
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

                @if($currentUser->hasGroupPermission('supplier'))
                    <li class="sub-menu">
                        <a href="javascript:;" class="{{(Request::is('supplier/*'))?'active':''}}">
                            <i class="fa fa-truck"></i>
                            <span>Suppliers</span>
                        </a>
                        <ul class="sub">

                            @if($currentUser->hasPermission('new_supplier_path'))
                                <li class="{{Request::is('supplier/new')?'active':''}}">
                                    <a href="{{ URL::route('new_supplier_path') }}">New Supplier</a>
                                </li>
                            @endif

                            @if($currentUser->hasPermission('suppliers_index_path'))
                                <li class="{{Request::is('supplier/suppliers')?'active':''}}">
                                    <a href="{{ URL::route('suppliers_index_path') }}">View All Suppliers</a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif

                @if($currentUser->hasGroupPermission('item'))
                    <li class="sub-menu">
                        <a href="javascript:;" class="{{(Request::is('item/*'))?'active':''}}">
                            <i class="fa fa-cube"></i>
                            <span>Items</span>
                        </a>
                        <ul class="sub">

                            @if($currentUser->hasPermission('new_item_path'))
                                <li class="{{Request::is('item/new')?'active':''}}">
                                    <a href="{{URL::route('new_item_index_path')}}">New Item</a>
                                </li>
                            @endif

                            @if($currentUser->hasPermission('items_index_path'))
                                <li class="{{Request::is('item/items')?'active':''}}">
                                    <a href="{{URL::route('items_index_path')}}">View All Items</a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif

                @if($currentUser->hasGroupPermission('client'))
                    <li class="sub-menu">
                        <a href="javascript:;" class="{{(Request::is('client/*'))?'active':''}}">
                            <i class="fa fa-male"></i>
                            <span>Clients</span>
                        </a>
                        <ul class="sub">

                            @if($currentUser->hasPermission('new_client_path'))
                                <li class="{{Request::is('client/new')?'active':''}}">
                                    <a href="{{URL::route('new_client_path')}}">New Client</a>
                                </li>
                            @endif

                            @if($currentUser->hasPermission('clients_index_path'))
                                <li class="{{Request::is('client/clients')?'active':''}}">
                                    <a href="{{URL::route('clients_index_path')}}">View All Clients</a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif

                @if($currentUser->hasGroupPermission('project'))
                    <li class="sub-menu">
                        <a href="javascript:;" id="project-sidemenu-link" class="{{(Request::is('project/*'))?'active':''}}">
                            <i class="fa fa-exchange"></i>
                            <span>Project</span>
                        </a>
                        <ul class="sub">

                            @if($currentUser->hasPermission('new_project_path'))
                                <li class="{{Request::is('project/new')?'active':''}}">
                                    <a href="{{ URL::route('new_project_path') }}" id="new-project-sidemenu-link">New Project</a>
                                </li>
                            @endif

                            @if($currentUser->hasPermission('projects_index_path'))
                                <li class="{{Request::is('project/projects')?'active':''}}">
                                    <a href="{{URL::route('projects_index_path')}}">View Projects</a>
                                </li>
                            @endif

                                {{--<li class="{{Request::is('project/projects')?'active':''}}">--}}
                                    {{--<a href="#">Project Templates</a>--}}
                                {{--</li>--}}

                            <li class="{{Request::is('project/labor-cost/labor-costs')?'active':''}}">
                                <a href="{{URL::route('labor_costs_index_path')}}">Labor Costs</a>
                            </li>

                            <li class="{{Request::is('project/logistics-cost/logistics-costs')?'active':''}}">
                                <a href="{{URL::route('logistics_costs_index_path')}}">Logistics Costs</a>
                            </li>

                        </ul>
                    </li>
                @endif

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