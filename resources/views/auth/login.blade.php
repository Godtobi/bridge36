<!DOCTYPE html>
<html class="hide-sidebar ls-bottom-footer" lang="en">


<!-- Mirrored from learning.frontendmatter.com/html/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:34 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>56BRIDGE</title>

    <!-- Vendor CSS BUNDLE
      Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
      TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
    <link href="{{asset('css/vendor/all.css')}}" rel="stylesheet">

    <!-- Vendor CSS Standalone Libraries
          NOTE: Some of these may have been customized (for example, Bootstrap).
          See: src/less/themes/{theme_name}/vendor/ directory -->
    <!-- <link href="css/vendor/bootstrap.css" rel="stylesheet"> -->
    <!-- <link href="css/vendor/font-awesome.css" rel="stylesheet"> -->
    <!-- <link href="css/vendor/picto.css" rel="stylesheet"> -->
    <!-- <link href="css/vendor/material-design-iconic-font.css" rel="stylesheet"> -->
    <!-- <link href="css/vendor/datepicker3.css" rel="stylesheet"> -->
    <!-- <link href="css/vendor/jquery.minicolors.css" rel="stylesheet"> -->
    <!-- <link href="css/vendor/railscasts.css" rel="stylesheet"> -->
    <!-- <link href="css/vendor/owl.carousel.css" rel="stylesheet"> -->
    <!-- <link href="css/vendor/slick.css" rel="stylesheet"> -->
    <!-- <link href="css/vendor/daterangepicker-bs3.css" rel="stylesheet"> -->
    <!-- <link href="css/vendor/jquery.bootstrap-touchspin.css" rel="stylesheet"> -->
    <!-- <link href="css/vendor/select2.css" rel="stylesheet"> -->
    <!-- <link href="css/vendor/jquery.countdown.css" rel="stylesheet"> -->

    <!-- APP CSS BUNDLE [css/app/app.css]
  INCLUDES:
      - The APP CSS CORE styling required by the "html" module, also available with main.css - see below;
      - The APP CSS STANDALONE modules required by the "html" module;
  NOTE:
      - This bundle may NOT include ALL of the available APP CSS STANDALONE modules;
        It was optimised to load only what is actually used by the "html" module;
        Other APP CSS STANDALONE modules may be available in addition to what's included with this bundle.
        See src/less/themes/html/app.less
  TIP:
      - Using bundles will improve performance by greatly reducing the number of network requests the client needs to make when loading the page. -->
    <link href="{{asset('css/app/app.css')}}" rel="stylesheet">

    <!-- App CSS CORE
  This variant is to be used when loading the separate styling modules -->
    <!-- <link href="css/app/main.css" rel="stylesheet"> -->

    <!-- App CSS Standalone Modules
      As a convenience, we provide the entire UI framework broke down in separate modules
      Some of the standalone modules may have not been used with the current theme/module
      but ALL modules are 100% compatible -->

    <!-- <link href="css/app/essentials.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/material.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/layout.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/sidebar.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/sidebar-skins.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/navbar.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/messages.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/media.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/charts.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/maps.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/colors-alerts.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/colors-background.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/colors-buttons.css" rel="stylesheet" /> -->
    <!-- <link href="css/app/colors-text.css" rel="stylesheet" /> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
  WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="login">

<div id="content">
    <div class="container-fluid">



        <div class="lock-container">
            <div class="panel panel-default text-center paper-shadow" data-z="0.5">
                <h1 class="text-display-1"></h1>
                <div class="panel-body">
                {{--@if ($errors->any())--}}
                {{--<div class="alert text-center alert-danger">--}}
                {{--<ul>--}}
                {{--@foreach ($errors->all() as $error)--}}
                {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--@endif--}}

                <!-- Signup -->
                    <form  method="post" action="{{route('login')}}">
                        @csrf

                        <div class="form-group">
                            <div class="form-control-material">
                                <input id="email" name="email" type="email" class="form-control" placeholder="Email">
                                <label for="email">Email address</label>
                            </div>
                            @error('email')
                            <span class="alert text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-control-material">
                                <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                                <label for="password">Password</label>
                                @error('password')
                                <span class="alert text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" >Sign In</button>
                        </div>
                    </form>
                    <!-- //Signup -->

                </div>
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <strong>Learning</strong> v1.1.0 &copy; Copyright 2015
</footer>
<!-- // Footer -->
<!-- Inline Script for colors and config objects; used by various external scripts; -->
<script>
    var colors = {
        "danger-color": "#e74c3c",
        "success-color": "#81b53e",
        "warning-color": "#f0ad4e",
        "inverse-color": "#2c3e50",
        "info-color": "#2d7cb5",
        "default-color": "#6e7882",
        "default-light-color": "#cfd9db",
        "purple-color": "#9D8AC7",
        "mustard-color": "#d4d171",
        "lightred-color": "#e15258",
        "body-bg": "#f6f6f6"
    };
    var config = {
        theme: "html",
        skins: {
            "default": {
                "primary-color": "#001a57"
            }
        }
    };
</script>


<script src="{{asset('js/vendor/all.js')}}"></script>


<script src="{{asset('js/app/app.js')}}"></script>

<!-- App Scripts Standalone Modules
  As a convenience, we provide the entire UI framework broke down in separate modules
  Some of the standalone modules may have not been used with the current theme/module
  but ALL the modules are 100% compatible -->

<!-- <script src="js/app/essentials.js"></script> -->
<!-- <script src="js/app/material.js"></script> -->
<!-- <script src="js/app/layout.js"></script> -->
<!-- <script src="js/app/sidebar.js"></script> -->
<!-- <script src="js/app/media.js"></script> -->
<!-- <script src="js/app/messages.js"></script> -->
<!-- <script src="js/app/maps.js"></script> -->
<!-- <script src="js/app/charts.js"></script> -->

<!-- App Scripts CORE [html]:
      Includes the custom JavaScript for this theme/module;
      The file has to be loaded in addition to the UI modules above;
      app.js already includes main.js so this should be loaded
      ONLY when using the standalone modules; -->
<!-- <script src="js/app/main.js"></script> -->

</body>


<!-- Mirrored from learning.frontendmatter.com/html/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:34 GMT -->
</html>