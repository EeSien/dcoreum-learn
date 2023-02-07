@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit New Question</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($question, ['method' => 'PATCH','route' => ['questions.update', $question->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Questions :</strong>
                {!! Form::text('question', null, array('placeholder' => 'Question','class' => 'form-control')) !!}
            </div>
        </div>
        @for($i = 1; $i < 5; $i++)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Selection {{$i}}:</strong>
                    <label>
                        <input type="radio" name="answer_select" id="answer_select" value="{{$i}}"
                               onchange="selectAnswer()" {{$question->selection[$i-1] == $question->answer ? 'checked' : ''}}/>
                        Answer
                    </label>
                    <input placeholder="Selection {{$i}}" class="form-control" name="selection{{$i}}"
                           id="selection{{$i}}" type="text" value="{{$question->selection[$i-1]}}">
                </div>
            </div>
        @endfor

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Answer:</strong>
                {!! Form::text('answer', null, array('id'=>'answer', 'placeholder' => 'Answer', 'class' => 'form-control', 'readonly')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('scripts')
    <script>
        function selectAnswer() {
            var answer_selection = document.querySelector('input[name="answer_select"]:checked').value;
            var answer_field = document.getElementById('answer');
            var answer_text = document.getElementById('selection' + answer_selection).value;
            if (answer_text) {
                answer_field.value = answer_text;
            } else {
                document.querySelector('input[name="answer_select"]:checked').checked = false;
            }
        }
    </script>
@endsection
