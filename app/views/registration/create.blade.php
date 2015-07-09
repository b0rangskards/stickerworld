@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle,'currentPage' => $currentPage))

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">

                {{-- Show Flash Message here --}}
                @include('flash::message')

                    <div class="position-center">

                        {{-- Display Errors Here --}}
                        @include('layouts.partials.errors')

                        {{ Form::open(['route' => 'register_path', 'name' => 'registrationForm', 'class' => 'form-vertical', 'role' => 'form', 'novalidate' => 'novalidate']) }}

                           {{-- Selecting Role Radio Group --}}
                           <div class="form-group">
                              <div class="col-md-12">
                                   {{ Form::label($roles[1]['id'], 'Role', ['class' => 'control-label']) }}
                                   <div class="btn-row">
                                       <div class="btn-group" data-toggle="buttons">
                                            @foreach($roles as $role)
                                               <label class="btn btn-default">
                                                   <input type="radio" id="register-user-radio-role" value="{{ $role->id }}" id="{{ $role->id }}" name="role_id"> {{  $role->present()->prettyRoleName() }}
                                               </label>
                                            @endforeach
                                       </div>
                                   </div>
                                   <p class="help-block"></p>
                              </div>
                           </div>

                           <div class="form-group" id="register-user-select-employee" style="display:none">
                               <div class="col-md-8">
                                    {{ Form::label('emp_id', 'Employee', ['class' => 'control-label']) }}
                                        <select name="emp_id" class="form-control">
                                        @foreach($employees as $e)
                                              <option value="{{$e->id}}">{{$e->present()->fullName()}}</option>
                                        @endforeach
                                        </select>
                                        <p class="help-block"></p>
                               </div>
                            </div>

                           {{--Email Form Input--}}
                           <div class="form-group">
                               <div class="col-md-8">
                                   {{ Form::label('my-email', 'Email', ['class' => 'control-label']) }}
                                        {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'my-email', 'required' => 'required']) }}
                                       <p class="help-block"></p>
                               </div>
                           </div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    {{ Form::submit('Register User', ['class' => 'btn btn-primary', 'id' => 'register-user']) }}
                                </div>
                            </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </section>
        </div>
    </div>




@stop