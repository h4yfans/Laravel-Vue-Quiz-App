<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoQuestion;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::find(1);

        return view('video',compact('video'));
    }

    public function getQuestions(Request $request){
        $videoID = $request['videoID'];

        $video = VideoQuestion::where('video_id', $videoID)->with('videoQuestionAnswer')->get();
        if (!$video){
            return response()->json(['status' => false, 'message' => 'Video not found!']);
        }

        return response()->json($video);
    }
}
