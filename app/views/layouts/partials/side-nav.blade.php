<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="/">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="{{(Request::is('user/*')||Request::is('register'))?'active':''}}">
                        <i class="fa fa-user"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                        <li class="{{Request::is('register')?'active':''}}">
                            <a href="{{ URL::route('register_path') }}">Register New User</a>
                        </li>
                        <li class="{{Request::is('user/users')?'active':''}}">
                            <a href="{{ URL::route('users.index') }}">View All Users</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="{{ URL::route('branches_index_path') }}" id="branches-nav-btn" class="{{(Request::is('branch/*'))?'active':''}}">
                        <i class="fa fa-home"></i>
                        <span>Branches</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Employees</span>
                    </a>
                    <ul class="sub">
                    </ul>
                </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-retweet"></i>
                            <span>Suppliers</span>
                        </a>
                        <ul class="sub">
                        </ul>
                    </li>
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





            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->