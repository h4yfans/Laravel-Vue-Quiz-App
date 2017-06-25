<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Answer the questions! <span class="pull-right">{{currentQuestion}}/{{questionsLength}}</span>
                    </div>

                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="panel-body item"
                                 :class="key==0 ? 'active' : '' "
                                 v-for="(question, key ) in questions[0]">
                                <div class="lead">{{question.question}}</div>
                                <div v-for="choice in question.video_question_answer">
                                    <label :for="choice.id">
                                        <input
                                                type="radio"
                                                :name="question.id"
                                                :id="choice.id"
                                                :value="choice.id"
                                                v-model="choiceID"
                                        >
                                        {{choice.answer}}
                                    </label>
                                </div>
                                {{choiceID}}
                                <br>
                            </div>
                            <div class="col-sm-3 col-sm-offset-9">
                                <a class="btn btn-primary"
                                   id="next-button"
                                   href="#myCarousel"
                                   data-slide="next"
                                   v-model="currentQuestion"
                                   @click="checkIfLastQuestion"
                                   v-show="currentQuestion !== questionsLength">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    Next Question
                                </a>
                                <a class="btn btn-success"
                                   id="submit-button"
                                   href="#myCarousel"
                                   v-model="currentQuestion"
                                   v-show="currentQuestion == questionsLength">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    Submit Your Quiz
                                </a>
                            </div>
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
        props: ['videoid'],

        data(){
            return {

                questions: [],
                choiceID: '',
                currentQuestionID: 0,
                currentQuestion: 1,
                questionsLength: 0,
            }
        },

        created(){
            $(document).ready(function () {
                $('.carousel').carousel('pause');
            });
            this.fetchQuestions();
        },

        methods: {
            fetchQuestions(){
                axios.get('/video/questions', {
                    params: {
                        videoID: this.videoid
                    }
                }).then(response => {
                    this.questions.push(response.data);
                    this.questionsLength = response.data.length;
                }).catch(error => {
                    console.log(error)
                })
            },

            checkIfLastQuestion(){
                if (this.questionsLength !== this.currentQuestion) {
                    this.currentQuestion++;
                }
            }
        }
    }
</script>
