<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    {{ HTML::style('css/vendor.min.css'); }}
    {{ HTML::style('css/admin.min.css'); }}
</head>
<body class="body-404">

    <div class="error-head"> </div>

    <div class="container">

      <section class="error-wrapper text-center">
          <h1><img src="images/page_not_found.png" alt="Page Not Found" /></h1>
          <div class="error-desk">
              <h2>page not found</h2>
              <p class="nrml-txt">We Couldn’t Find This Page</p>
          </div>
          <a href="{{ URL::route('home') }}" class="back-btn"><i class="fa fa-home"></i>Back To Home</a>
      </section>

    </div>

    {{ HTML::script('js/vendor.min.js'); }}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    {{ HTML::script('js/admin.min.js'); }}
</body>
</html>
