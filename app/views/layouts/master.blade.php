<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{{ is_null(Request::segment(2)) ? ucfirst(Request::segment(1)) : ucfirst(Request::segment(2)) }}}</title>

    {{ HTML::style('css/vendor.min.css'); }}
    {{ HTML::style('css/admin.min.css'); }}

    {{ HTML::script('https://maps.googleapis.com/maps/api/js?v=3.exp'); }}
    {{ HTML::script('js/vendor.min.js'); }}
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'); }}
    {{ HTML::script('http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js'); }}
    {{ HTML::script('js/admin.min.js'); }}
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

</body>
</html>
