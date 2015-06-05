<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    {{ HTML::style('css/vendor.min.css'); }}
    {{ HTML::style('css/admin.min.css'); }}
</head>
<body>

    <div id="container">
        {{--Nav here--}}
        @include('layouts.partials.head-nav')

        {{-- Side Nav here --}}
        @include('layouts.partials.side-nav')

        {{--Main content here --}}
        <section id="main-content">
            <section class="wrapper">

                @yield('content')

            </section>
        </section>
    </div>

    {{ HTML::script('js/vendor.min.js'); }}
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'); }}
    {{ HTML::script('http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js'); }}
    {{ HTML::script('js/admin.min.js'); }}
</body>
</html>
