<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stickerworld Sign In</title>
    {{ HTML::style('css/vendor.min.css'); }}
    {{ HTML::style('css/admin.min.css'); }}
</head>
<body class="login-body">

    <div class="container">

      {{ Form::open(['route' => 'login_path', 'class' => 'form-signin']) }}

        <h2 class="form-signin-heading">Stickerworld <br/><small>Sign in now</small></h2>

        <div class="login-wrap">
            <div class="user-login-info">

                {{-- Show Flash Message here --}}
                @include('flash::message')
                {{-- Display Errors Here --}}
                {{--@include('layouts.partials.errors')--}}

                {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'autofocus' => 'autofocus', 'required' => 'required']) }}
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) }}

            </div>

            {{ Form::submit('Sign In', ['class' => 'btn btn-lg btn-login btn-block']) }}
        </div>

      {{ Form::close() }}

    </div>

    {{ HTML::script('js/vendor.min.js'); }}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    {{ HTML::script('js/admin.min.js'); }}
</body>
</html>
