@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron mb-2">
        <div class="d-flex justify-content-center align-items-center">
            <h1 class="display-4 mr-auto">Quiz List</h1>
            @if(Auth::user()->canCreateQuiz())
                <div class="d-print-none">
                    <a class="btn btn-primary btn-lg" href="{{ route('quizzes.create') }}">Create Quiz</a>
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        @if(count($quizzes) > 0)
            @foreach ($quizzes as $quiz)
                <div class="col-md-6">
                    <v-example-component>
                        <template v-slot:title>{{ $quiz->name }}</template>
                        {{ $quiz->description }}
                        <br>
                        <a href="/quizzes/{{ $quiz->uuid }}">View Quiz</a>
                    </v-example-component>
                </div>
            @endforeach
        @else
        <p class="lead my-5">
            There don't seem to be any quizzes available right now, please check again later.
        </p>
        @endif

    </div>
</div>
@endsection
