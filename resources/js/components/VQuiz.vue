<template>
    <div>
        <div class="jumbotron mb-2">
            <h1 class="display-4">
                <slot name="header">Quiz Settings</slot>
            </h1>
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
                <input name="description" type="text" class="form-control" placeholder="Description..." v-model="quiz.description">
            </div>
            <div class="btn-toolbar justify-content-between">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-primary" @click="quiz.questionAdd({})">Add Question</button>
                </div>
                <div class="btn-group">
                    <button name="save" type="button" class="btn btn-success" @click="submitQuiz">Save Quiz</button>
                </div>
            </div>
        </div>
        <div id="quiz-region">
            <div class="row">
                <div class="col-md-12">
                    <div id="questions" class="card my-3" v-for="(question, qIndex) in quiz.questions" :key="qIndex+question.question">
                        <div class="card-header">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Question:</span>
                                </div>
                                <input type="text" class="form-control" v-model="question.question">
                                <div class="input-group-append" id="button-addon3">
                                    <button class="btn btn-primary" type="button" v-if="quiz.questions.length > 1" @click="quiz.questionMoveUp(question.id);$forceUpdate()">
                                        Move Up
                                    </button>
                                    <button class="btn btn-outline-primary" type="button" @click="quiz.questionRemove(question.id)">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="answers" class="input-group mb-3" v-for="(answer, aIndex) in quiz.getQuestionAnswers(question.id)" :key="aIndex">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" v-model="answer.is_correct">
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Answer Here..." v-model="answer.answer">
                                <div class="input-group-append" id="button-addon3">
                                    <button class="btn btn-outline-secondary" type="button" @click="quiz.answerRemove(answer.id)">
                                            &times;
                                    </button>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit" @click="quiz.answerAdd({question_id:question.id})">+ Add Answer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Quiz from '../quiz'
export default {
    props: {
        quizData: {
            required: false
        }
    },
    data() {
        return {
            quiz: this.quizData ? new Quiz(this.quizData) : new Quiz(),
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
            if (this.quiz.isNameBlank()) {
                this.showAlertError('The name of the quiz can\'t be blank')
                canSubmit = false
            } else if (!this.quiz.hasEnoughQuestions()) {
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
                this.$root.$refs['quizData'].value = JSON.stringify(this.quiz);
                this.$root.$refs['quizSubmit'].submit()
            }
        }
    }
}
</script>

<style>

</style>
