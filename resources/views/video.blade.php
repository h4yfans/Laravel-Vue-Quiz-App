@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body text-center">
                        <iframe src="https://player.vimeo.com/video/{{ $video->embed }}?title=0&byline=0&portrait=0"
                                width="640"
                                height="337" frameborder="0" webkitallowfullscreen mozallowfullscreen
                                allowfullscreen></iframe>
                    </div>

                </div>
            </div>
            <div id="video">
                <video-questions
                        :videoid="{{$video->id}}"
                        :video-question="{{$videoQuestion}}"
                        :has-a-record="{{$authUserHasARecordForThisVideoQuestions}}"></video-questions>
            </div>
        </div>
    </div>
@endsection




@section('script')
    <script src="https://player.vimeo.com/api/player.js"></script>


    <script>
        let options = {
            duration: 3,
            percent: 1,
            seconds: 3,
        };


        let iframe = document.querySelector('iframe');
        let player = new Vimeo.Player(iframe, options);


        player.on('ended', function (data) {
            $('#video').fadeIn();
        });
    </script>

@endsection