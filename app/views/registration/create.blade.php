@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => 'Users', 'subTitle' => 'Registration','currentPage' => 'Register User'))

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    {{ $pageTitle; }}
                </header>
                <div class="panel-body">

                {{-- Show Flash Message here --}}
                @include('flash::message')

                    <div class="position-center">

                        {{-- Display Errors Here --}}
                        @include('layouts.partials.errors')

                        {{ Form::open(['route' => 'register_path', 'name' => 'registrationForm', 'class' => 'form-vertical', 'role' => 'form', 'novalidate' => 'novalidate']) }}

                           {{-- Selecting Role Radio Group --}}
                           <div class="form-group">
                               {{ Form::label($roles[1]['id'], 'Role', ['class' => 'control-label']) }}
                               <div class="btn-row">
                                   <div class="btn-group" data-toggle="buttons">
                                        @foreach($roles as $role)
                                           <label class="btn btn-default">
                                               <input type="radio" value="{{ $role->id }}" id="{{ $role->id }}" name="role_id"> {{  $role->name }}
                                           </label>
                                        @endforeach
                                   </div>
                               </div>
                           </div>

                           {{--Email Form Input--}}
                           <div class="form-group">
                               {{ Form::label('email', 'Email') }}
                               {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                           </div>

                            <div class="form-group">
                                {{ Form::submit('Register User', ['class' => 'btn btn-primary', 'id' => 'register-user']) }}
                            </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </section>
        </div>
    </div>




@stop