<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">


<!-- Mirrored from learning.frontendmatter.com/html/website-instructor-course-edit-course.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:19 GMT -->
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

<body>

<!-- Fixed navbar -->
@include('admin.nav')

<div class="container">

    <div class="page-section">
        <div class="row">

            <div class="col-md-9">

                <!-- Tabbable Widget -->
                <div class="tabbable paper-shadow relative" data-z="0.5">

                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                        <li><a href="{{route('update.course',$id)}}"><i class="fa fa-fw fa-lock"></i> <span class="hidden-sm hidden-xs">Update Course</span></a></li>
                        <li class=""><a href="{{route('update.description',$id)}}"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Update Course Description</span></a></li>
                        <?php if (auth()->user()->hasAnyRole(['admin','canada_admin','nigeria_admin'])): ?>
                        <li class="active"><a href="{{route('assign.tutor',$id)}}"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Assign Tutor</span></a></li>
                        <?php endif; ?>
                        <li class=""><a href="{{route('module.create',$id)}}"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Create Modules</span></a></li>
                        <li><a href="{{route('module.show',$id)}}"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Manage Modules</span></a></li>
                    </ul>
                    <!-- // END Tabs -->

                    <!-- Panes -->
                    <div class="tab-content">
                        @if (session('success'))
                            <div class=" text-center alert alert-success">
                                {!!  session('success') !!}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="text-center alert alert-warning">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div id="course" class="tab-pane active">
                            <form action="{{route('store.tutor')}}" method="post">
                                {{csrf_field()}}

                                <input type="hidden" value="{{$id}}" name="id" >

                                <div class="form-group {{ $errors->has('tutor_id') ? 'has-error' : ''}}">
                                    {!! Form::label('tutor_id', 'Facilitator', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::select('tutor_id', $tutors, null, ['class' => 'form-control', 'placeholder' => 'Pick a Tutor...']) !!}
                                        {!! $errors->first('tutor_id', '<p class="help-block">:message</p>') !!}
                                    </div>

                                </div>

                                <div class="text-center">

                                    <button type="submit" class="btn btn-primary" >Save</button>
                                </div>
                            </form>

                        </div>

                    </div>
                    <!-- // END Panes -->

                </div>
                <!-- // END Tabbable Widget -->

                <br/>
                <br/>

            </div>
@include('admin.right-pane')

        </div>
    </div>

</div>

<!-- Footer -->
<footer class="footer">
    <strong>56 Bridge</strong> &copy; Copyright 2019
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

<!-- Vendor Scripts Bundle
  Includes all of the 3rd party JavaScript libraries above.
  The bundle was generated using modern frontend development tools that are provided with the package
  To learn more about the development process, please refer to the documentation.
  Do not use it simultaneously with the separate bundles above. -->
<script src="{{asset('js/vendor/all.js')}}"></script>


<script src="{{asset('js/app/app.js')}}"></script>



</body>


<!-- Mirrored from learning.frontendmatter.com/html/website-instructor-course-edit-course.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:19 GMT -->
</html>
