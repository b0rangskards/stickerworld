@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">

                {{-- Show Flash Message here --}}
                @include('flash::message')

                    <div class="position-center">

                        {{-- Display Errors Here --}}
                        @include('layouts.partials.errors')

                        <div class="form">
                            {{ Form::open(['route' => 'hire_employee_path',
                                           'class' => 'form-horizontal',
                                           'files' =>  true,
                                           'role'  => 'form',
                                           'novalidate' => 'novalidate']) }}

                               {{--Firstname--}}
                               <div class="form-group">
                                    {{ Form::label('firstname', 'Firstname', ['class' => 'control-label col-lg-3']) }}
                                    <div class="col-lg-6">
                                        {{ Form::text('firstname', null, ['class' => 'form-control', 'required' => 'required']) }}
                                        <p class="help-block"></p>
                                    </div>
                               </div>

                               {{--Middlename--}}
                               <div class="form-group">
                                    {{ Form::label('middlename', 'Middlename', ['class' => 'control-label col-lg-3']) }}
                                    <div class="col-lg-6">
                                        {{ Form::text('middlename', null, ['class' => 'form-control', 'required' => 'required']) }}
                                        <p class="help-block"></p>
                                    </div>
                               </div>

                               {{--Lastname--}}
                               <div class="form-group">
                                    {{ Form::label('lastname', 'Lastname', ['class' => 'control-label col-lg-3']) }}
                                    <div class="col-lg-6">
                                        {{ Form::text('lastname', null, ['class' => 'form-control', 'required' => 'required']) }}
                                        <p class="help-block"></p>
                                    </div>
                               </div>

                               <div class="form-group">
                                    {{ Form::label('gender', 'Gender', ['class' => 'control-label col-lg-3']) }}
                                    <div class="col-lg-6">
                                        {{--{{Form::select('gender', $genders, null, ['class' => 'form-control m-bot15'])}}--}}
                                        <div class="btn-group" data-toggle="buttons">
                                             @foreach($genders as $id => $name)
                                                <label class="btn btn-default">
                                                    <input type="radio" value="{{$id}}" name="gender" >{{$name}}
                                                </label>
                                             @endforeach
                                        </div>
                                        <p class="help-block"></p>
                                    </div>
                               </div>

                               {{--birthdate--}}
                               <div class="form-group">
                                   {{ Form::label('birthdate', 'Birth Date', ['class' => 'control-label col-lg-3']) }}
                                   <div class="col-lg-4">

                                       <div class="input-append date dpBdate">
                                       {{ Form::text('birthdate', null,
                                            [ 'class' => 'form-control',
                                              'size' => '10',
                                              'readonly']) }}
                                          <span class="input-group-btn add-on">
                                            <button class="btn btn-primary" type="button" style="height: 35px;"><i class="fa fa-calendar"></i></button>
                                          </span>
                                       </div>

                                       <p class="help-block"></p>
                                   </div>
                               </div>

                               <div class="form-group">
                                    {{ Form::label('address', 'Address', ['class' => 'control-label col-lg-3']) }}
                                    <div class="col-lg-6">
                                    {{Form::textarea('address', null, [
                                    'class' => 'form-control',
                                    'required' => 'required',
                                    'rows'   => '3'
                                    ])}}
                                        <p class="help-block"></p>
                                    </div>
                               </div>

                               <div class="form-group">
                                    {{ Form::label('contact_no', 'Contact No.', ['class' => 'control-label col-lg-3']) }}
                                    <div class="col-lg-6">
                                        {{ Form::text('contact_no', null, ['class' => 'form-control', 'required' => 'required']) }}
                                        <p class="help-block"></p>
                                    </div>
                               </div>

                               <div class="form-group">
                                  {{ Form::label('employee_photo', 'Select Employee Picture', ['class' => 'control-label col-lg-3']) }}

                                   <div class="col-lg-6">
                                       <div class="fileupload fileinput-new" data-provides="fileinput" style="margin-bottom: 10px;">
                                           <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                               <img src="/images/no_img.png" alt="" />
                                           </div>
                                           <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                           <div>
                                                      <span class="btn btn-white btn-file">
                                                      <span class="fileinput-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                      <span class="fileinput-exists"><i class="fa fa-undo"></i> Change</span>
                                                      {{Form::file('employee_photo', ['class' => 'default'])}}
                                                      </span>
                                               <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                           </div>
                                       </div>

                                       <span class="label label-info">Optional</span>
                                       <span class="label label-danger">NOTE!</span>
                                                <span>
                                                Only image files are allowed to upload.
                                                </span>
                                   </div>
                               </div>

                               <hr/>

                               @if($currentUser->isAdminModerator())
                                   <div class="form-group">
                                        {{ Form::label('br_id', 'Select Branch', ['class' => 'control-label col-lg-3']) }}
                                        <div class="col-lg-6">
                                            <select name="br_id" class="form-control m-bot15">
                                                @foreach($branches as $br)
                                                    <option value="{{$br->id}}">{{$br->present()->prettyName()}}</option>
                                                @endforeach
                                            </select>
                                            <p class="help-block"></p>
                                        </div>
                                   </div>
                               @else
                                    {{Form::hidden('br_id', $currentUser->getEmployeeBranch()->id)}}
                               @endif

                               <div class="form-group">
                                    {{ Form::label('dept_id', 'Select Department', ['class' => 'control-label col-lg-3']) }}
                                    <div class="col-lg-6">
                                        {{Form::select('dept_id', $departments, null, ['class' => 'form-control m-bot15'])}}
                                        <p class="help-block"></p>
                                    </div>
                               </div>

                               <div class="form-group">
                                    {{ Form::label('designation', 'Designation', ['class' => 'control-label col-lg-3']) }}
                                    <div class="col-lg-6">
                                        {{ Form::text('designation', null, ['class' => 'form-control', 'required' => 'required']) }}
                                        <p class="help-block"></p>
                                    </div>
                               </div>

                               <div class="form-group">
                                   {{ Form::label('hired_date', 'Hired Date', ['class' => 'control-label col-lg-3']) }}
                                   <div class="col-lg-4">

                                       <div class="input-append date hiredDate">
                                       {{ Form::text('hired_date', Carbon::now()->format('Y-m-d'),
                                            [ 'class' => 'form-control',
                                              'size' => '10',
                                              'readonly']) }}
                                          <span class="input-group-btn add-on">
                                            <button class="btn btn-primary" type="button" style="height: 35px;"><i class="fa fa-calendar"></i></button>
                                          </span>
                                       </div>

                                       <p class="help-block"></p>
                                   </div>
                               </div>

                               <hr/>

                               <div class="form-group ">
                                   <label for="agree" class="control-label col-lg-3 col-sm-3">Create Account?</label>
                                   <div class="col-lg-6 col-sm-9">
                                       <div class="flat-grey single-row" id="hire-emp-create-user-toggle">
                                           <div class="radio ">
                                               <input type="checkbox" name="create_account" value="checked">
                                           </div>
                                       </div>
                                   </div>
                               </div>

                                <div id="hire-emp-users-info" style="display:none;">
                                    <div class="form-group">
                                         {{ Form::label('role_id', 'Select Role', ['class' => 'control-label col-lg-3']) }}
                                         <div class="col-lg-6">

                                                <div class="btn-group" data-toggle="buttons">
                                                     @foreach($roles as $role)
                                                        <label class="btn btn-default">
                                                            <input type="radio" value="{{ $role->id }}" name="role_id" > {{$role->present()->prettyRoleName()}}
                                                        </label>
                                                     @endforeach
                                                </div>

{{--                                             {{Form::select('role_id', $roles, null, ['class' => 'form-control m-bot15'])}}--}}
                                             <p class="help-block"></p>
                                         </div>
                                    </div>

                                    <div class="form-group">
                                         {{ Form::label('usr_email', 'Email', ['class' => 'control-label col-lg-3']) }}
                                         <div class="col-lg-6">
                                             {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'usr_email']) }}
                                             <p class="help-block"></p>
                                         </div>
                                    </div>
                                </div>

                               <hr/>

                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        {{ Form::submit('Hire Employee', ['class' => 'btn btn-primary', 'id' => 'btn-hire-employee']) }}
                                        {{ Form::button('Cancel', ['class' => 'btn btn-default']) }}
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