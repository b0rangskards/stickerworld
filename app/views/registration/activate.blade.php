<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activate Your Account - Stickerworld</title>

    {{ HTML::style('css/vendor.min.css') }}
    {{ HTML::style('css/admin.min.css') }}
</head>
<body class="login-body">

    <div class="container">
        {{ Form::open(['route' => 'user_activation_path', 'class' => 'form-signin', 'role' => 'form', 'novalidate' => 'novalidate']) }}

            <h3 class="form-signin-heading">Stickerworld
                <br/>
                <small>Please enter desired Username and Password <br/>to activate your account</small>
            </h3>

                <div class="login-wrap">
                    <div class="user-login-info">
                        {{-- Display Errors Here --}}
                        @include('layouts.partials.errors')

                        {{ Form::hidden('activation_code', $activationCode ) }}
                        {{ Form::text('username', null, ['class' => 'form-control', 'id' => 'username_activation', 'placeholder' => 'Username', 'autofocus' => 'autofocus', 'required' => 'required']) }}
                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'required' => 'required']) }}
                    </div>

                    {{ Form::submit('Activate Account', ['class' => 'btn btn-primary btn-lg btn-block']) }}
                </div>
        {{ Form::close() }}
    </div>

{{ HTML::script('js/vendor.min.js') }}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
{{ HTML::script('js/admin.min.js') }}
</body>
</html>
