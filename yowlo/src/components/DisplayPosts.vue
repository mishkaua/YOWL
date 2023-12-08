<script setup>

import { ref, computed, onMounted, getCurrentInstance } from 'vue';
import { useRoute } from 'vue-router'
import axios from "axios"
import DisplayComments from './DisplayComments.vue';
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
const $toast = useToast();

const props = defineProps({
    post: Object,
    comments: Object
})

let postLikes = ref(0);
let commentContent = "";

function validContent(commentContent) {
    let validContentPattern = new RegExp("^[a-zA-Z]+(?:[-'\\s][a-zA-Z]+)*$");
    if (validContentPattern.test(commentContent)) {
        return true;
    }
    return false;
}

function addComment(post_id, commentContent) {
     if (validContent()) {
       const comment = { 
            user_id: localStorage.getItem('id_locally_stored'),
            post_id: post_id, 
            content: commentContent,
            created_at: new Date(),
        }
        console.log(comment)
        axios.post('http://localhost:8000/api/comments', comment)
        .then(response => {
        console.log(response.data)
        $toast.success('Comment successfully added')
        })
        .catch(error => {
        console.error("Error adding a comment:", error);
        })
} else {
    console.log("Invalid data format in a comment")
}
}

</script>

<template>
    <a href="${post.link}">{{ post.link }}</a>
    <hr>
    <div class="card-body orange">
        <h5 class="card-title">{{ post.title }}</h5>
        <p>Category {{ post.cat_title }}</p>
        <span><small>Posted on {{ post.created_at }}</small></span> |
        <span><small>By {{ post.name }}</small></span>
        <p class="card-text">{{ post.content }}</p>
        <div>
            <button class="btn" @click="postLikes++"><font-awesome-icon icon="fa-solid fa-thumbs-up"
                    class="fa-xl" /></button>
            {{ postLikes }}
            <button class="btn mr-5" @click="postLikes--"><font-awesome-icon icon="fa-solid fa-thumbs-down"
                    class="fa-xl" /></button>
            <input class="col-sm-10" @keyup.enter="addComment(post.id, commentContent)" v-model="commentContent" type="text shadow border rounded"
                placeholder="Add a comment" />
            <DisplayComments :comments="comments" />
        </div>

    </div>
</template>
