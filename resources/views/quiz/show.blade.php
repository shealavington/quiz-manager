@extends('layouts.app')

@section('content')
<v-page inline-template>
    <v-container>

        <div class="text-center">
            <h1>{{ $quiz->name }}</h1>
            <p>{{ $quiz->description }}</p>
            @if(Auth::user()->role === 1)
            <form action="{{ route('quizzes.show', [$quiz->uuid]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary" type="submit">Delete Quiz</button>
            </form>
            @endif
        </div>

        <hr style="margin: 50px 0;">

        <div class="quiz-region">

            <template v-if="!canContinue">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2 class="question">Quiz Completed!</h2>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" @click="submitQuiz"> Finished </button>
                    </div>
                </div>
            </template>

            <template v-else-if="!currentQuestionIndex">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2 class="question">Begin Quizzing!</h2>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" @click="currentQuestionIndex = Object.keys(questions)[0]"> Start </button>
                    </div>
                </div>
            </template>

            <template v-else>
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2 class="question">@{{ currentQuestion.question }}</h2>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-6" v-for="(answer, i) in currentQuestion.answers" :key="'answer_'+i">
                            <div class="card" :class="{ 'selected': currentAnswerIndex === i }" @click="currentAnswerIndex = i">
                                @{{ answer.answer }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" v-if="currentAnswerIndex !== null" @click="nextQuestion">Next</button>
                    </div>
                </div>
            </template>

        </div>
    </v-container>
</v-page>
@endsection

@section('javascript')
    <script type="text/javascript">
        Vue.component('v-page', {
            data() {
                return {
                    questions: {!! json_encode($questions) !!},
                    currentQuestionIndex: null,
                    currentAnswerIndex: null,
                    answersGiven: {}
                }
            },
            computed: {
                currentQuestion() {
                    return this.questions[this.currentQuestionIndex];
                },
                selectedAnswer() {
                    return this.currentAnswerIndex !== null ? this.questions[this.currentQuestionIndex]['answers'][this.currentAnswerIndex] : null;
                },
                questionCount() {
                    return Object.keys(this.questions).length
                },
                canContinue() {
                    return this.currentQuestionIndex >= this.questionCount ? false : true
                }
            },
            methods: {
                nextQuestion() {
                    this.answersGiven[this.currentQuestion.id] = this.selectedAnswer.id
                    this.currentQuestionIndex++
                    this.currentAnswerIndex = null
                },
                submitQuiz() {
                    console.log("Finished", this.answersGiven)
                }
            }
        });
    </script>
@endsection
