<div class="navbar navbar-default navbar-fixed-top navbar-size-large navbar-size-xlarge paper-shadow" data-z="0" data-animated role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand navbar-brand-logo">
                <a class="svg" href="{{route('admin.dashboard')}}"><img src="{{asset('images/logo.png')}}" alt="">

                </a>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav navbar-nav-margin-left">
                <li class="dropdown active">
                    <a href="{{route('admin.dashboard')}}"> <i class="fa fa-bar-chart-o"></i> Dashboard</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-book"></i> Courses</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin.course.edit')}}">Create Course</a></li>
                        <li><a href="{{route('admin.courses')}}">All Courses</a></li>
                        <li><a href="{{route('admin.courses')}}">Exams and results</a></li>
                        <li><a href="{{route('admin.courses')}}">Course subscription reports</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Users</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('students')}}"> Students</a></li>
                        <?php if (auth()->user()->hasAnyRole(['admin','canada_admin','nigeria_admin'])): ?>
                        <li><a href="{{route('user.create')}}"> Create User</a></li>
                        <li><a href="{{route('facilitators')}}">Facilitators</a></li>
                        <?php endif; ?>
                    </ul>
                </li>

                <li class="dropdown ">
                    <a href="{{route('messages')}}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-inbox"></i> Messaging <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('messages')}}">Inbox (0)</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="{{route('profile.update')}}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Profile</a>
                </li>

            </ul>
            <div class="navbar-right">
                <ul class="nav navbar-nav navbar-nav-bordered navbar-nav-margin-right">
                    <!-- user -->
                    <li class="dropdown user active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('storage'.\Illuminate\Support\Facades\Auth::user()->image)}}" alt="" class="img-circle"/> {{\Illuminate\Support\Facades\Auth::user()->lastname}}</a>
                    </li>
                    <!-- // END user -->
                </ul>
                <a href="/logout" class="navbar-btn btn btn-primary">Log out</a>
            </div>
        </div>
        <!-- /.navbar-collapse -->

    </div>
</div>

<div class="parallax overflow-hidden bg-blue-400 page-section third">
    <div class="container parallax-layer" data-opacity="true">
        <div class="media v-middle">
            <div class="media-left text-center">
                <a href="#">
                    <img src="{{asset('storage'.\Illuminate\Support\Facades\Auth::user()->image)}}" alt="people" class="img-circle width-80" />
                </a>
            </div>
            <div class="media-body">
                <h1 class="text-white text-display-1 margin-v-0">{{\Illuminate\Support\Facades\Auth::user()->lastname}}</h1>
                <p class="text-subhead"><a class="link-white text-underline" href="">View my History</a></p>
            </div>
            <div class="media-right">
                <span class="label bg-blue-500">Admin</span>
            </div>
        </div>
    </div>
</div>
