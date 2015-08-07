@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">

                {{-- Show Flash Message here --}}
                @include('flash::message')

                    <div>
                        <div class="form">
                            {{ Form::open(['route' => 'new_client_path',
                                           'class' => 'form-horizontal',
                                           'role'  => 'form']) }}

                            {{--Client Name--}}
                             <div class="form-group {{!$errors->has('name') ?:'has-error'}}">
                                  {{ Form::label('name', 'Client', ['class' => 'control-label col-md-3']) }}
                                  <div class="col-md-6">
                                      {{ Form::text('name', null,
                                      ['class' => 'form-control',
                                      'autofocus' => 'autofocus',
                                      'required' => 'required']) }}
                                      <p class="help-block">{{DataHelper::arrayToString($errors->get('name'))}}</p>
                                  </div>
                             </div>

                            {{-- Address --}}
                             <div class="form-group {{!$errors->has('address') ?:'has-error'}}">
                                  {{ Form::label('address', 'Address', ['class' => 'control-label col-md-3']) }}
                                  <div class="col-md-6">
                                      {{ Form::text('address', null,
                                      ['class' => 'form-control',
                                      'required' => 'required']) }}
                                      <p class="help-block">{{DataHelper::arrayToString($errors->get('address'))}}</p>
                                  </div>
                             </div>

                            {{-- Contact No --}}
                             <div class="form-group {{!$errors->has('contact_no') ?:'has-error'}}">
                                  {{ Form::label('contact_no', 'Contact No.', ['class' => 'control-label col-md-3']) }}
                                  <div class="col-md-6">
                                      {{ Form::text('contact_no', null,
                                      ['class' => 'form-control',
                                      'required' => 'required']) }}
                                      <p class="help-block">{{DataHelper::arrayToString($errors->get('contact_no'))}}</p>
                                  </div>
                             </div>

                            <hr class="col-md-7 col-md-offset-2">

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-6">
                                    {{ Form::submit('Add Client', ['class' => 'btn btn-primary']) }}
                                    {{ HTML::link(URL::route('clients_index_path'), 'Go Back', ['class' => 'btn btn-default']) }}
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