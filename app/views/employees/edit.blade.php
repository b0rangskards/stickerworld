@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">

                {{-- Show Flash Message here --}}
                @include('flash::message')

                    <div>

                        <div class="form">
                            {{ Form::open(['route' => ['update_employee_path',$currentEmployee->id],
                                           'method'=> 'PUT',
                                           'class' => 'form-horizontal',
                                           'files' =>  true,
                                           'role'  => 'form',
                                           'novalidate' => 'novalidate']) }}

                                    {{-- Upload Employee Photo --}}
                                   <div class="form-group col-md-2 {{!$errors->has('employee_photo') ?:'has-error'}}">
                                       <div class="col-md-12">
                                           <div class="fileupload fileinput-new margin-bottom-10" data-provides="fileinput">
                                               <div class="fileinput-new thumbnail employee-thumbnail-upload-photo">
                                                <img class="employee-thumbnail-upload-photo"
                                                     src="{{ !is_null($currentEmployee->picture)
                                                             ? Config::get('constants.EMPLOYEE_PICTURE_URL').$currentEmployee->picture
                                                             : '/images/no_img.png'}}"
                                                     alt=""/>
                                               </div>
                                               <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                               <div class="col-md-offset-2 upload-btns">
                                                          <span class="btn btn-round btn-white btn-file">
                                                              <span class="fileinput-new">{{is_null($currentEmployee->picture)?'Upload Photo':'Change Photo'}}</span>
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

                                <div class="col-md-10">

                                   {{--Firstname--}}
                                   <div class="form-group">
                                        {{ Form::label('firstname', 'Name', ['class' => 'control-label col-md-2']) }}
                                        <div class="col-md-3 {{!$errors->has('firstname') ?:'has-error'}}" >
                                            {{ Form::text('firstname', $currentEmployee->firstname, ['class' => 'form-control', 'placeholder' => 'Firstname', 'required' => 'required']) }}
                                            <p class="help-block">{{DataHelper::arrayToString($errors->get('firstname'))}}</p>
                                        </div>
                                        <div class="col-md-3 {{!$errors->has('middlename') ?:'has-error'}}">
                                            {{ Form::text('middlename', $currentEmployee->middlename, ['class' => 'form-control', 'placeholder' => 'Middlename',  'required' => 'required']) }}
                                            <p class="help-block">{{DataHelper::arrayToString($errors->get('middlename'))}}</p>
                                        </div>
                                        <div class="col-md-3 {{!$errors->has('lastname') ?:'has-error'}}">
                                            {{ Form::text('lastname', $currentEmployee->lastname, ['class' => 'form-control', 'placeholder' => 'Lastname', 'required' => 'required']) }}
                                            <p class="help-block">{{DataHelper::arrayToString($errors->get('lastname'))}}</p>
                                        </div>
                                   </div>

                                   <div class="form-group">
                                        {{-- Birthdate --}}
                                       {{ Form::label('birthdate', 'Birth Date', ['class' => 'control-label col-md-2']) }}
                                       <div class="col-md-3 {{!$errors->has('birthdate') ?:'has-error'}}">
                                           <div class="input-append date dpBdate">
                                           {{ Form::text('birthdate', $currentEmployee->birthdate,
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
                                                @foreach($genders as $value => $name)
                                                    <label class="btn btn-default  {{{$currentEmployee->gender==$value ? ' active ' : ''}}}">
                                                        <input type="radio" value="{{$value}}" name="gender"  {{{$currentEmployee->gender==$value ? ' checked ' : ''}}}>{{$name}}
                                                    </label>
                                                @endforeach
                                           </div>
                                            <p class="help-block">{{DataHelper::arrayToString($errors->get('gender'))}}</p>
                                       </div>

                                   </div>

                                   <div class="form-group {{!$errors->has('address') ?:'has-error'}}">
                                        {{ Form::label('address', 'Address', ['class' => 'control-label col-md-2']) }}
                                        <div class="col-md-6">
                                            {{Form::textarea('address', $currentEmployee->address, [
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
                                            {{ Form::text('contact_no', $currentEmployee->contact_no, ['class' => 'form-control', 'required' => 'required']) }}
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
                                   <div class="form-group {{!$errors->has('branch') ?'':'has-error'}}">
                                        {{ Form::label('branch', 'Select Branch', ['class' => 'control-label col-md-4']) }}
                                        <div class="col-md-4">
                                            <select name="branch" class="form-control m-bot15">
                                                <option value="" disabled>-- Please Select Branch --</option>
                                                @foreach($branches as $br)
                                                    <option value="{{$br->id}}" {{$currentEmployee->br_id == $br->id ?'selected':''}}>{{$br->present()->prettyName()}}</option>
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
                                                <option value="{{$dept->id}}" {{!is_null($currentEmployee->dept_id) && $currentEmployee->dept_id==$dept->id?'selected':''}}>{{$dept->present()->prettyName()}}</option>
                                            @endforeach
                                        </select>
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('department'))}}</p>
                                    </div>
                               </div>

                               <div class="form-group {{!$errors->has('designation') ?:'has-error'}}">
                                    {{ Form::label('designation', 'Designation', ['class' => 'control-label col-md-4']) }}
                                    <div class="col-md-4">
                                        {{ Form::text('designation', $currentEmployee->designation, ['class' => 'form-control', 'required' => 'required']) }}
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('designation'))}}</p>
                                    </div>
                               </div>

                               <div class="form-group {{!$errors->has('hired_date') ?:'has-error'}}">
                                   {{ Form::label('hired_date', 'Hired Date', ['class' => 'control-label col-md-4']) }}
                                   <div class="col-md-3">
                                       <div class="input-append date hiredDate margin-bottom-10">
                                       {{ Form::text('hired_date', $currentEmployee->hired_date,
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

                            @if(is_null($currentEmployee->user_id))
                               <div class="form-group ">
                                   <label for="agree" class="control-label col-md-4 col-sm-4">Create Account?</label>
                                   <div class="col-md-6 col-sm-9">
                                       <div class="flat-grey single-row" id="hire-emp-create-user-toggle">
                                           <div class="radio ">
                                               <input type="checkbox" name="create_account" value="checked" {{is_null($currentEmployee->user_id)?:'checked'}} {{Input::old('create_account')}}>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                            @endif

                                <div id="hire-emp-users-info" style="{{empty($currentEmployee->user_id) ? 'display:none;' : ''}}">
                                    <div class="form-group">
                                         {{ Form::label('role', 'Select Role', ['class' => 'control-label col-md-4']) }}
                                         <div class="col-md-6 {{!$errors->has('role') ?:'has-error'}}">
                                                <div class="btn-group" data-toggle="buttons">
                                                     @foreach($roles as $role)
                                                        <label class="btn btn-default {{!is_null($currentEmployee->user_id) && $currentEmployee->user()->first()->role_id == $role->id ? ' active' : ''}}">
                                                            <input type="radio"
                                                            value="{{ $role->id }}"
                                                            name="role" >{{$role->present()->prettyRoleName()}}
                                                        </label>
                                                     @endforeach
                                                </div>
                                         <p class="help-block">{{DataHelper::arrayToString($errors->get('role'))}}</p>
                                         </div>
                                    </div>

                                    @if(is_null($currentEmployee->user_id))
                                        <div class="form-group {{!$errors->has('email') ?:'has-error'}}">
                                             {{ Form::label('usr_email', 'Email', ['class' => 'control-label col-md-4']) }}
                                             <div class="col-md-4">
                                                 {{ Form::text('email', null , ['class' => 'form-control', 'id' => 'usr_email']) }}
                                                <p class="help-block">{{DataHelper::arrayToString($errors->get('email'))}}</p>
                                             </div>
                                        </div>
                                    @endif
                                </div>

                               <hr/>

                                <div class="form-group">
                                    <div class="col-lg-offset-4 col-md-6">
                                        {{ Form::submit('Update Employee', ['class' => 'btn btn-primary', 'id' => 'form-update-employee-btn-submit']) }}
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