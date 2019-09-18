@extends('layouts.app')

@section('content')
<form ref="quizSubmit" action="{{ route('quizzes.index') }}" method="POST">
    @csrf
    @method('POST')
    <textarea ref="quizData" name="quiz" class="d-none"></textarea>
</form>
<v-page inline-template>
    <section class="container">
        <v-quiz>
            <slot name="title">Quiz Settings <small>— Creating</small></slot>
        </v-quiz>
    </section>
</v-page>
@endsection

@section('javascript')
    <script type="text/javascript">
        Vue.component('v-page', {
        })
    </script>
@endsection
