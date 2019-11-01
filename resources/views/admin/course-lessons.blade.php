<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">


<!-- Mirrored from learning.frontendmatter.com/html/website-instructor-course-edit-lessons.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:30 GMT -->
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
@include('admin.nav')

  <div class="container">

    <div class="page-section">
      <div class="row">

        <div class="col-md-9">

          <!-- Tabbable Widget -->
          <div class="tabbable paper-shadow relative" data-z="0.5">

            <!-- Tabs -->
            <ul class="nav nav-tabs">


              <li class="active"><a href=""><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Lessons</span></a></li>
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
              <div id="lessons" class="tab-pane active">
                <div class="media v-middle s-container">
                  <div class="media-body">
                    {{--<h5 class="text-subhead text-light">3 Lessons</h5>--}}
                  </div>
                  <div class="media-right">
                    <a class="btn btn-primary paper-shadow relative" href="{{route('admin.course.edit-lesson',$id)}}">Add lesson</a>
                  </div>
                </div>
                <div class="nestable" id="nestable-handles-primary">
                  <ul class="nestable-list">

                  @foreach($lessons as $lesson)
                      <li class="nestable-item nestable-item-handle" data-id="2">
                        <div class="nestable-handle"><i class="md md-menu"></i></div>
                        <div class="nestable-content">
                          <div class="media v-middle">
                            <div class="media-left">
                              <div class="icon-block half bg-blue-400 text-white">
                                <img src="{{asset('/storage'.$lesson->image)}}">
                              </div>

                            </div>
                            <div class="media-body">
                              <h4 class="text-title">
                                <a href="/admin/course/{{$id}}/lesson/{{$lesson->id}}" class="link-text-color">{{$lesson->name}}</a>
                              </h4>

                            </div>
                            <div class="media-right">
                              <a href="{{route('edit',$lesson->id)}}" class="btn btn-white btn-flat"><i class="fa fa-pencil fa-fw"></i> Edit</a>
                            </div>
                          </div>
                        </div>
                      </li>
                    @endforeach




                  </ul>
                </div>
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


<!-- Mirrored from learning.frontendmatter.com/html/website-instructor-course-edit-lessons.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:30 GMT -->
</html>
