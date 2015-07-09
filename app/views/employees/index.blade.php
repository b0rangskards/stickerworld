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

                            {{ HTML::link( URL::route('hire_employee_path'),
                            'New Employee',
                            ['id' => 'new-employee-btn',
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

                    <table class="display table table-striped table-condensed dynamic-table" id="employees-table">
                        <thead>
                        <tr>
                            @foreach($columns as $column)
                            {{ "<th class='col-md-{$column["width"]}'>". $column['column'] ."</th>" }}
                            @endforeach
                        </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                        @foreach($data as $employee)
                        <tr data-employee-id="{{$employee->id}}">
                            <td>
                                <div>
                                    <a href="{{URL::route('show_employee_path', $employee->id)}}">
                                    <span class="col-md-2">
                                            <img class="employee-thumbnail-small"
                                            src="{{ !is_null($employee->picture)
                                                    ? Config::get('constants.EMPLOYEE_PICTURE_URL').$employee->picture
                                                    : Config::get('constants.DEFAULT_IMG_THUMBNAIL_URL')}}"
                                            alt=""/>
                                    </span>
                                    <span class="col-md-8"> {{$employee->present()->fullName}} </span>
                                    <span class="col-md-1 pull-left"><i class="fa {{$employee->gender === 'male' ? 'fa-male flat-blue-font' : 'fa-female flat-pink-font'}}"></i></span>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <span> {{$employee->branch->name}} </span>
                            </td>
                            <td>
                                <span> {{$employee->department->name}} </span>
                            </td>
                            <td>
                                <span> {{$employee->designation}} </span>
                            </td>
                            <td  class="rowlink-skip">
                                {{-- View Detail action --}}
                                <a href="" class="btn btn-success btn-xs tooltips"
                                data-toggle="tooltip" data-placement="top" title="View Detail">
                                    <i class="fa fa-eye" style="color:whitesmoke;"></i>
                                </a>

                                {{-- Update Employee Button --}}
                                <a class="btn btn-info btn-xs tooltips update-employee-btn"
                                   href="{{URL::route('update_employee_path', $employee->id)}}">
                                    <i class="fa fa-pencil tooltips"
                                       data-toggle="modal"
                                       data-placement="top"
                                       data-original-title="Update Employee information" style="color:whitesmoke;">
                                    </i>
                                </a>

                                {{ Form::open(['method' => 'DELETE',
                                'route' => ['terminate_employee_path', $employee->id],
                                'class' => 'inline-block',
                                'role' => 'form',
                                'data-remote-delete-record']) }}
                                {{--{{ Form::hidden('employeeId', $employee->id) }}--}}
                                {{ Form::button('<i class="fa fa-times"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs tooltips delete-employee-btn',
                                'data-placement' => 'top',
                                'data-toggle' => 'tooltip',
                                'title' => 'Fire Employee',
                                'data-confirm' => 'Are you sure you want to fire employee?',
                                'data-confirm-yes' => 'Yes, Fire Employee!'
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