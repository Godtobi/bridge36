<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">


<!-- Mirrored from learning.frontendmatter.com/html/website-student-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:04:56 GMT -->
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

          <div class="panel panel-default">
            <div class="media v-middle">
              <div class="media-left">
                <div class="bg-green-400 text-white">
                  <div class="panel-body">
                    <i class="fa fa-credit-card fa-fw fa-2x"></i>
                  </div>
                </div>
              </div>
              <div class="media-body">
                Your next course ends on <span class="text-body-2">25 February 2020</span>
              </div>
              <div class="media-right media-padding">
                <a href="{{route('courses')}}" class="btn btn-white paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated href="#">
                Take new course
            </a>
              </div>
            </div>
          </div>

          <div class="row" data-toggle="isotope">
            <div class="item col-xs-12 col-lg-6">
              <div class="panel panel-default paper-shadow" data-z="0.5">
                <div class="panel-heading">
                  <h4 class="text-headline margin-none">Courses</h4>
                  <p class="text-subhead text-light">Your recent courses</p>
                </div>
                <ul class="list-group">
                  @foreach($courses as $course)
                    <li class="list-group-item media v-middle">
                      <div class="media-body">
                        <a href="{{route('curriculum',$course->id)}}" class="text-subhead list-group-link">{{$course->name}}</a>
                      </div>
                      <div class="media-right">
                        <div class="progress progress-mini width-100 margin-none">
                          <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:45%;">
                          </div>
                        </div>
                      </div>
                    </li>
                  @endforeach



                </ul>
                <div class="panel-footer text-right">
                  <a  class="btn btn-white paper-shadow relative" data-z="0" data-hover-z="1" data-animated href="{{route('courses')}}"> View all</a>
                </div>
              </div>
            </div>
            <div class="item col-xs-12 col-lg-6">
              <div class="panel panel-default paper-shadow" data-z="0.5">
                <div class="panel-body">
                  <h4 class="text-headline margin-none">Rewards</h4>
                  <p class="text-subhead text-light">Your latest achievements</p>
                  <div class="icon-block half img-circle bg-purple-300" title="Best overall">
                    <i class="fa fa-star text-white" ></i>
                  </div>
                  <div class="icon-block half img-circle bg-indigo-300" title="Star acheiver">
                    <i class="fa fa-trophy text-white"></i>
                  </div>
                  <div class="icon-block half img-circle bg-green-300" title="Completed a course">
                    <i class="fa fa-mortar-board text-white"></i>
                  </div>
                  <div class="icon-block half img-circle bg-orange-300" title="Invited friends">
                    <i class="fa fa-code-fork text-white"></i>
                  </div>
                  <div class="icon-block half img-circle bg-red-300" title="Diamond scholar">
                    <i class="fa fa-diamond text-white"></i>
                  </div>
                </div>
              </div>
              <div class="panel panel-default paper-shadow" data-z="0.5">
                <div class="panel-heading">
                  <h4 class="text-headline">Certificates
                    <small>(4)</small>
                  </h4>
                </div>
                <div class="panel-body">
                  <a class="btn btn-default text-grey-400 btn-lg btn-circle paper-shadow relative" title="Introduction to BA" data-hover-z="0.5" data-animated data-toggle="tooltip" data-title="Name of Certificate">
                    <i class="fa fa-file-text"></i>
                  </a>
                  <a class="btn btn-default text-grey-400 btn-lg btn-circle paper-shadow relative" title="Computer Analysis" data-hover-z="0.5" data-animated data-toggle="tooltip" data-title="Name of Certificate">
                    <i class="fa fa-file-text"></i>
                  </a>
                  <a class="btn btn-default text-grey-400 btn-lg btn-circle paper-shadow relative" title="Introduction to Business" data-hover-z="0.5" data-animated data-toggle="tooltip" data-title="Name of Certificate">
                    <i class="fa fa-file-text"></i>
                  </a>
                  <a class="btn btn-default text-grey-400 btn-lg btn-circle paper-shadow relative" title="Introduction to Business Knowledge
                  " data-hover-z="0.5" data-animated data-toggle="tooltip" data-title="Name of Certificate">
                    <i class="fa fa-file-text"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="item col-xs-12 col-lg-6">
              <div class="panel panel-default paper-shadow" data-z="0.5">
                <div class="panel-heading">
                  <h4 class="text-headline margin-none">Exams</h4>
                  <p class="text-subhead text-light">Your recent performance</p>
                </div>
                <ul class="list-group">
                  <li class="list-group-item media v-middle">
                    <div class="media-body">
                      <h4 class="text-subhead margin-none">
                        <a href="website-take-quiz.html" class="list-group-link">Fundamentals of business 201</a>
                      </h4>
                      <div class="caption">
                        <span class="text-light">Course:</span>
                        <a href="website-take-course.html">Business Administraion</a>
                      </div>
                    </div>
                    <div class="media-right text-center">
                      <div class="text-display-1">9.8</div>
                      <span class="caption text-light">Good</span>
                    </div>
                  </li>
                  <li class="list-group-item media v-middle">
                    <div class="media-body">
                      <h4 class="text-subhead margin-none">
                        <a href="website-take-quiz.html" class="list-group-link">Fundamentals of Analysis 111</a>
                      </h4>
                      <div class="caption">
                        <span class="text-light">Course:</span>
                        <a href="website-take-course.html">Analysis</a>
                      </div>
                    </div>
                    <div class="media-right text-center">
                      <div class="text-display-1 text-green-300">9.8</div>
                      <span class="caption text-light">Great</span>
                    </div>
                  </li>
                  <li class="list-group-item media v-middle">
                    <div class="media-body">
                      <h4 class="text-subhead margin-none">
                        <a href="website-take-quiz.html" class="list-group-link">Fundamentals of Administration 201</a>
                      </h4>
                      <div class="caption">
                        <span class="text-light">Course:</span>
                        <a href="website-take-course.html">Administrative Finance</a>
                      </div>
                    </div>
                    <div class="media-right text-center">
                      <div class="text-display-1 text-red-300">3.4</div>
                      <span class="caption text-light">Failed</span>
                    </div>
                  </li>
                </ul>
                <div class="panel-footer">
                  <a href="website-student-quizzes.html" class="btn btn-primary paper-shadow relative" data-z="0" data-hover-z="1" data-animated href="#"> Go to Results</a>
                </div>
              </div>
            </div>
            <div class="item col-xs-12 col-lg-6">
            </div>
          </div>

          <br/>
          <br/>

        </div>
@include('student.right-pane')
        <div class="col-md-3">
        <h4>Free courses</h4>
        <div class="slick-basic slick-slider" data-items="1" data-items-lg="1" data-items-md="1" data-items-sm="1" data-items-xs="1">
        @foreach($courses as $course)
            <div class="item">
              <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                <div class="panel-body">
                  <div class="media media-clearfix-xs">
                    <div class="media-left">
                      <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                        <span class="img icon-block s90 bg-default"></span>
                        <span class="overlay overlay-full padding-none icon-block s90 bg-default">
                        <!--  -->
                        </span>
                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                          <span class="v-center">
                            <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-graduation-cap"></i></span>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading margin-v-5-3"><a href="website-course.html">{{$course->name}}</a></h4>
                      <p class="small margin-none">
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
        </div>

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
  <script src="js/vendor/all.js"></script>

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
  <script src="js/app/app.js"></script>

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


<!-- Mirrored from learning.frontendmatter.com/html/website-student-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:05:01 GMT -->
</html>
