<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FeedbacksController extends Controller
{
    public function index($id)
    {
        $feedback = \App\Feedback::findOrFail($id);

        $feedback_questions = \App\Feedbacks_question::join('feedbackstofeedbacksquestions','feedbackstofeedbacksquestions.feedbacks_question_id','=','feedbacks_questions.id')
                                                    ->where('feedbackstofeedbacksquestions.feedbacks_id',$id)
                                                    ->get();
        return view('feedbacks', compact('feedback','feedback_questions'));

    }
}
