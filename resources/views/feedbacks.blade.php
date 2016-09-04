@extends('layout')

@section('content')

<h1>{{$feedback->title}}</h1>
@foreach($feedback_questions as $feedback_question)
    <p>{{ $feedback_question->title }}</p>
    @if($feedback_question->type == "Text Field")
        <input type="text">
    @endif
    @if($feedback_question->type == "Text Area")
        <textarea></textarea>
    @endif
    @if($feedback_question->type == "Stars")
        <h1>Stars</h1>
            <div class="rating-container rating-xs rating-animate">
                <input type="text" class="rating hide"
                        value="3" data-size="xs" title="">
            </div>
    @endif
    @if($feedback_question->type == "Checkbox")
        <input type="checkbox">
    @endif
    @if($feedback_question->type == "Radiobutton")
        <input type="radio">
    @endif
@endforeach
@stop