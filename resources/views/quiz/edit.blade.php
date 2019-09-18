@extends('layouts.app')

@section('content')
<form ref="quizSubmit" action="{{ route('quizzes.show', [$quiz->uuid]) }}" method="POST">
    @csrf
    @method('PATCH')
    <textarea ref="quizData" name="quiz" class="d-none">@{{quiz}}</textarea>
</form>
<v-page inline-template>
    <section class="container">
        <v-quiz :quiz-data="quizData">
            <slot name="title">Quiz Settings <small>— Editing</small></slot>
        </v-quiz>
    </section>
</v-page>
@endsection

@section('javascript')
    <script type="text/javascript">
        Vue.component('v-page', {
            data() {
                return {
                    quizData: {!! json_encode($quiz) !!}
                }
            }
        })
    </script>
@endsection
