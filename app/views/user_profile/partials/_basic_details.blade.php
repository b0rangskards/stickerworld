<div>
    <section class="panel">


        <div class="panel-body" id="basic-details-div">


            <div class="">
                <div class="form-horizontal">

                <fieldset>
                <legend>Basic Details</legend>

                    @include('layouts.partials.errors')

                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label" for="username1">Username</label>
                         <div class="col-lg-8">
                            <a href="#"
                            id="username"
                            data-emptytext="Click to Change Username"
                            data-type="text"
                            data-name="username"
                            data-pk="{{ $currentUser->id }}"
                            data-url="{{ URL::route('update_user_profile_path', $currentUser->username) }}"
                            data-title="Enter username">
                            {{ $currentUser->username }}
                            </a>
                         </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label" for="password">Change Password</label>
                         <div class="col-lg-8" style="padding-top: 5px;">
                            <a id="change-password-toggle" href="#">
                            Click here to change password
                            </a>
                         </div>
                    </div>


                    <div class="col-lg-offset-4 col-lg-10" id="change-password" style="display:none">
                        {{ Form::open(['method' => 'PUT',
                                       'route'  => 'change_password_user_profile_path',
                                       'id'     => 'change-password-form'
                                    ]) }}

                           {{ Form::hidden('userId', $currentUser->id) }}

                           <div class="form-group">
                               <label for="input-password-current" class="col-lg-2 col-sm-2 control-label">Current</label>
                               <div class="col-lg-6">
                                    {{ Form::password('current_password',
                                         [
                                         'class' => 'form-control',
                                         'id' => 'input-password-current',
                                         'placeholder' => 'Current Password'
                                         ])
                                    }}
                                    <p id="current-password-error" class="help-block"></p>
                               </div>
                           </div>

                           <hr />

                           <div class="form-group">
                               <label for="input-password-new" class="col-lg-2 col-sm-2 control-label">New Password</label>
                               <div class="col-lg-6">
                                   {{ Form::password('new_password',
                                        [
                                        'class' => 'form-control',
                                        'id' => 'input-password-new',
                                        'placeholder' => 'New Password'
                                        ])
                                   }}
                                   <p id="new-password-error" class="help-block"></p>
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="input-password-new-confirm" class="col-lg-2 col-sm-2 control-label">Confirm New</label>
                               <div class="col-lg-6">
                                       {{ Form::password('new_password_confirmation',
                                            [
                                            'class' => 'form-control',
                                            'id' => 'input-password-new-confirm',
                                            'placeholder' => 'Confirm New Password'
                                            ])
                                       }}
                               </div>
                           </div>

                           <div class="form-group">
                               <div class="col-lg-offset-2 col-lg-10">
                                    {{ Form::submit('Save Changes', ['class' => 'btn btn-primary']) }}
                                    {{ Form::button('Cancel', ['class' => 'btn btn-default', 'id' => 'change-password-cancel-btn']) }}
                               </div>
                           </div>
                        {{ Form::close() }}
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 col-sm-4 control-label" for="email">Email</label>
                         <div class="col-lg-8">
                            <a href="#"
                            id="email"
                            data-emptytext="Click to Change Email"
                            data-type="email"
                            data-name="email"
                            data-pk="{{ $currentUser->id }}"
                            data-url="{{ URL::route('update_user_profile_path') }}"
                            data-title="Enter Email">
                             {{ $currentUser->email }}
                            </a>
                         </div>
                    </div>

                    {{--<div class="form-group col-md-8">--}}
                        {{--<label for="username">Username</label>--}}
                        {{--<div class="input-group m-bot10">--}}
                            {{--<span class="input-group-addon"><i class="fa fa-user"></i></span>--}}
                            {{--<input id="username"--}}
                            {{--type="text"--}}
                            {{--class="form-control"--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group col-md-8" >--}}
                        {{--<label for="password1">Change Password</label>--}}
                         {{--<div class="input-group m-bot10">--}}
                             {{--<span class="input-group-addon"><i class="fa fa-lock"></i></span>--}}
                             {{--<input id="password1" type="password" class="form-control" placeholder="*************">--}}
                         {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group col-md-8" >--}}
                        {{--<label for="email1">Email</label>--}}
                         {{--<div class="input-group m-bot10">--}}
                             {{--<span class="input-group-addon"><i class="fa fa-envelope"></i></span>--}}
                             {{--<input id="email1" type="email" class="form-control" placeholder="Change Email">--}}
                         {{--</div>--}}
                    {{--</div>--}}

                    </fieldset>

                </div>
            </div>
        </div>
    </section>
</div>






