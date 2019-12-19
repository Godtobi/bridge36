<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">


<!-- Mirrored from learning.frontendmatter.com/html/website-take-course.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:12 GMT -->
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
    <link href="{{asset('css/app/app.css')}}" rel="stylesheet">
</head>

<body>

  <!-- Fixed navbar -->
@include('student.nav')

  <div class="container">

    <div class="page-section">
      <div class="row">

        <div class="col-md-9">

          <div class="page-section padding-top-none">
            <div class="media media-grid v-middle">
              <div class="media-left">
                <span class="icon-block half bg-blue-300 text-white">2</span>
              </div>
              <div class="media-body">
                <h1 class="text-display-1 margin-none">{{$course->name}}</h1>
              </div>
            </div>
            <br/>
            <p class="text-body-2">
              {{$course->description}}
            </p>

          </div>
            <a href="{{route("start.exam",$course->id)}}"><h5 class="text-subhead-2 text-light">Take Quiz</h5></a>
          <h5 class="text-subhead-2 text-light">Curriculum</h5>

          @foreach($container as $paramName => $value)

            <div class="panel panel-default curriculum paper-shadow" data-z="0.5">
              <div class="panel-heading panel-heading-gray" data-toggle="collapse" data-target="#curriculum-2">
                <div class="media">
                  <div class="media-left">
                    <span class="icon-block half img-circle bg-orange-300 text-white"><i class="fa fa-graduation-cap"></i></span>
                  </div>
                  <div class="media-body">
                    <h4 class="text-headline">{{$paramName}}</h4>
                    <p>{{$value[0]->mod_d}}</p>
                  </div>
                </div>
                <span class="collapse-status collapse-open">Open</span>
                <span class="collapse-status collapse-close">Close</span>
              </div>
              <div class="list-group collapse" id="curriculum-2">
              @foreach($value as $item)
                  <a href="{{route('pdf.html',$item->id)}}">
                  <div class="list-group-item media" data-target="website-take-course.html">
                    <div class="media-left">
                      <div class="text-crt">1.</div>
                    </div>
                    <div class="media-body">
                      <i  class="fa fa-fw fa-circle text-grey-200"> {{$item->lesson_name}} </i>
                    </div>
                    <div class="media-right">
                      <div class="width-100 text-right text-caption"></div>
                    </div>
                  </div>
                  </a>
                @endforeach
              </div>
            </div>
          @endforeach



          <br/>
          <br/>

        </div>
@include('student.right-pane')




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


<!-- Mirrored from learning.frontendmatter.com/html/website-take-course.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:14 GMT -->
</html>
