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

                                {{ Form::button('New Department',
                                ['id' => 'new-department-btn',
                                'class' => 'btn btn-primary',
                                'data-toggle' => 'modal',
                                'data-target' => '#newDepartmentModal']) }}

                            @include('departments.partials.new-modal')
                            @include('departments.partials.update-modal')

                            </div>
                            <div class="btn-group pull-right">
                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#">Print</a></li>
                                    <li><a href="#">Save as PDF</a></li>
                                    <li><a href="#">Export to Excel</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="space15"></div>

                        <table class="display table table-striped table-condensed dynamic-table departments-table">
                            <thead>
                                <tr>
                                    @foreach($columns as $column)
                                        {{ "<th class='col-md-{$column["width"]}'>". $column['column'] .'</th>' }}
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $dept)
                                    <tr>
                                        <td>
                                            <span> {{$dept->name}} </span>
                                        </td>
                                        <td>
                                            {{-- Update Department Button --}}
                                            <a class="btn btn-success btn-xs tooltips update-department-btn"
                                               href="#updateDepartmentModal"
                                               data-toggle="modal"
                                               data-id="{{ $dept->id }}">
                                                <i class="fa fa-pencil tooltips"
                                                data-toggle="modal"
                                                data-placement="top"
                                                data-original-title="Update Department information">
                                                </i>
                                            </a>

                                            {{ Form::open(['method' => 'DELETE',
                                            'route' => ['delete_department_path', $dept->id],
                                            'class' => 'inline-block',
                                            'role' => 'form',
                                            'data-remote-delete-record']) }}
                                                {{ Form::hidden('deptId', $dept->id) }}
                                                {{ Form::button('<i class="fa fa-trash"></i>', [
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs tooltips delete-department-btn',
                                                    'data-placement' => 'top',
                                                    'data-toggle' => 'tooltip',
                                                    'title' => 'Cancel Department',
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