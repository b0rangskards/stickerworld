@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <div class="panel-body">

               {{-- Show Flash Message here --}}
               @include('flash::message')

                <div class="adv-table">

                    {{-- Primary Buttons here--}}
                    <div class="clearfix">
                        <div class="btn-group">

                            {{ HTML::link( URL::route('new_project_path'),
                            'New Project',
                            ['id' => 'new-project-btn',
                            'class' => 'btn btn-primary']) }}

                        </div>
                        <div class="btn-group pull-right">
                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i
                                    class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Print</a></li>
                                <li><a href="#">Save as PDF</a></li>
                                <li><a href="#">Export to Excel</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="space15"></div>

                    <table class="display table table-striped table-condensed dynamic-table">
                        <thead>
                        <tr>
                            @foreach($columns as $column)
                            {{ "<th class='col-md-{$column["width"]}'>". $column['column'] ."</th>" }}
                            @endforeach
                        </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                            {{--@foreach($data as $project)--}}
                            {{--<tr data-id="{{$project->id}}">--}}
                                {{--<td>--}}
                                    {{--<a href="#">--}}
                                         {{--{{ $project->present()->prettyName }}--}}
                                    {{--</a>--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--{{ $project->client->present()->prettyName}}--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--{{ $project->present()->prettyLocation}}--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--{{ $project->present()->prettyDeadline}}--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--{{ $project->present()->prettyLeadTime}}--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--{{ $project->present()->prettyStatus}}--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--{{ $project->present()->prettyCost}}--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--{{ $project->salesrep->present()->shortFullName}}--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--{{ $project->estimator->present()->shortFullName}}--}}
                                {{--</td>--}}
                                {{--<td class="rowlink-skip">--}}

                                     {{--Update Labor Cost Button--}}
                                    {{--<a class="btn btn-info btn-xs tooltips update-project-btn"--}}
                                       {{--href="{{URL::route('update_labor_cost_path',$project->id)}}">--}}
                                        {{--<i class="fa fa-pencil tooltips"--}}
                                           {{--data-toggle="modal"--}}
                                           {{--data-placement="top"--}}
                                           {{--data-original-title="Update Project information" style="color:whitesmoke;">--}}
                                        {{--</i>--}}
                                    {{--</a>--}}

                                    {{-- Delete Labor Cost --}}
                                    {{--{{ Form::open(['method' => 'DELETE',--}}
                                    {{--'route' => ['delete_labor_cost_path', $project->id],--}}
                                    {{--'class' => 'inline-block',--}}
                                    {{--'role' => 'form',--}}
                                    {{--'data-remote-delete-record']) }}--}}
                                    {{--{{ Form::button('<i class="fa fa-times"></i>', [--}}
                                    {{--'type' => 'submit',--}}
                                    {{--'class' => 'btn btn-danger btn-xs tooltips archive-project-btn',--}}
                                    {{--'data-placement' => 'top',--}}
                                    {{--'data-toggle' => 'tooltip',--}}
                                    {{--'title' => 'Archive Project',--}}
                                    {{--'data-confirm' => 'Are you sure you want to arhive project?',--}}
                                    {{--'data-confirm-yes' => 'Yes, Archive Project!'--}}
                                    {{--]) }}--}}
                                    {{--{{ Form::close() }}--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--@endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
</div>

@stop