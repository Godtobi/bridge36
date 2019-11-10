<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">


<!-- Mirrored from learning.frontendmatter.com/html/website-student-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:14 GMT -->
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
              <li class="active"><a href="{{route('facilitator.profile',$id)}} "><i class="fa fa-fw fa-user"></i> <span class="hidden-sm hidden-xs">Profile</span></a></li>
              <li><a href="{{route('student.allCourse',$id)}}"><i class="fa fa-fw fa-book"></i> <span class="hidden-sm hidden-xs">Course History</span></a></li>

            </ul>
            <!-- // END Tabs -->

            <!-- Panes -->
            <div class="tab-content">

              <div id="account" class="tab-pane active">
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
                <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data"  class="form-horizontal">
                  @csrf
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Avatar</label>
                    <div class="col-md-6">
                      <div class="media v-middle">
                        <div class="media-left">
                          <div class="icon-block width-100 bg-grey-100">
                            <img src="{{asset('/storage'.$user->image)}}">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Full Name</label>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-control-material">
                            <input type="text" value="{{$user->firstname}}"  readonly="readonly" name="firstname" class="form-control" id="exampleInputFirstName" placeholder="Your first name">

                      <div>
                        @error('firstname')
                        <span class="alert text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                      </div>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-control-material">
                            <input type="text" value="{{$user->lastname}}"  readonly="readonly" name="lastname" class="form-control" id="exampleInputLastName" placeholder="Your last name">
                        <div>
                          @error('lastname')
                          <span class="alert text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                        </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Email address</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->
                          <input type="email" value="{{$user->email}}" readonly="readonly" class="form-control" id="inputEmail3" placeholder="Email address">
                     <div>
                       @error('email')
                       <span class="alert text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                     </div>
                          <!-- <label for="inputEmail3">Email address</label> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Phone Number</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <!-- <span class="input-group-addon"><i class="fa fa-link"></i></span> -->
                          <input type="number" value="{{$user->phone}}" readonly="readonly" name="phone" class="form-control used" id="phone">
                          <div>
                            @error('phone')
                            <span class="alert text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Country</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <!-- <span class="input-group-addon"><i class="fa fa-link"></i></span> -->
                          <input type="number" value="{{$user->country}}" readonly="readonly" name="phone" class="form-control used" id="phone">
                          <div>
                            @error('phone')
                            <span class="alert text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label for="inputPassword3" class="col-md-2 control-label">Change Password</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        <label for="inputPassword3">Password</label>
                      </div>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <div class="col-md-offset-2 col-md-6">
                      <div class="checkbox checkbox-success">
                        <input id="checkbox3" type="checkbox" checked="">
                      </div>
                    </div>
                  </div>

                </form>


            </div>
            <!-- // END Panes -->

          </div>
          <br/>
          <br/>

        </div>


        </div>
        @include('admin.upper-right')
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
 <script src="{{asset('js/vendor/all.js')}}"></script>


<script src="{{asset('js/app/app.js')}}"></script>
</body>


<!-- Mirrored from learning.frontendmatter.com/html/website-student-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:14 GMT -->
</html>
