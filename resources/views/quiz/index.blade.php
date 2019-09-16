@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
    </div>
</div>
@endsection
