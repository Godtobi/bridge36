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
      <h4 class="page-section-heading">View Students</h4>
      <div class="panel panel-default">
        <!-- Data table -->
        <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Start date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Start date</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          <tbody>
          @foreach($students as $student)
            <tr>
              <td>{{$student->firstname}}</td>
              <td>{{$student->lastname}}</td>
              <td>{{$student->email}}</td>
              <td>{{$student->phone}}</td>
              <td>{{$student->created_at}}</td>

              <td>  <a title="View" style="color:#001a57;" href="{{route('student.profile',$student->id)}}" ><i class="fa fa-eye"></i></a>
                &nbsp
                &nbsp
                @if(!$student->active)

                    <a title="Enable" href="{{route('student.disable',$student->id)}}" class="btn btn-success paper-shadow relative" data-z="0" data-hover-z="1" data-animated href="#">  Enable   </a>
                @endif
                @if($student->active)
                    <a title="Disable" href="{{route('student.disable',$student->id)}}" class="btn btn-danger paper-shadow relative" data-z="0" data-hover-z="1" data-animated href="#"> Disable   </a>
                @endif
               </td>

            </tr>
          @endforeach

          </tbody>
        </table>
        <!-- // Data table -->
      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer class="footer">
    <strong>56BRIDGE</strong> v1.1.0 &copy; Copyright 2019
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


<!-- Mirrored from learning.frontendmatter.com/html/website-instructor-course-edit-lessons.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:30 GMT -->
</html>
