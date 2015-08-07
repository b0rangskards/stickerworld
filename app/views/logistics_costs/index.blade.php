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

                            {{ HTML::link( URL::route('new_logistics_cost_path'),
                            'New Logistics Cost',
                            ['class' => 'btn btn-primary']) }}

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
                            @foreach($data as $logistics)
                            <tr data-labor-cost-id="{{$logistics->id}}">
                                <td>
                                    <a href="#">
                                         {{ $logistics->present()->prettyType }}
                                    </a>
                                </td>
                                <td>
                                    {{ $logistics->present()->prettyRate}}
                                </td>
                                <td>
                                    {{ $logistics->present()->prettyRemarks}}
                                </td>
                                <td class="rowlink-skip">

                                     {{--Update Labor Cost Button--}}
                                    <a class="btn btn-info btn-xs tooltips update-logistics-cost-btn"
                                       href="{{URL::route('update_logistics_cost_path',$logistics->id)}}">
                                        <i class="fa fa-pencil tooltips"
                                           data-toggle="modal"
                                           data-placement="top"
                                           data-original-title="Update Logistics Cost information" style="color:whitesmoke;">
                                        </i>
                                    </a>

                                    {{-- Delete Labor Cost --}}
                                    {{ Form::open(['method' => 'DELETE',
                                    'route' => ['delete_logistics_cost_path', $logistics->id],
                                    'class' => 'inline-block',
                                    'role' => 'form',
                                    'data-remote-delete-record']) }}
                                    {{ Form::button('<i class="fa fa-times"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs tooltips delete-logistics-cost-btn',
                                    'data-placement' => 'top',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Delete Logistics Cost',
                                    'data-confirm' => 'Are you sure you want to delete logistics cost?',
                                    'data-confirm-yes' => 'Yes, Delete Logistics Cost!'
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