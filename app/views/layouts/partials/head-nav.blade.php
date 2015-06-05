<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="{{ URL::route('home') }}" class="logo">
        <img src="{{ asset('images/company-logo.png') }}" alt="" />
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

{{-- Notification Area --}}
@include('layouts.partials.notify-section')

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{ asset('images/icon-user-default.png') }}" />
                <span class="username"> {{ $currentUser->username }} </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li>
                    <a href="{{ URL::route('user_profile_path', $currentUser->username) }}"><i class=" fa fa-user"></i>Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{ URL::route('logout_path') }}"><i class="fa fa-sign-out"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->