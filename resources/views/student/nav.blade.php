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
                <a class="svg" href="{{route('dashboard')}}"><img src="{{asset('images/logo.png')}}" alt="">

                </a>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav navbar-nav-margin-left">
                <li class="dropdown active">
                    <a href="{{route('dashboard')}}"> <i class="fa fa-bar-chart-o"></i> Dashboard</a>
                </li>
                <li class="dropdown">
                    <a href="{{route('courses')}}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-mortar-board"></i> Courses </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('mycourses')}}">My Courses</a></li>
                        <li><a href="{{route('courses')}}">All Course</a></li>
                        <li><a href="{{route('courses')}}">Exams</a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-inbox"></i> Messaging <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li><a href="{{route('messages')}}">Inbox (0)</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{route('profile')}}"> <i class="fa fa-user"> </i> Profile</a>

                </li>

            </ul>
            <div class="navbar-right">
                <ul class="nav navbar-nav navbar-nav-bordered navbar-nav-margin-right">
                    <!-- user -->
                    <li class="dropdown user active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('storage'.\Illuminate\Support\Facades\Auth::user()->image)}}" alt="" class="img-circle"/> {{\Illuminate\Support\Facades\Auth::user()->lastname}} </a>
                    </li>
                    <!-- // END user -->
                </ul>

                <a class="navbar-btn btn btn-primary" href="/logout" >Log out </a>


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
            </div>
            <div class="media-right">
                <span class="label bg-blue-500">STUDENT</span>
            </div>
        </div>
    </div>
</div>
