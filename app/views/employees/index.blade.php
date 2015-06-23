@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <div class="panel-body">
                <div class="adv-table">

                    {{-- Primary Buttons here--}}
                    <div class="clearfix">
                        <div class="btn-group">

                            {{ Form::button('New Employee',
                            ['id' => 'new-employee-btn',
                            'class' => 'btn btn-primary',
                            'data-toggle' => 'modal',
                            'data-target' => '#newEmployeeModal']) }}

                            {{--@include('employees.partials.new-modal')--}}
                            {{--@include('employees.partials.update-modal')--}}

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

                    <table class="display table table-bordered table-striped dynamic-table employees-table">
                        <thead>
                        <tr>
                            @foreach($columns as $column)
                            {{ "<th class='col-md-{$column["width"]}'>". $column['column'] ."</th>" }}
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $employee)
                        <tr>
                            <td>
                                <span> {{$employee->present()->fullName}} </span>
                            </td>
                            <td>
                                <span> {{$employee->department->name}} </span>
                            </td>
                            <td>
                                <span> {{$employee->designation}} </span>
                            </td>
                            <td>
                                {{-- View Detail action --}}
                                <a href="" class="btn btn-success btn-xs tooltips"
                                data-toggle="tooltip" data-placement="top" title="View Detail">
                                    <i class="fa fa-eye"></i>
                                </a>

                                {{-- Update Employee Button --}}
                                <a class="btn btn-info btn-xs tooltips update-employee-btn"
                                   href="#updateEmployeeModal"
                                   data-toggle="modal"
                                   data-id="{{ $employee->id }}">
                                    <i class="fa fa-pencil tooltips"
                                       data-toggle="modal"
                                       data-placement="top"
                                       data-original-title="Update Employee information">
                                    </i>
                                </a>

                                {{ Form::open(['method' => 'DELETE',
                                'route' => ['delete_employee_path', $employee->id],
                                'class' => 'inline-block',
                                'role' => 'form',
                                'data-remote-delete-record']) }}
                                {{ Form::hidden('deptId', $employee->id) }}
                                {{ Form::button('<i class="fa fa-trash"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs tooltips delete-employee-btn',
                                'data-placement' => 'top',
                                'data-toggle' => 'tooltip',
                                'title' => 'Fire Employee',
                                'data-confirm' => 'Are you sure?',
                                'data-confirm-yes' => 'Yes, cancel it!'
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