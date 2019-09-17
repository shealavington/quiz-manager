@extends('layouts.app')

@section('content')
<v-page inline-template>
    <v-container>
        <div class="jumbotron">
            <h1 class="display-4" contenteditable="true">{{ $quiz->name }}</h1>
            <p class="lead">{{ $quiz->description }}</p>
            @if(Auth::user()->role === 1)
            <div class="d-print-none">
                <hr class="my-4">
                <p>You're an unrestricted user, you can perform the following actions for this quiz:</p>
                <form action="{{ route('quizzes.show', [$quiz->uuid]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-lg" type="submit" role="button">Delete Quiz</button>
                    <a class="btn btn-primary btn-lg" href="{{ route('quizzes.edit', [$quiz->uuid]) }}">Edit Quiz</a>
                </form>
            </div>
            @endif
        </div>
        <div id="quiz-region">
            <div class="row text-center">
                <div class="col-md-12 text-left">
                    @foreach ($questions as $question)
                      <div class="card my-5">
                        <div class="card-body">
                            <h5 class="card-title">{{ $question['question'] }}</h5>
                            <p class="card-text">There are {{ count($question['answers']) }} answers to choose from:</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($question['answers'] as $answer)
                                <li class="list-group-item">{{ $answer['answer'] }}</li>
                            @endforeach
                        </ul>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
    </v-container>
</v-page>
@endsection

@section('javascript')
    <script type="text/javascript">
        Vue.component('v-page', {

        });
    </script>
@endsection
