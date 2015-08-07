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

                            {{ HTML::link( URL::route('new_supplier_path'),
                            'New Supplier',
                            ['id' => 'new-supplier-btn',
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

                    <table class="display table table-striped table-condensed dynamic-table" id="suppliers-table">
                        <thead>
                        <tr>
                            @foreach($columns as $column)
                            {{ "<th class='col-md-{$column["width"]}'>". $column['column'] ."</th>" }}
                            @endforeach
                        </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                            @foreach($data as $supplier)
                            <tr data-supplier-id="{{$supplier->id}}">
                                <td>
                                    <a href="{{URL::route('show_supplier_path', $supplier->id)}}">
                                        {{ $supplier->present()->prettyName }}
                                    </a>
                                </td>
                                <td>
                                    {{ $supplier->present()->prettyType }}
                                </td>
                                <td>
                                    {{ $supplier->present()->prettyAddress }}
                                </td>
                                <td>
                                    @foreach($supplier->contacts as $contact)
                                        <span class="tooltips" data-toggle="tooltip" data-original-title="{{$contact->present()->prettyType}}">
                                            @if($contact->type=='landline')
                                                <i class="fa fa-phone">  {{$contact->number}}</i>
                                            @elseif($contact->type=='mobile')
                                                <i class="fa fa-mobile">  {{ $contact->number}}</i>
                                            @else
                                                <i class="fa fa-fax"> {{$contact->number}}</i>
                                            @endif
                                        </span><br/>
                                    @endforeach
                                </td>
                                <td class="rowlink-skip">
                                    <a href="{{URL::route('show_supplier_path', $supplier->id)}}"
                                    class="btn btn-success btn-xs tooltips"
                                    data-toggle="tooltip" data-placement="top" title="View Detail">
                                        <i class="fa fa-eye" style="color:whitesmoke;"></i>
                                    </a>

                                    {{-- Update Supplier Button --}}
                                    <a class="btn btn-info btn-xs tooltips update-supplier-btn"
                                       href="{{URL::route('update_supplier_path', $supplier->id)}}">
                                        <i class="fa fa-pencil tooltips"
                                           data-toggle="modal"
                                           data-placement="top"
                                           data-original-title="Update Supplier information" style="color:whitesmoke;">
                                        </i>
                                    </a>

                                    {{ Form::open(['method' => 'DELETE',
                                    'route' => ['cancel_supplier_path', $supplier->id],
                                    'class' => 'inline-block',
                                    'role' => 'form',
                                    'data-remote-delete-record']) }}
                                    {{ Form::button('<i class="fa fa-times"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs tooltips delete-supplier-btn',
                                    'data-placement' => 'top',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Cancel Supplier',
                                    'data-confirm' => 'Are you sure you want to cancel supplier?',
                                    'data-confirm-yes' => 'Yes, Cancel Supplier!'
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