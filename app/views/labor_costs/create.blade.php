@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">

                {{-- Show Flash Message here --}}
                @include('flash::message')

                    <div class="row">

                        <div class="form">
                            {{ Form::open(['route' => 'new_labor_cost_path',
                                           'class' => 'form-horizontal',
                                           'role'  => 'form']) }}

                                 <div class="form-group {{!$errors->has('type') ?:'has-error'}}">
                                      {{ Form::label('type', 'Labor Type', ['class' => 'control-label col-md-3 col-md-offset-1']) }}
                                      <div class="col-md-4">
                                          {{ Form::text('type', null, ['class' => 'form-control']) }}
                                          <p class="help-block">{{DataHelper::arrayToString($errors->get('type'))}}</p>
                                      </div>
                                 </div>

                               <div class="form-group {{!$errors->has('rate') ?:'has-error'}}">
                                    {{ Form::label('rate', 'Rate', ['class' => 'control-label col-md-3 col-md-offset-1']) }}
                                    <div class="col-md-4">
                                        {{ Form::text('rate', null, ['class' => 'form-control']) }}
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('rate'))}}</p>
                                    </div>
                               </div>

                               <div class="form-group {{!$errors->has('remarks') ?:'has-error'}}">
                                    {{ Form::label('remarks', 'Remarks', ['class' => 'control-label col-md-3 col-md-offset-1']) }}
                                    <div class="col-md-4">
                                        {{ Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'This is Optional']) }}
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('remarks'))}}</p>
                                    </div>
                               </div>

                               <hr/>

                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-6">
                                        {{ Form::submit('Add Labor Cost', ['class' => 'btn btn-primary']) }}
                                        {{ HTML::link(URL::route('labor_costs_index_path'), 'Go Back', ['class' => 'btn btn-default']) }}
                                    </div>
                                </div>

                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

@stop