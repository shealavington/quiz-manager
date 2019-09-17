@extends('layouts.app')

@section('content')
<v-page inline-template>
    <section class="container">
        <div class="jumbotron mb-2">
            <h1 class="display-4">{{ $quiz->name }}</h1>
            <p class="lead mb-0">{{ $quiz->description }}</p>
            @if(Auth::user()->canDeleteQuiz() || Auth::user()->canEditQuiz())
            <div class="d-print-none">
                <hr class="my-4">
                <p>You can perform the following actions for this quiz:</p>
                @if(Auth::user()->canDeleteQuiz())
                    <form action="{{ route('quizzes.show', [$quiz->uuid]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-lg" type="submit" role="button">Delete Quiz</button>
                    </form>
                @endif
                @if(Auth::user()->canEditQuiz())
                    <a class="btn btn-primary btn-lg" href="{{ route('quizzes.edit', [$quiz->uuid]) }}">Edit Quiz</a>
                @endif
            </div>
            @endif
        </div>
        <div id="quiz-region">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($questions as $question)
                      <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title mb-0">{{ $question['question'] }}</h5>
                            @if(count($question['answers']) > 0)
                                <p class="card-text text-muted">There are {{ count($question['answers']) }} answers to choose from:</p>
                            @endif
                        </div>
                        <ol class="list-group list-group-flush">
                            <?php $x = 'A'; ?>
                            @foreach ($question['answers'] as $answer)
                                <li class="list-group-item">{{$x}}. {{ $answer['answer'] }}</li>
                                <?php $x++; ?>
                            @endforeach
                        </ol>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</v-page>
@endsection

@section('javascript')
    <script type="text/javascript">
        Vue.component('v-page', {

        });
    </script>
@endsection
