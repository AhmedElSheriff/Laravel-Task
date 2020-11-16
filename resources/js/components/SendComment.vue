<template>
    <div>
        <!-- <button class="btn btn-secondary" v-on:keyup.enter="sendComment" @click="sendComment">Send</button> -->
        <input class="comment-input" type="text" style="width: 100%" v-on:keyup.enter="sendComment"  placeholder="Write a comment">
    </div>
</template>

<script>
    export default {
        props: ['postId'],

        mounted() {
            //console.log('Component mounted.')
        },

        data: function (){
            return {


            }
        },

        methods: {
            sendComment(){


            var comment = $(document.activeElement).val();
            var commentInput = $(document.activeElement);
            if(comment){

            axios.post('/posts/' + this.postId + '/comments/' + comment)
                .then(response => {


            //    var post_container = $("#" + this.postId).append(
            //    "<div class='col-md-12 pt-4 pb-4'> <div class='card'> <div class='card-body'> <div class='d-flex align-items-center'> <div class='pr-3'> <img src='" + response.data.userimage + "'   class='w-100 rounded-circle' style='max-width: 50px;'> </div> <div class='font-weight-bold'> <a href='#'><span class='text-dark'>" + response.data.username + "</span></a> </div> </div> <hr>" + response.data.comment + "</div> </div> </div>"
            //    );

            var post_container = $("#" + this.postId).append(
            "<div role='alert' class='alert alert-info w-100 text-center mt-4'>Your comment is pending and waiting for approval</div>"
                );



              commentInput.blur();
              commentInput.val(function(){
                $(this).val = '';
              });

                })
                .catch(errors =>{
                    if(errors) {
                        window.location = '/login'
                    }
                });

            }



            }
        },
        computed: {

        }
    }
</script>
