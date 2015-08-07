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

                            {{ HTML::link( URL::route('new_labor_cost_path'),
                            'New Labor Cost',
                            ['id' => 'new-labor-cost-btn',
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
                            @foreach($data as $labor)
                            <tr data-labor-cost-id="{{$labor->id}}">
                                <td>
                                    <a href="#">
                                         {{ $labor->present()->prettyType }}
                                    </a>
                                </td>
                                <td>
                                    {{ $labor->present()->prettyRate}}
                                </td>
                                <td>
                                    {{ $labor->present()->prettyRemarks}}
                                </td>
                                <td class="rowlink-skip">

                                     {{--Update Labor Cost Button--}}
                                    <a class="btn btn-info btn-xs tooltips update-labor-cost-btn"
                                       href="{{URL::route('update_labor_cost_path',$labor->id)}}">
                                        <i class="fa fa-pencil tooltips"
                                           data-toggle="modal"
                                           data-placement="top"
                                           data-original-title="Update Labor Cost information" style="color:whitesmoke;">
                                        </i>
                                    </a>

                                    {{-- Delete Labor Cost --}}
                                    {{ Form::open(['method' => 'DELETE',
                                    'route' => ['delete_labor_cost_path', $labor->id],
                                    'class' => 'inline-block',
                                    'role' => 'form',
                                    'data-remote-delete-record']) }}
                                    {{ Form::button('<i class="fa fa-times"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs tooltips delete-labor-cost-btn',
                                    'data-placement' => 'top',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Delete Labor Cost',
                                    'data-confirm' => 'Are you sure you want to delete labor cost?',
                                    'data-confirm-yes' => 'Yes, Delete Labor Cost!'
                                    ]) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
</div>

@stop