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
                        {{-- Display Errors Here --}}
                        {{--@include('layouts.partials.errors')--}}

                        <div class="form">
                            {{ Form::open(['route' => 'hire_employee_path',
                                           'class' => 'form-horizontal',
                                           'files' =>  true,
                                           'role'  => 'form',
                                           'novalidate' => 'novalidate']) }}

                                {{-- Upload Employee Photo --}}
                               <div class="form-group col-md-2 {{!$errors->has('employee_photo') ?:'has-error'}}">
                                   <div class="col-md-10 col-md-offset-1">
                                       <div class="fileupload fileinput-new margin-bottom-10 upload-employee-photo-group" data-provides="fileinput">
                                           <div class="fileinput-new thumbnail employee-thumbnail-upload-photo">
                                               <img src="/images/no_img.png" alt="" class="employee-thumbnail-upload-photo" />
                                           </div>
                                           <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                           <div class="col-md-offset-1 upload-btns">
                                                      <span class="btn btn-round btn-white btn-file">
                                                          <span class="fileinput-new">Upload Photo</span>
                                                          <span class="fileinput-exists"><i class="fa fa-paperclip"></i></span>
                                                          {{Form::file('employee_photo', ['class' => 'default'])}}
                                                      </span>

                                                <a href="#" class="btn btn-round btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i></a>
                                           </div>
                                       </div>
                                           <small><span class="label label-danger">NOTE!</span></small>
                                           <small><i>Optional. Only image files are allowed to upload.</i></small>
                                       <p class="help-block">{{DataHelper::arrayToString($errors->get('employee_photo'))}}</p>
                                   </div>
                               </div>

                            <div class="col-lg-10">
                               {{--Firstname--}}
                               <div class="form-group">
                                    {{ Form::label('firstname', 'Name', ['class' => 'control-label col-md-2']) }}
                                    <div class="col-md-3 {{!$errors->has('firstname') ?:'has-error'}}" >
                                        {{ Form::text('firstname', null, ['class' => 'form-control', 'placeholder' => 'Firstname', 'required' => 'required']) }}
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('firstname'))}}</p>
                                    </div>
                                    <div class="col-md-3 {{!$errors->has('middlename') ?:'has-error'}}">
                                        {{ Form::text('middlename', null, ['class' => 'form-control', 'placeholder' => 'Middlename',  'required' => 'required']) }}
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('middlename'))}}</p>
                                    </div>
                                    <div class="col-md-3 {{!$errors->has('lastname') ?:'has-error'}}">
                                        {{ Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Lastname', 'required' => 'required']) }}
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('lastname'))}}</p>
                                    </div>
                               </div>

                               <div class="form-group">
                                    {{-- Birthdate --}}
                                   {{ Form::label('birthdate', 'Birth Date', ['class' => 'control-label col-md-2']) }}
                                   <div class="col-md-3 {{!$errors->has('birthdate') ?:'has-error'}}">
                                       <div class="input-append date dpBdate">
                                       {{ Form::text('birthdate', null,
                                            [ 'class' => 'form-control',
                                              'size' => '10',
                                              'readonly']) }}
                                          <span class="input-group-btn add-on">
                                            <button class="btn btn-primary" type="button" style="height: 35px;"><i class="fa fa-calendar"></i></button>
                                          </span>
                                       </div>
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('birthdate'))}}</p>
                                   </div>

                                    {{-- Gender --}}
                                   {{ Form::label('gender', 'Gender', ['class' => 'control-label col-md-3']) }}
                                   <div class="col-md-3 {{!$errors->has('gender') ?:'has-error'}}">
                                       <div class="btn-group" data-toggle="buttons">
                                            @foreach($genders as $id => $name)
                                               <label class="btn btn-default">
                                                   <input type="radio" value="{{$id}}" name="gender" >{{$name}}
                                               </label>
                                            @endforeach
                                       </div>
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('gender'))}}</p>
                                   </div>

                               </div>

                               <div class="form-group {{!$errors->has('address') ?:'has-error'}}">
                                    {{ Form::label('address', 'Address', ['class' => 'control-label col-md-2']) }}
                                    <div class="col-md-6">
                                        {{Form::textarea('address', null, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'rows'   => '3'
                                        ])}}
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('address'))}}</p>
                                    </div>
                               </div>

                               <div class="form-group {{!$errors->has('contact_no') ?:'has-error'}}">
                                    {{ Form::label('contact_no', 'Contact No.', ['class' => 'control-label col-md-2']) }}
                                    <div class="col-md-6">
                                        {{ Form::text('contact_no', null, ['class' => 'form-control', 'required' => 'required']) }}
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('contact_no'))}}</p>
                                    </div>
                               </div>

                               <hr/>

                            </div>

                               {{--Spacer--}}
                               <div class="form-group">
                               <div class="col-md-3"></div>
                               </div>


                               @if($currentUser->isAdminModerator())
                                   <div class="form-group {{!$errors->has('branch') ?:'has-error'}}">
                                        {{ Form::label('branch', 'Select Branch', ['class' => 'control-label col-md-4']) }}
                                        <div class="col-md-4">
                                            <select name="branch" class="form-control m-bot15">
                                                <option value="" disabled selected>-- Please Select Branch --</option>
                                                @foreach($branches as $br)
                                                    <option value="{{$br->id}}">{{$br->present()->prettyName()}}</option>
                                                @endforeach
                                            </select>
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('branch'))}}</p>
                                        </div>
                                   </div>
                               @else
                                    {{Form::hidden('branch', $currentUser->getEmployeeBranch()->id)}}
                               @endif

                               <div class="form-group {{!$errors->has('department') ?:'has-error'}}">
                                    {{ Form::label('department', 'Select Department', ['class' => 'control-label col-md-4']) }}
                                    <div class="col-md-4">
                                        <select name="department" class="form-control m-bot15">
                                            <option value="" disabled selected>-- Please Select Department --</option>
                                            @foreach($departments as $dept)
                                                <option value="{{$dept->id}}">{{$dept->present()->prettyName()}}</option>
                                            @endforeach
                                        </select>
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('department'))}}</p>
                                    </div>
                               </div>

                               <div class="form-group {{!$errors->has('designation') ?:'has-error'}}">
                                    {{ Form::label('designation', 'Designation', ['class' => 'control-label col-md-4']) }}
                                    <div class="col-md-4">
                                        {{ Form::text('designation', null, ['class' => 'form-control', 'required' => 'required']) }}
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('designation'))}}</p>
                                    </div>
                               </div>

                               <div class="form-group {{!$errors->has('hired_date') ?:'has-error'}}">
                                   {{ Form::label('hired_date', 'Hired Date', ['class' => 'control-label col-md-4']) }}
                                   <div class="col-md-3">
                                       <div class="input-append date hiredDate margin-bottom-10">
                                       {{ Form::text('hired_date', Carbon::now()->format('Y-m-d'),
                                            [ 'class' => 'form-control',
                                              'readonly']) }}
                                          <span class="input-group-btn add-on">
                                            <button class="btn btn-primary" type="button" style="height: 35px;"><i class="fa fa-calendar"></i></button>
                                          </span>
                                       </div>
                                       <small><span class="label label-danger">NOTE!</span><i> Default: Current Time. You may specify manually<i></small>
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('hired_date'))}}</p>
                                   </div>
                               </div>

                               <hr/>

                               <div class="form-group">
                                   <label for="agree" class="control-label col-md-4 col-sm-4">Create Account?</label>
                                   <div class="col-md-6 col-sm-9">
                                       <div class="flat-grey single-row" id="hire-emp-create-user-toggle">
                                           <div class="radio ">
                                               <input type="checkbox" name="create_account" value="checked" {{Input::old('create_account')}}>
                                           </div>
                                       </div>
                                   </div>
                               </div>

                                <div id="hire-emp-users-info" style="{{Input::old('create_account')=='checked' ?:'display:none;'}}">
                                    <div class="form-group">
                                         {{ Form::label('role', 'Select Role', ['class' => 'control-label col-md-4']) }}
                                         <div class="col-md-6 {{!$errors->has('role') ?:'has-error'}}">
                                                <div class="btn-group" data-toggle="buttons">
                                                     @foreach($roles as $role)
                                                        <label class="btn btn-default">
                                                            <input type="radio" value="{{ $role->id }}" name="role" > {{$role->present()->prettyRoleName()}}
                                                        </label>
                                                     @endforeach
                                                </div>
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('role'))}}</p>
                                         </div>
                                    </div>

                                    <div class="form-group {{!$errors->has('email') ?:'has-error'}}">
                                         {{ Form::label('usr_email', 'Email', ['class' => 'control-label col-md-4']) }}
                                         <div class="col-md-4">
                                             {{ Form::text('email', null, [
                                                    'class' => 'form-control',
                                                    'id' => 'usr_email'
                                                ]) }}
                                            <p class="help-block">{{DataHelper::arrayToString($errors->get('email'))}}</p>
                                         </div>
                                    </div>
                                </div>

                               <hr/>

                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-6">
                                        {{ Form::submit('Hire Employee', ['class' => 'btn btn-primary', 'id' => 'btn-hire-employee']) }}
                                        {{ HTML::link(URL::route('employees_index_path'), 'Go Back', ['class' => 'btn btn-default']) }}
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