<template>
    <div>
        <button class="btn btn-secondary" @click="followUser">Send</button>
    </div>
</template>

<script>
    export default {
        props: ['postId'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function (){
            return {


            }
        },

        methods: {
            followUser(){

            var comment = $('#comment-input').val();

            if(comment){

            axios.post('/posts/' + this.postId + '/comments/' + comment)
                .then(response => {

                console.log(response.data.username);


                var post_container = $('#post-container').append(
                "<div class='col-md-12 pt-4 pb-4'> <div class='card'> <div class='card-body'> <div class='d-flex align-items-center'> <img src='https://vistapointe.net/images/portrait-1.jpg' class='w-100 rounded-circle' style='max-width: 50px;'> <div class='font-weight-bold'> <a href='#'><span class='text-dark'>" + response.data.username + "</span></a> </div> </div> <hr>" + response.data.comment + "</div> </div> </div>"
                );





                })
                .catch(errors =>{
                    if(errors) {
                        //window.location = '/login'
                    }
                });

            }



            }
        },
        computed: {

        }
    }
</script>
