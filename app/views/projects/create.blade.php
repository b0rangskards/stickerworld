@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

@include('projects.partials._add-material-modal')
@include('projects.partials._add-standard-material-modal')
@include('projects.partials._add-labor-cost-modal')
@include('projects.partials._add-logistics-cost-modal')

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body invoice">

               {{-- Show Flash Message here --}}
               @include('flash::message')

                <div class="row tools">
                     <div class="btn-group pull-left">

                         {{ HTML::link(URL::route('new_labor_cost_path'),
                         'New Labor Cost',
                         ['class' => 'btn btn-white']) }}

                         {{ HTML::link(URL::route('new_logistics_cost_path'),
                         'New Logistics Cost',
                         ['class' => 'btn btn-white']) }}

                     </div>
                </div>

                <hr/>

                @include('projects.partials._create-header-fields')

                <hr/>

                 {{-- Button Groups --}}
                 <div class="clearfix">
                     <div class="btn-group add-btns">

                         {{-- Add Material --}}
                         {{ HTML::link('#',
                         'Add Materials',
                         ['id' => 'add-material-btn',
                         'class' => 'btn btn-primary',
                         'data-toggle' => 'modal',
                         'data-target' => '#addMaterialModal']) }}

                         {{-- Add Standard Materials --}}
                         {{ HTML::link('#',
                         'Add Standard Materials',
                         ['class' => 'btn btn-primary',
                         'data-toggle' => 'modal',
                         'data-target' => '#addStandardMaterialModal']) }}

                         {{-- Add Labor Cost --}}
                         {{ HTML::link('#',
                         'Add Labor Cost',
                         ['class' => 'btn btn-primary',
                         'data-toggle' => 'modal',
                         'data-target' => '#addLaborCostModal']) }}

                         {{-- Add Logistics --}}
                         {{ HTML::link('#',
                         'Add Logistics',
                         ['class' => 'btn btn-primary',
                         'data-toggle' => 'modal',
                         'data-target' => '#addLogisticsCostModal']) }}

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

                 @include('projects.partials._create-body-fields')

            </section>
        </div>
    </div>

@stop