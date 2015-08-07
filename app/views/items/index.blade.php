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

                            {{ HTML::link( URL::route('new_item_path'),
                            'New Item',
                            ['class' => 'btn btn-primary',
                            'id' => 'new-item-index-button']) }}

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

                        @foreach($data as $item)
                            <tr data-item-id="{{$item->id}}">
                                <td>
                                    {{$item->supplier->present()->prettyName}}
                                </td>
                                <td>
                                    <a href="#viewItemModal" data-toggle="modal"></a>
                                    <img src="{{$item->present()->imageUrl}}" height="60" alt=""/>
                                </td>
                                <td>
                                    {{$item->present()->prettyName}}
                                </td>
                                <td>
                                    {{$item->present()->prettyDetails}}
                                </td>
                                <td>
                                    {{$item->present()->prettyType}}
                                </td>
                                <td>
                                    {{$item->present()->prettyUm}}
                                </td>
                                <td>
                                    {{$item->present()->prettyPrice}}
                                </td>
                                <td>
                                    {{$item->present()->prettyRemarks}}
                                </td>
                                <td class="rowlink-skip">

                                     {{--Show Item--}}
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

                                     {{--Update Item--}}
                                    <a class="btn btn-info btn-xs tooltips update-item-btn"
                                    href="{{URL::route('update_item_index_path').'/'.$item->id}}">
                                        <i class="fa fa-pencil tooltips"
                                           data-toggle="modal"
                                           data-placement="top"
                                           data-original-title="Update Item information"
                                           style="color:whitesmoke;">
                                        </i>
                                    </a>

                                     {{--Delete Item--}}
                                    {{ Form::open(['method' => 'DELETE',
                                    'route' => ['delete_item_path', $item->id],
                                    'class' => 'inline-block',
                                    'role' => 'form',
                                    'data-remote-delete-record']) }}
                                    {{ Form::button('<i class="fa fa-times"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs tooltips delete-item-btn',
                                    'data-placement' => 'top',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Delete Item',
                                    'data-confirm' => 'Are you sure you want to delete item?',
                                    'data-confirm-yes' => 'Yes, Delete Item!'
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