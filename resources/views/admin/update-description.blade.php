<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">


<!-- Mirrored from learning.frontendmatter.com/html/website-instructor-course-edit-meta.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:27 GMT -->
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
                        <li ><a href="{{route('update.course',$course->id)}}"><i class="fa fa-fw fa-lock"></i> <span class="hidden-sm hidden-xs">Update Course</span></a></li>
                        <li class="active"><a href="{{route('update.description',$course->id)}}"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Update Course Description</span></a></li>
                        <?php if (auth()->user()->hasAnyRole(['admin','canada_admin','nigeria_admin'])): ?>
                        <li class=""><a href="{{route('assign.tutor',$course->id)}}"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Assign Tutor</span></a></li>
                        <?php endif; ?>
                        <li class=""><a href="{{route('module.create',$course->id)}}"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Create Modules</span></a></li>
                        <li><a href="{{route('module.show',$course->id)}}"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Manage Modules</span></a></li>
                        <li><a href="{{route('course.students',$course->id)}}"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Students</span></a></li>
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
                        <div id="meta" class="tab-pane active">
                            <form method="post" action="{{route('update.description.store',$course->id)}}" class="form-horizontal" enctype="multipart/form-data" >
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="select" class="col-sm-3 control-label">Category</label>
                                    <div class="col-sm-9 col-md-9">
                                        <select name="category" id="select" class="form-control select2">
                                            <option selected value="{{$course->category}}">{{$course->category}}</option>
                                            <option value="front end">Front End</option>
                                            <option value="back end">Back End</option>
                                            <option value="animation">Animation</option>
                                            <option value="dev ups">Dev ups</option>
                                        </select>
                                    </div>
                                    <div>
                                        @error('category')
                                        <span class="alert text-danger"> <strong>{{ $message }}</strong> </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Course Image</label>
                                    <div class="col-md-6">
                                        <div class="media v-middle">
                                            <div class="media-left">
                                                <div class="icon-block width-100 bg-grey-100">
                                                    <i class="fa fa-photo text-light"></i>
                                                </div>
                                            </div>

                                            <div class="media-body">
                                                <input name="image" data-z="0.5" data-hover-z="1" placeholder="Add Image" class="form-control btn btn-white btn-sm paper-shadow relative" type="file">
                                            </div>
                                            <div>
                                                @error('image')
                                                <span class="alert text-danger"> <strong>{{ $message }}</strong> </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="start" class="col-sm-3 control-label">Start Date</label>
                                    <div class="col-sm-9 col-md-4">
                                        <input id="datepicker" value="{{$course->start}}" name="start"  class="form-control datepicker">
                                    </div>
                                    <div>
                                        @error('start')
                                        <span class="alert text-danger"> <strong>{{ $message }}</strong> </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="end" class="col-sm-3 control-label">End Date</label>
                                    <div class="col-sm-9 col-md-4">
                                        <input id="datepicker" value="{{$course->end}}" name="end"  class="form-control datepicker">
                                        <div>
                                            @error('end')
                                            <span class="alert text-danger"> <strong>{{ $message }}</strong> </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
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

<!-- Vendor Scripts Standalone Libraries -->
<!-- <script src="js/vendor/core/all.js"></script> -->
<!-- <script src="js/vendor/core/jquery.js"></script> -->
<!-- <script src="js/vendor/core/bootstrap.js"></script> -->
<!-- <script src="js/vendor/core/breakpoints.js"></script> -->
<!-- <script src="js/vendor/core/jquery.nicescroll.js"></script> -->
<!-- <script src="js/vendor/core/isotope.pkgd.js"></script> -->
<!-- <script src="js/vendor/core/packery-mode.pkgd.js"></script> -->
<!-- <script src="js/vendor/core/jquery.grid-a-licious.js"></script> -->
<!-- <script src="js/vendor/core/jquery.cookie.js"></script> -->
<!-- <script src="js/vendor/core/jquery-ui.custom.js"></script> -->
<!-- <script src="js/vendor/core/jquery.hotkeys.js"></script> -->
<!-- <script src="js/vendor/core/handlebars.js"></script> -->
<!-- <script src="js/vendor/core/jquery.hotkeys.js"></script> -->
<!-- <script src="js/vendor/core/load_image.js"></script> -->
<!-- <script src="js/vendor/core/jquery.debouncedresize.js"></script> -->
<!-- <script src="js/vendor/core/modernizr.js"></script> -->
<!-- <script src="js/vendor/core/velocity.js"></script> -->
<!-- <script src="js/vendor/tables/all.js"></script> -->
<!-- <script src="js/vendor/forms/all.js"></script> -->
<!-- <script src="js/vendor/media/slick.js"></script> -->
<!-- <script src="js/vendor/charts/flot/all.js"></script> -->
<!-- <script src="js/vendor/nestable/jquery.nestable.js"></script> -->
<!-- <script src="js/vendor/countdown/all.js"></script> -->
<!-- <script src="js/vendor/angular/all.js"></script> -->

<!-- App Scripts Bundle
  Includes Custom Application JavaScript used for the current theme/module;
  Do not use it simultaneously with the standalone modules below. -->
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


<!-- Mirrored from learning.frontendmatter.com/html/website-instructor-course-edit-meta.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:27 GMT -->
</html>
