<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    {{ HTML::style('css/vendor.min.css') }}
    {{ HTML::style('css/admin.min.css') }}
</head>
<body>

<div class="row">

    <div class="col-sm-8 col-sm-offset-2">
        <section class="panel">
            <header class="panel-heading">
                Activate Account <br/>
                <small>Please Enter Username and Password to activate your account</small>
            </header>
            <div class="panel-body">
                <div class="position-center">

                {{-- Display Errors Here --}}
                @include('layouts.partials.errors')

                    {{ Form::open(['route' => 'user_activation_path', 'class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']) }}

                    {{ Form::hidden('activation_code', $activationCode ) }}

                    <div class="form-group">
                        {{ Form::label('username', 'Username', ['class' => 'col-lg-2 col-sm-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'autofocus' => 'autofocus', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'Password', ['class' => 'col-lg-2 col-sm-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-lg-2 col-sm-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'required' => 'required']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Activate Account', ['class' => 'btn btn-success btn-lg btn-login btn-block']) }}
                        </div>
                    </div>

                {{ Form::close() }}

                </div>
            </div>
        </section>
    </div>

</div>

    {{ HTML::script('js/vendor.min.js') }}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    {{ HTML::script('js/admin.min.js') }}
</body>
</html>
