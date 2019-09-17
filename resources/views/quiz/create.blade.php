@extends('layouts.app')

@section('content')
<v-page inline-template>
    <section class="container">

        <!-- This could avoid vue methods completely and use the class methods I think -->

        <div class="text-center">
            <h1>Create</h1>

            <form method="post" action="/quizzes">
                @csrf
                <textarea name="quiz" style="display:none">@{{quiz}}</textarea>
                <button type="submit">Save Quiz</button>
            </form>

            <form @submit.prevent="addQuestion">
                <hr />
                <h2>Update Quiz</h2>
                <input type="text" v-model="quiz.name" placeholder="Quiz Name..." />
                <input type="text" v-model="quiz.description" placeholder="Quiz Description..." />
                <button type="submit">Submit</button>
            </form>

            <form @submit.prevent="addQuestion">
                <hr />
                <h2>Add Question</h2>
                <input type="text" v-model="forms.question.question" placeholder="Question..." />
                <button type="submit">Submit</button>
            </form>

            <form @submit.prevent="addAnswer" v-if="quiz.questions.length > 0">
                <hr />
                <h2>Add Answer</h2>
                <select v-model="forms.answer.questionIndex">
                    <option v-for="(question, i) in quiz.questions" v-bind:value="i">@{{question.question}}</option>
                <input type="text" v-model="forms.answer.answer" placeholder="Answer..." />
                </select>
                <input type="checkbox" v-model="forms.answer.is_correct">Is this answer correct?<br>

                <button type="submit">Submit</button>
            </form>

            <hr />

            <pre class="text-left">@{{ quiz }}</pre>

        </div>
    </section>
</v-page>
@endsection

@section('javascript')
    <script type="text/javascript">

        class Answer {
            constructor(answer, is_correct) {
                this.answer = answer
                this.is_correct = is_correct ? true : false
            }
            changeAnswer(answer) {
                this.answer = answer
                return this
            }
            changeCorrectness(is_correct) {
                this.is_correct = is_correct
                return this
            }
        }

        class Question {
            constructor(question) {
                this.question = question
                this.answers = []
            }
            updateQuestion(question) {
                this.question = question
                return this
            }
            addAnswer(answer, is_correct) {
                this.answers.push(
                    new Answer(answer, is_correct)
                )
                return this
            }
        }

        class Quiz {
            constructor(name = '', description = '') {
                this.name = name
                this.description = description
                this.questions = []
            }
            updateName(name) {
                this.name = name
                return this
            }
            updateDescription(description) {
                this.description = description
                return this
            }
            addQuestion(question = '', is_correct) {
                this.questions.push(
                    new Question(question)
                );
                return this
            }
        }

        Vue.component('v-page', {
            data() {
                return {
                    quiz: new Quiz(),
                    forms: {
                        quiz: {
                            name: '',
                            description: ''
                        },
                        question: {
                            question: ''
                        },
                        answer: {
                            answer: '',
                            questionIndex: null,
                            is_correct: false
                        }
                    }
                }
            },
            methods: {
                addQuestion() {
                    this.quiz.addQuestion(this.forms.question.question)
                    this.forms.question.question = ''
                },
                addAnswer(questionIndex, answer, is_correct) {
                    this.quiz.questions[this.forms.answer.questionIndex].addAnswer(this.forms.answer.answer, this.forms.answer.is_correct)
                    this.forms.answer.answer = this.forms.answer.is_correct = ''
                },
                submitQuiz() {
                    axios.post(`/quizzes/create`, this.quiz);
                }
            },
            mounted() {

                /* This is only for development */

                this.quiz.updateName("About \"the creator\"")
                this.quiz.updateDescription("Answer questions about the creator of this quiz manager.")

                this.quiz.addQuestion("What is his name?")
                this.quiz.questions[0].addAnswer("Kris", false)
                this.quiz.questions[0].addAnswer("Shea", true)
                this.quiz.questions[0].addAnswer("Danny", false)
                this.quiz.questions[0].addAnswer("Ariel", false)

                this.quiz.addQuestion("How tall is he?")
                this.quiz.questions[1].addAnswer("4ft 6in", false)
                this.quiz.questions[1].addAnswer("5ft 2in", false)
                this.quiz.questions[1].addAnswer("5ft 9in", true)
                this.quiz.questions[1].addAnswer("6ft 1in", false)

                this.quiz.addQuestion("How long does it take to make this project?")
                this.quiz.questions[2].addAnswer("1 Week", true)
                this.quiz.questions[2].addAnswer("2 Weeks", false)
                this.quiz.questions[2].addAnswer("3 Weeks", false)
                this.quiz.questions[2].addAnswer("4 Weeks", false)
            }
        });
    </script>
@endsection
