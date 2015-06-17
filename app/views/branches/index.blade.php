@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => 'Branches', 'subTitle' => 'Management','currentPage' => 'Manage Branches'))

    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                  <div class="panel-body">
                      <div class="adv-table">

                        {{-- Primary Buttons here--}}
                        <div class="clearfix">
                            <div class="btn-group">

                            {{ HTML::linkRoute('new_branch_path', 'New Branch', null, ['id' => 'new-branch-btn', 'class' => 'btn btn-primary']) }}

                            </div>
                            {{--<div class="btn-group pull-right">--}}
                                {{--<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>--}}
                                {{--</button>--}}
                                {{--<ul class="dropdown-menu pull-right">--}}
                                    {{--<li><a href="#">Print</a></li>--}}
                                    {{--<li><a href="#">Save as PDF</a></li>--}}
                                    {{--<li><a href="#">Export to Excel</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        </div>

                        <div class="space15"></div>

                        {{  $datatable }}

                      </div>
                  </div>

            </section>
        </div>
    </div>


@stop