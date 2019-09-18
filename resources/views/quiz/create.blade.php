@extends('layouts.app')

@section('content')
<v-page inline-template>
<section class="container">
        <div class="jumbotron mb-2">
            <h1 class="display-4">Quiz Settings</h1>
            <p class="lead">Edit the settings of the quiz here.</p>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name:</span>
                </div>
                <input type="text" class="form-control" placeholder="Name..." v-model="quiz.name">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description:</span>
                </div>
                <input type="text" class="form-control" placeholder="Description..." v-model="quiz.description">
            </div>
            <div class="btn-toolbar justify-content-between">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-primary" @click="addQuestion">Add Question</button>
                </div>
                <div class="btn-group">
                    <form class="d-inline" method="post" ref="submitQuiz" action="/quizzes">
                        @csrf
                        <textarea name="quiz" style="display:none">@{{quiz}}</textarea>
                        <button type="button" class="btn btn-success" @click="submitQuiz">Save Quiz</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="quiz-region">
            <div class="row">
                <div class="col-md-12">
                    <div class="card my-3" v-for="(question, qIndex) in quiz.questions">
                        <div class="card-header">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Question:</span>
                                </div>
                                <input type="text" class="form-control" v-model="question.question">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3" v-for="(answer, aIndex) in question.answers">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" v-model="answer.is_correct">
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Answer Here..." v-model="answer.answer">
                                <div class="input-group-append" id="button-addon3">
                                    <button class="btn btn-secondary" type="button" @click="moveAnswerUp(qIndex,aIndex)">
                                        Move Up
                                    </button>
                                    <button class="btn btn-outline-danger" type="button" @click="removeAnswer(qIndex,aIndex)">
                                        Delete Answer
                                    </button>
                                </div>
                            </div>
                            <div class="btn-toolbar justify-content-between">
                                <div class="btn-group mr-2">
                                    <button class="btn btn-primary" type="submit" @click="addAnswer(qIndex)">Add Answer</button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-secondary" type="button" @click="moveQuestionUp(qIndex)">
                                        Move Up
                                    </button>
                                    <button class="btn btn-danger" type="button" @click="removeQuestion(qIndex)">
                                        Delete Question
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <pre class="text-left">@{{ quiz }}</pre> --}}
    </section>
</v-page>
@endsection

@section('javascript')
    <script type="text/javascript">

        function moveArrayItemUp(arr, index) {
            var itemToMove = arr[index]
            var replaceId = index-1
            if(index === 0) {
                arr.push(arr.shift())
            } else {
                arr[index] = arr[replaceId]
                arr[replaceId] = itemToMove
            }
            return arr;
        };

        class Answer {
            constructor(answer = '', is_correct = false) {
                this.answer = answer
                this.is_correct = is_correct ? true : false
            }
        }

        class Question {
            constructor(question = '') {
                this.question = question
                this.answers = []
            }
            moveAnswerUp(index) {
                console.log('moving')
                this.answers = moveArrayItemUp(this.answers, index)
            }
            removeAnswer(index) {
                this.answers.splice(index, 1)
            }
            addAnswer(answer, is_correct) {
                this.answers.push(
                    new Answer(answer, is_correct)
                )
                return this
            }
            isMissingCorrectAnswer() {
                let hasCorrectAnswer = true
                this.answers.forEach(answer => {
                    if(answer.is_correct) { hasCorrectAnswer = false }
                })
                return hasCorrectAnswer
            }
            hasBlankAnswers() {
                let isBlank = false
                this.answers.forEach(answer => {
                    if(answer.answer == '') { isBlank = true }
                })
                return isBlank
            }
            hasEnoughAnswers() {
                return this.answers.length >= 3 && this.answers.length <= 5 ? true : false
            }
            hasDuplicateAnswers() {
                let hasDuplicate = false;
                let answers = []
                this.answers.forEach(answer => {
                    if(answers.includes(answer.answer)) { hasDuplicate = true }
                    answers.push(answer.answer)
                })
                return hasDuplicate
            }
        }

        class Quiz {
            constructor(name = '', description = '') {
                this.name = name
                this.description = description
                this.questions = []
            }
            addQuestion(question) {
                this.questions.push(
                    new Question(question)
                )
                return this
            }
            moveQuestionUp(index) {
                this.questions = moveArrayItemUp(this.questions, index)
            }
            removeQuestion(index) {
                this.questions.splice(index, 1)
            }
            hasEnoughQuestions() {
                return this.questions.length > 0 ? true : false
            }
            hasBlankQuestions() {
                let isBlank = false
                this.questions.forEach(question => {
                    if(question.question == '') { isBlank = true }
                })
                return isBlank
            }
            hasDuplicateQuestions() {
                let hasDuplicate = false;
                let questions = []
                this.questions.forEach(question => {
                    if(questions.includes(question.question)) { hasDuplicate = true }
                    questions.push(question.question)
                })
                return hasDuplicate
            }
        }

        Vue.component('v-page', {
            data() {
                return {
                    quiz: new Quiz(),
                }
            },
            methods: {
                showAlert(message,type = 'primary') {
                    this.$root.$refs.alert.control.visible = true
                    this.$root.$refs.alert.control.message = message
                    this.$root.$refs.alert.control.type = type
                },
                showAlertError(message) {
                    console.log('Error:', message)
                    this.showAlert(message,'danger')
                },
                moveQuestionUp(question_index) {
                    this.quiz.moveQuestionUp(question_index)
                    this.$forceUpdate()
                },
                moveAnswerUp(question_index,answer_index) {
                    this.quiz.questions[question_index].moveAnswerUp(answer_index)
                    this.$forceUpdate()
                },
                addQuestion() {
                    this.quiz.addQuestion()
                },
                removeQuestion(question_index) {
                    this.quiz.removeQuestion(question_index)
                },
                removeAnswer(question_index, answer_index) {
                    this.quiz.questions[question_index].removeAnswer(answer_index)
                },
                addAnswer(questionIndex) {
                    this.quiz.questions[questionIndex].addAnswer()
                },
                submitQuiz() {
                    let canSubmit = true
                    if (!this.quiz.hasEnoughQuestions()) {
                        this.showAlertError('You\'re required to have at least one question.')
                        canSubmit = false
                    } else if (this.quiz.hasBlankQuestions()) {
                        this.showAlertError('One or more of the questions are blank.')
                        canSubmit = false
                    } else if (this.quiz.hasBlankQuestions()) {
                        this.showAlertError('One or more of the questions are blank.')
                        canSubmit = false
                    } else {
                        this.quiz.questions.forEach(question => {
                            if (!question.hasEnoughAnswers()) {
                                this.showAlertError('You must have no less or no more than 3-5 answers for each question.')
                                canSubmit = false
                            } else if (question.hasBlankAnswers()) {
                                this.showAlertError('One or more of the answers are blank.')
                                canSubmit = false
                            } else if (question.hasDuplicateAnswers()) {
                                this.showAlertError('One or more of the answers are a duplicate.')
                                canSubmit = false
                            }else if (question.isMissingCorrectAnswer()) {
                                this.showAlertError('There needs to be at least one correct answer for all questions.')
                                canSubmit = false
                            }
                        })
                    }
                    if(canSubmit) {
                        this.$refs['submitQuiz'].submit()
                    }
                }
            },
            mounted() {

                /* This is only for development */

                this.quiz.name = "About \"the creator\""
                this.quiz.description = "Answer questions about the creator of this quiz manager."

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
        })
    </script>
@endsection
