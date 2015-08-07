@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))
@include('suppliers.partials._new-item-modal')
@include('suppliers.partials._update-item-modal')
@include('suppliers.partials._view-item-modal')

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">

                {{-- Show Flash Message here --}}
                @include('flash::message')

                <!--tab nav start-->
                <section class="panel">
                    <header class="panel-heading tab-bg-dark-navy-blue ">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#index">Ordinary</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#sc">Standard Materials</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#reports">Reports</a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="index" class="tab-pane active">
                                @include('suppliers.partials._index-content')
                            </div>
                            <div id="sc" class="tab-pane">
                                @include('suppliers.partials._standard-materials-content')
                            Standard Materials
                            </div>
                            <div id="reports" class="tab-pane">Reports</div>
                        </div>
                    </div>
                </section>
                <!--tab nav start-->

                </div>
            </section>
        </div>
    </div>




@stop