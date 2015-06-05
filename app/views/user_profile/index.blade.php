@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => 'Profile', 'subTitle' => $currentUser->username, 'icon' => 'fa fa-user', 'currentPage' => 'Profile'))

    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">

                    <div class="col-lg-3">
                        <!--widget start-->
                        <aside class="profile-nav alt">
                            <section class="panel">
                                <div  id="effect-1" class="user-heading alt gray-bg" >


                                        <a href="#">
                                            <img alt="" src="{{ asset('images/icon-user-default.png') }}"/>
                                        </a>
                                            <img src="{{ asset('images/cam_ic.png') }}" id="overlay-upload"/>


                                    {{-- Jasny Bootstrap file upload --}}
                                    {{--<div class="fileinput fileinput-new" data-provides="fileinput">--}}
                                      {{--<div class="fileinput-preview thumbnail btn-file" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>--}}
                                      {{--<div>--}}
                                         {{--<input type="file" name="..." style="visibility:hidden;">--}}
                                      {{--</div>--}}
                                    {{--</div>--}}

                                    <h1>{{ $currentUser->username  }}</h1>
                                    <p>
                                       @if ($currentUser->role_id === 1)
                                           {{ 'Admin'}}
                                       @elseif ($currentUser->role_id === 2)
                                           {{ 'Moderator'}}
                                       @elseif ($currentUser->role_id === 3)
                                           {{ 'Estimator'}}
                                       @else
                                           {{ 'Accountant'}}
                                       @endif
                                    </p>
                                </div>

                                <ul class="nav nav-pills nav-stacked ">
                                    <li>
                                        <a data-toggle="tab" href="#basic_details"> <i class="fa fa-envelope-o"></i> Basic Details</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#notification"> <i class="fa fa-bell-o"></i> Notification <span class="badge label-success pull-right r-activity">11</span></a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#projects"> <i class="fa fa-comments-o"></i> Projects <span class="badge label-warning pull-right r-activity">03</span></a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#settings"> <i class="fa fa-tasks"></i> Settings</a>
                                    </li>
                                </ul>

                            </section>
                        </aside>
                        <!--widget end-->
                    </div>


                    <div class="col-lg-8">
                        <section class="panel">


                            <div class="panel-body">

                                <div class="tab-content">
                                    <div id="basic_details" class="tab-pane active">
                                        @include('user_profile.partials._basic_details')
                                    </div>
                                    <div id="notification" class="tab-pane">
                                        Notification
                                    </div>
                                    <div id="projects" class="tab-pane">
                                        Projects
                                    </div>
                                    <div id="settings" class="tab-pane">
                                        @include('user_profile.partials._settings')
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>



                </div>
            </div>
        </div>
    </div>

@stop