@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    Here you will get tutorial. <a href="{{ route('admin_quiz_question.create', ['quiz_topic_id' =>  Request::get('quiz_topic_id')]) }}">Create Questions</a>

                </div>
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                        <tr>
                            <th>question</th>
                            <th>Answer</th>
                            <th>Add Option</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($quiz_questions as $question)
                            <tr>
                                <td>{{$question->question_details}}</td>
                                <td>
                                <div>
                                {{$question->question}}
                                </div>
                                @foreach($question->quiz_answers as $quiz_answer)
                                    <span class="btn-sm btn-{{ $quiz_answer->is_correct? 'success' : 'info' }}">{{ $quiz_answer->answer_details }}</span>
                                @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin_quiz_answer.create', [ 'quiz_question_id' => $question->id]) }}" class="btn btn-warning">Add</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection