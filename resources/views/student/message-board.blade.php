
    @foreach($messages as $message)
        <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                @php
                if($user->id==$message->from ){
                 $slave=$user;
                }
                else{
                $slave=$to;
                }
                @endphp
                <div class="panel-body">
                    <div class="media v-middle">
                        <div class="media-left">
                            <img src="{{asset('/storage'.$slave->image)}}" alt="person" class="media-object img-circle width-50" />
                        </div>
                        <div class="media-body message">
                            <h4 class="text-subhead margin-none"><a href="#">{{$slave->firstname}}</a></h4>
                            <p class="text-caption text-light"><i class="fa fa-clock-o"></i> 2 min ago</p>
                        </div>
                    </div>
                    <p>{{$message->message}}</p>
                </div>
        </div>
    @endforeach
