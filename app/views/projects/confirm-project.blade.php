@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body invoice">

               {{-- Show Flash Message here --}}
               @include('flash::message')

                <hr/>

                @include('projects.partials._show-project-details')

                {{Form::open(['route' => 'confirm_project_path'])}}
                    {{Form::hidden('proj_id', $project->id)}}
                    {{-- Invoice Buttons --}}
                    <div class="text-center invoice-btn">
                        <button type="button" class="btn btn-success btn-lg"><i class="fa fa-check"></i> Approve Project</button>
                        <a href="invoice_print.html" target="_blank" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Print </a>
                    </div>
                     {{-- End Invoice Buttons --}}
                {{Form::close()}}

            </section>
        </div>
    </div>

@stop