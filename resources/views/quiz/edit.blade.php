@extends('layouts.app')

@section('content')
<v-page inline-template>
    <v-container>
        <div class="text-center">
            <h1>Edit</h1>
        </div>
    </v-container>
</v-page>
@endsection

@section('javascript')
    <script type="text/javascript">
        Vue.component('v-page', {
            data() {
                return {
                    quizForm: {
                        name: '',
                        description: '',
                    },
                    questions: [],
                }
            },
            methods: {
                addQuestion(question) {
                    this.questions.push(
                        new Question(question)
                    )
                },
                addAnswer(questionId, answer, is_correct) {
                    this.questions[questionId].addAnswer(answer, is_correct)
                }
            }
        });
    </script>
@endsection
