<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">

<!-- Mirrored from learning.frontendmatter.com/html/website-take-course.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:12 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
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

                <div
                    class="text-subhead-2 text-light">{{"Question ". $getAQuestion->id ."of ".$allQuestions->count() }}</div>
                <div class="panel panel-default paper-shadow" data-z="0.5">
                    <div class="panel-heading">
                        <h4 class="text-headline">{{"Title"}}</h4>
                    </div>
                    <div class="panel-body">
                        <p class="text-body-2">{{$getAQuestion->question}}</p>
                        {{--                        <p>{{"Other Des"}}</p>--}}
                    </div>
                </div>

                <div class="text-subhead-2 text-light">Your Answer</div>
                <div class="panel panel-default paper-shadow" data-z="0.5">
                    <div class="panel-body">
                        @foreach($options as $option)
                            @if(!is_null($option))
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox{{$loop->iteration}}" type="checkbox" name="answer"/>
                                    <label for="checkbox{{$loop->iteration}}">{{$option}}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="panel-footer">
                        <div class="text-right">
                            <button class="btn btn-success"><i class="fa fa-save fa-fw"></i> Save Answer</button>
                            <a href="{{route("question.take", ["question_id"=>$getAQuestion->id + 1,"course_id"=>$getAQuestion->course_id])}}"
                               class="btn btn-primary"><i class="fa fa-chevron-right fa-fw"></i>Next Question</a>

                            @if($allQuestions->last()->id == $getAQuestion->id)
                                <a href="{{route("finish.exam",["course_id" => $getAQuestion->course_id])}}">
                                    <button class="btn btn-info"><i class="fa fa-arrow-circle-right fa-fw"></i>Submit
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <br/>
                <br/>

            </div>
            <div class="col-md-3">

                <div class="s-container">
                    <div class="text-subhead-2 text-light">Time to complete</div>
                    <div class="tk-countdown"></div>
                </div>

                <div class="panel panel-default margin-none">
                    <div class="panel-heading">
                        <h4 class="panel-title">Questions</h4>
                    </div>
                    <div class="panel-body list-group">
                        <ul class="list-group">
                            @foreach($allQuestions as $quiz)
                                <li class="list-group-item">
                                    <div class="media v-middle">
                                        <div class="media-left">
                                            <div
                                                @php $color = ($quiz->hasUserAnswered(auth()->id(),$quiz->id)) ? "green" : "blue"; @endphp
                                                class="icon-block s30 bg-{{$color}}-400 text-white">{{$loop->iteration}}</div>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{route("question.take",["question_id"=>$quiz->id,"course_id"=>$quiz->course_id])}}"
                                               class="link-text-color">{{$quiz->question}}</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <h4 class="text-subhead margin-v-0-5">Legend</h4>
                        <span class="fa fa-fw fa-circle text-green-400"></span> Answered question
                        <br/>
                        <span class="fa fa-fw fa-circle text-blue-400"></span> Selected question
                    </div>
                </div>

            </div>

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

<!-- App Scripts Bundle
  Includes Custom Application JavaScript used for the current theme/module;
  Do not use it simultaneously with the standalone modules below. -->
{{--<script src="{{asset('js/app/app.js')}}"></script>--}}

<!-- App Scripts CORE [html]:
      Includes the custom JavaScript for this theme/module;
      The file has to be loaded in addition to the UI modules above;
      app.js already includes main.js so this should be loaded
      ONLY when using the standalone modules; -->
<!-- <script src="js/app/main.js"></script> -->
<script>
    $('input[type="checkbox"]').on('change', function () {
        $('input[type="checkbox"]').not(this).prop('checked', false);
        let answer = $("input[type=checkbox]:checked").parent().text().trim();
        let url = "{{route("question.submit")}}";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                _token: "{{csrf_token()}}",
                answer: answer,
                question_id: "{{$getAQuestion->id}}",
                course_id: "{{$getAQuestion->course_id}}",
            },
            success: function (data) {
                //TODO::Toast Notification
                console.log('Submitted');
            },
            error: function () {
                console.log('Error while Submitting');
            }
        });
    });
</script>
</body>

<!-- Mirrored from learning.frontendmatter.com/html/website-take-course.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 15:06:14 GMT -->
</html>
