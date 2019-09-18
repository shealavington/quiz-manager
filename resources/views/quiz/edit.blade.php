@extends('layouts.app')

@section('content')
<v-page inline-template>
<section class="container">
        <div class="jumbotron mb-2">
            <h1 class="display-4">Quiz Settings <small>— Editing</small></h1>
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
                    <button type="button" class="btn btn-primary" @click="quiz.questionAdd({})">Add Question</button>
                </div>
                <div class="btn-group">
                    <form class="d-inline" ref="submitQuiz" action="{{ route('quizzes.show', [$quiz->uuid]) }}" method="POST">
                        @csrf
                        @method('PATCH')
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
                            <div class="input-group mb-3" v-for="(answer, aIndex) in quiz.getQuestionAnswers(question.id)">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" v-model="answer.is_correct">
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Answer Here..." v-model="answer.answer">
                                <div class="input-group-append" id="button-addon3">
                                    {{-- <button class="btn btn-secondary" type="button" @click="moveAnswerUp(qIndex,aIndex)">
                                        Move Up
                                    </button> --}}
                                    <button class="btn btn-outline-secondary" type="button" @click="quiz.answerRemove(answer.id)">
                                         &times;
                                    </button>
                                </div>
                            </div>
                            <div class="btn-toolbar justify-content-between">
                                <div class="btn-group mr-2">
                                    <button class="btn btn-primary" type="submit" @click="quiz.answerAdd({question_id:question.id})">+ Add Answer</button>
                                </div>
                                <div class="btn-group">
                                    {{-- <button class="btn btn-secondary" type="button" @click="moveQuestionUp(qIndex)">
                                        Move Up
                                    </button> --}}
                                    <button class="btn btn-danger" type="button" @click="quiz.questionRemove(qIndex)">
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

        function uuidv4() {
            return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
                (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
            );
        }

        function temporaryId() {
            return '_' + uuidv4();
        }

        class Answer {
            constructor(answer = {}) {
                this.id = answer.id ? answer.id : temporaryId()
                this.answer = answer.answer ? answer.answer : ''
                this.is_correct = answer.is_correct ? answer.is_correct : false
                this.sort = answer.sort ? answer.sort : 0
                this.question_id = answer.question_id ? answer.question_id : null
            }
        }

        class Question {
            constructor(question = {}) {
                this.id = question.id ? question.id : temporaryId()
                this.question = question.question ? question.question : ''
                this.sort = question.sort ? question.sort : 0
                this.quiz_id = question.quiz_id ? question.quiz_id : null
            }
        }

        class Checks {
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

            hasEnoughAnswers() {
                let hasEnough = true
                this.questions.forEach(question => {
                    let answers = this.getQuestionAnswers(question.id)
                    if(answers.length < 3 || answers.length > 5) {
                        console.log('aa')
                        hasEnough = false
                    }
                })
                return hasEnough
            }
            hasBlankAnswers() {
                let isBlank = false
                this.answers.forEach(answer => {
                    if(answer.answer == '') { isBlank = true }
                })
                return isBlank
            }
            hasDuplicateAnswers() {
                let hasDuplicate = false
                this.questions.forEach(question => {
                    let answers = this.getQuestionAnswers(question.id)
                    let answerList = []
                    answers.forEach(answer => {
                        if(answerList.includes(answer.answer)) { hasDuplicate = true }
                        answerList.push(answer.answer)
                    })
                })
                return hasDuplicate
            }
            isMissingCorrectAnswers() {
                let isMissingCorrectAnswer = false
                this.questions.forEach(question => {
                    let answers = this.getQuestionAnswers(question.id)
                    let correctAnswerFound = false
                    answers.forEach(answer => {
                        if(answer.is_correct) { correctAnswerFound = true }
                    })
                    if(!correctAnswerFound) {
                        isMissingCorrectAnswer = true
                    }
                })
                return isMissingCorrectAnswer
            }
        }
        class Quiz extends Checks {
            constructor(quiz = {}) {
                super();
                this.id = quiz ? quiz.id : temporaryId()
                this.uuid = quiz ? quiz.uuid : null
                this.name = quiz ? quiz.name : null
                this.description = quiz ? quiz.description : null
                this.user_id = quiz ? quiz.user_id : null
                this.questions = []
                this.answers = []
                if(quiz.questions) {
                    quiz.questions.forEach(question => {
                        this.questionAdd(question)
                    })
                }
                if(quiz.answers) {
                    quiz.answers.forEach(question => {
                        this.answerAdd(question)
                    })
                }
            }
            answerAdd(answer) {
                if(answer.sort === undefined && answer.question_id) {
                    let answers = this.answers.filter(a => {
                        return a.question_id === answer.question_id
                    })
                    answer.sort = answers.length
                }
                this.answers.push(new Answer(answer))
                return this
            }
            questionAdd(question) {
                this.questions.push(new Question(question))
                return this
            }
            answerRemove(answerId) {
                this.answers.splice(this.answers.findIndex(function(answer){
                    return answer.id === answerId;
                }), 1);
            }
            questionRemove(questionId) {
                if(!confirm('Are you sure? This will remove all the answers too.')) {
                    return
                }
                this.answers = this.getQuestionAnswers(questionId)
                this.questions.splice(this.questions.findIndex(function(answer){
                    return answer.id === questionId;
                }), 1);
            }

            getQuestionAnswers(questionId) {
                let answers = this.answers.filter(answer => {
                    return answer.question_id === questionId
                })
                answers.sort((a, b) => {
                    return a.sort - b.sort;
                });
                return answers;
            }

            moveQuestionUp(index) {
                this.questions = moveArrayItemUp(this.questions, index)
            }

            moveAnswerUp(index) {
                console.log('moving')
                this.answers = moveArrayItemUp(this.answers, index)
            }


        }

        Vue.component('v-page', {
            data() {
                return {
                    quiz: new Quiz({!! json_encode($quiz) !!}),
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
                submitQuiz() {
                    let canSubmit = true
                    if (!this.quiz.hasEnoughQuestions()) {
                        this.showAlertError('You\'re required to have at least one question.')
                        canSubmit = false
                    } else if (this.quiz.hasBlankQuestions()) {
                        this.showAlertError('One or more of the questions are blank.')
                        canSubmit = false
                    } else if (this.quiz.hasDuplicateQuestions()) {
                        this.showAlertError('One or more of the questions are a duplicate.')
                        canSubmit = false
                    } else if (!this.quiz.hasEnoughAnswers()) {
                        this.showAlertError('You must have no less or no more than 3-5 answers for each this.quiz.')
                        canSubmit = false
                    } else if (this.quiz.hasBlankAnswers()) {
                        this.showAlertError('One or more of the answers are blank.')
                        canSubmit = false
                    } else if (this.quiz.hasDuplicateAnswers()) {
                        this.showAlertError('One or more of the answers are a duplicate.')
                        canSubmit = false
                    } else if (this.quiz.isMissingCorrectAnswers()) {
                        this.showAlertError('There needs to be at least one correct answer for all questions.')
                        canSubmit = false
                    }
                    if(canSubmit) {
                        this.$refs['submitQuiz'].submit()
                    }
                }
            }
        })
    </script>
@endsection
