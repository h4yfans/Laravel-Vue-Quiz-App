<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Answer the questions
                        <span class="pull-right">{{questionIndex}} / {{videoQuestion.length}}</span>
                    </div>
                    <div class="panel-body">
                        <div v-for="(question, index) in questions">
                            <!-- Hide all questions, show only the one with index === to current question index -->
                            <div v-show="index === questionIndex">
                                <h2>{{ question.question }}</h2>
                                <ol>
                                    <!-- Our Question array is a nested array. It's contain video_question_answer -->
                                    <li v-for="choice in question.video_question_answer">
                                        <label>
                                            <!-- The radio button has three new directives -->
                                            <!-- :value sets "value" to "true" if the choice is correct -->
                                            <!-- :name sets "name" to question index to group answers by question -->
                                            <!-- v-model creates binding with userResponses -->
                                            <!-- :value has a if condition, because if 'choice' is true :value will be 'true' other wise :value must be unique for selection.
                                                 We can't select unique radio button with same :value value--->
                                            <input type="radio"
                                                   :value="choice.is_correct == true ? true : choice.answer"
                                                   :name="index"
                                                   v-model="userResponses[index]"
                                                   @click="choices(question.id,choice.id)"> {{choice.answer}}
                                            <strong>{{choice.is_correct}}</strong>
                                        </label>
                                    </li>
                                </ol>
                                <!-- The two navigation buttons -->
                                <!-- Note: prev is hidden on first question -->
                                <div class="pull-right">
                                    <button class="btn btn-success" v-if="questionIndex > 0" @click="prev">
                                        <span class="glyphicon glyphicon-arrow-left"></span>
                                        prev
                                    </button>
                                    <button class="btn btn-success" @click="next(); postUserChoice()">
                                        <span class="glyphicon glyphicon-arrow-right"></span>

                                        next
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div v-show="questionIndex === questions.length">
                            <h2>
                                Quiz finished
                            </h2>
                            <p>
                                Total score: {{ score() }} / {{ questions.length }}
                            </p>
                            <ul class="list-group">
                                <li class="list-group-item"
                                    v-for="result in results"
                                    :class="result.status ? 'list-group-item-success' :'list-group-item-danger'">

                                    <span class="glyphicon"
                                          :class="result.status ? 'glyphicon-ok' : 'glyphicon-remove'"></span>

                                    {{result.message}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['videoid', 'videoQuestion'],

        data(){
            return {
                questions: this.videoQuestion,
                questionIndex: 0,
                userResponses: Array(this.videoQuestion.length).fill(false),
                currentAnswer: 0,
                currentQuestion: 0,
                results: [],
            }
        },

        methods: {
            next(){
                this.questionIndex++;
            },

            prev(){
                this.questionIndex--;
            },

            // if user's choice is 'true', userResponses array contains 'true' value.
            // And this method counts true values.
            score(){
                return this.userResponses.filter((val) => {
                    return val === true;
                }).length;
            },

            // Everytime user click the radio button this method will trigger.
            // This method reference to current question and selected answer
            choices(question, answer){
                this.currentAnswer = answer;
                this.currentQuestion = question;
            },
            postUserChoice(){
                axios.post('user/video/question/answer', {
                    answerID: this.currentAnswer,
                    questionID: this.currentQuestion,
                    videoID: this.videoid,
                }).then((response) => {
                    this.results.push(response.data);
                }).catch((error) => {
                    console.log(error);
                });
            }
        }
    }
</script>


<style>
    strong {
        color: rgba(255, 35, 5, 0.67);
    }
</style>