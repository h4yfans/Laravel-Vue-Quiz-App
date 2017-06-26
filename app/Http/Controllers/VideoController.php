<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoQuestion;
use App\Models\VideoQuestionAnswer;
use App\Models\VideoQuestionResults;
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
        $videoID       = mt_rand(1, 3);
        $video         = Video::find($videoID);
        $videoQuestion = VideoQuestion::where('video_id', $videoID)->with('videoQuestionAnswer')->get();

        return view('video', compact('video', 'videoQuestion'));
    }

    public function getQuestions(Request $request)
    {
        $videoID = $request['videoID'];

        $video = VideoQuestion::where('video_id', $videoID)->with('videoQuestionAnswer')->get();
        if ( ! $video) {
            return response()->json(['status' => false, 'message' => 'Video not found!']);
        }

        return response()->json($video);
    }


    public function postUserAnswer(Request $request)
    {
        $questionID = $request['questionID']; // 1
        $answerID   = $request['answerID']; // 2
        $videoID    = $request['videoID'];
        $authUser   = auth()->user();

        $userQuestionAnswer = VideoQuestionResults::updateOrCreate(
            ['user_id' => $authUser->id, 'video_id' => $videoID, 'question_id' => $questionID],
            ['answer_id' => $answerID]);

        $questionAnswer = $userQuestionAnswer->answer();

        if ((int)$questionAnswer->first()->is_correct === 1) {
            return response()->json(['status'  => true,
                                     'message' => $userQuestionAnswer->question()->first()->question
            ]);
        }

        return response()->json(['status' => false, 'message' => $userQuestionAnswer->question()->first()->question]);
    }
}




