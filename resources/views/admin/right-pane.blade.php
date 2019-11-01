<div class="col-md-3">

    <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
        <div class="panel-heading panel-collapse-trigger">
            <h4 class="panel-title">My Account</h4>
        </div>
        <div class="panel-body list-group">
            <ul class="list-group list-group-menu">
                <li class="list-group-item active"><a class="link-text-color" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="list-group-item"><a class="link-text-color" href="{{route('admin.courses')}}">My Courses</a></li>
                <li class="list-group-item"><a class="link-text-color" href="{{route('students')}}">Students</a></li>
                <li class="list-group-item"><a class="link-text-color" href="{{route('messages')}}">Messages</a></li>
                <!-- <li class="list-group-item"><a class="link-text-color" href="">Earnings</a></li> -->
                <li class="list-group-item"><a class="link-text-color" href="">Statement</a></li>
                <li class="list-group-item"><a class="link-text-color" href="{{route('profile.update')}}}">Profile</a></li>
                <li class="list-group-item"><a class="link-text-color" href="/logout"><span>Logout</span></a></li>
            </ul>
        </div>
    </div>

    <h4>New Students</h4>
    <div class="slick-basic slick-slider" data-items="1" data-items-lg="1" data-items-md="1" data-items-sm="1" data-items-xs="1">
@foreach($students as $user)
            <div class="item">
                <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                    <div class="panel-body">
                        <div class="media media-clearfix-xs">
                            <div class="media-left">
                                <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                    <span class="img icon-block s90 bg-default"></span>
                                    <span class="overlay overlay-full padding-none icon-block s90 bg-default">
                        <span class="v-center">
                            <img src="{{asset('/storage'.$user->image)}}" />
                        </span>
                        </span>
                                    <a href="" class="overlay overlay-full overlay-hover overlay-bg-white">
                          <span class="v-center">
                            <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-graduation-cap"></i></span>
                          </span>
                                    </a>
                                </div>
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading margin-v-5-3"><a href="">Adam Mcbride</a></h4>
                                <h4 class="media-heading margin-v-5-3"><a href="">{{$user->description}}</a></h4>
                                <!-- <p class="small margin-none">
                                    <span class="fa fa-fw fa-star text-yellow-800"></span>
                                    <span class="fa fa-fw fa-star text-yellow-800"></span>
                                    <span class="fa fa-fw fa-star text-yellow-800"></span>
                                    <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                    <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                </p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</div>
