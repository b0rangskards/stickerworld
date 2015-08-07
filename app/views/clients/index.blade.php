@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))
@include('suppliers.partials._view-item-modal')

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

                            {{ HTML::link( URL::route('new_client_path'),
                            'New Client',
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

                        @foreach($data as $client)
                            <tr data-item-id="{{$client->id}}">
                                <td>
                                    {{$client->present()->prettyName()}}
                                </td>
                                <td>
                                    {{$client->present()->prettyAddress}}
                                </td>
                                <td>
                                    {{$client->contact_no}}
                                </td>
                                <td class="rowlink-skip">

                                     {{--Show Client--}}
                                    <button type="button"
                                    class="btn btn-success btn-xs"
                                    data-toggle="modal"
                                    data-target="#viewItemModal">
                                        <i class="fa fa-eye tooltips"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="View Detail"
                                        style="color:whitesmoke;"></i>
                                    </button>

                                     {{--Update Client--}}
                                    <a class="btn btn-info btn-xs tooltips update-client-btn"
                                    href="{{URL::route('update_client_path', $client->id)}}">
                                        <i class="fa fa-pencil tooltips"
                                           data-toggle="modal"
                                           data-placement="top"
                                           data-original-title="Update Client information"
                                           style="color:whitesmoke;">
                                        </i>
                                    </a>

                                     {{--Delete Client--}}
                                    {{ Form::open(['method' => 'DELETE',
                                    'route' => ['delete_client_path', $client->id],
                                    'class' => 'inline-block',
                                    'role' => 'form',
                                    'data-remote-delete-record']) }}
                                    {{ Form::button('<i class="fa fa-times"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs tooltips delete-client-btn',
                                    'data-placement' => 'top',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Archive Client',
                                    'data-confirm' => 'Are you sure you want to archive client?',
                                    'data-confirm-yes' => 'Yes, Archive Client!'
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