<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Not Found</title>
    {{ HTML::style('css/vendor.min.css'); }}
    {{ HTML::style('css/admin.min.css'); }}
</head>
<body>
<div class="centering">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>Oops!</h1>
                    <h2>401 UNAUTHORIZED</h2>
                    <p>Sorry, Page is restricted!</p>
                    <div class="error-actions">
                        <a href="{{ URL::route('home') }}" class="btn btn-primary btn-lg"><i class="fa fa-home"></i>Take Me Home </a>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-envelope"></i> Contact Support </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    {{ HTML::script('js/vendor.min.js'); }}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    {{ HTML::script('js/admin.min.js'); }}
</body>
</html>
