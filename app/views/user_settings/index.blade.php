@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <div class="panel-body" >

               {{-- Show Flash Message here --}}
               @include('flash::message')

            <!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">

                       @if($currentUser->hasPermission('update_company_settings_path'))
                            <li class="active">
                                <a data-toggle="tab" href="#company-details-tab">Company Details</a>
                            </li>
                       @endif

                        <li class="">
                            <a data-toggle="tab" href="#notifications-tab">Notifications</a>
                        </li>

                        <li class="">
                            <a data-toggle="tab" href="#import-tab">Import/Export</a>
                        </li>

                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">

                        @if($currentUser->hasPermission('update_company_settings_path'))
                            <div id="company-details-tab" class="tab-pane active">
                                @include('user_settings.partials.company-details')
                            </div>
                        @endif

                        <div id="notifications-tab" class="tab-pane">Profile</div>
                        <div id="import-tab" class="tab-pane">Contact</div>
                    </div>
                </div>
            </section>
            <!--tab nav start-->





            </div>

        </section>
    </div>
</div>

@stop