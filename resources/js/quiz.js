
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

export default class Quiz {
    constructor(quiz = {}) {
        this.id = quiz.id ? quiz.id : temporaryId()
        this.uuid = quiz.uuid ? quiz.uuid : null
        this.name = quiz.name ? quiz.name : null
        this.description = quiz.description ? quiz.description : null
        this.user_id = quiz.user_id ? quiz.user_id : null
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

    // Currently not working

    // moveQuestionUp(index) {
    //     this.questions = moveArrayItemUp(this.questions, index)
    // }

    // moveAnswerUp(index) {
    //     this.answers = moveArrayItemUp(this.answers, index)
    // }

    // Checks & Validation

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
