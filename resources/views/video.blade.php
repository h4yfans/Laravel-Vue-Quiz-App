@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <iframe src="https://player.vimeo.com/video/189789787?title=0&byline=0&portrait=0" width="640"
                                height="337" frameborder="0" webkitallowfullscreen mozallowfullscreen
                                allowfullscreen></iframe>
                    </div>
                    <video-question :videoid="{{$video->id}}"></video-question>
                </div>
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
        let player = new Vimeo.Player(iframe,options);

        player.play();

       /* player.on('ended', function (data) {
            player.getCurrentTime().then((currentTime) => {
                if (data.duration === currentTime) {
                    console.log('bitti')
                }

                console.log(data)
                console.log(currentTime)

            }).catch((error) => {
                console.log(error)
            })
        });*/

       /* player.on('seeked', function (data) {
           console.log(data)
        });

        player.getDuration().then(function(duration) {
            console.log(duration)
            // duration = the duration of the video in seconds
        }).catch(function(error) {
            // an error occurred
        });*/


        /* player.getEnded().then(function(ended) {
         // ended = whether or not the video has ended
         console.log('test');
         }).catch(function(error) {
         // an error occurred
         });


         player.getDuration().then(function(duration) {
         // duration = the duration of the video in seconds
         console.log(duration)
         }).catch(function(error) {
         // an error occurred
         });




         player.on('currentTime ', function(data) {

         console.log(data)
         });

         player.on('finish', function(data) {
         console.log('finish?')

         });



         */
    </script>

@endsection