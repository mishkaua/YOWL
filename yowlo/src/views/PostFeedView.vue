<script setup>
import { ref, computed, onMounted, getCurrentInstance } from 'vue';
import { useRoute } from 'vue-router'
import axios from "axios"
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import DisplayPosts from '../components/DisplayPosts.vue';

const $toast = useToast();
let posts = ref([]);
let comments = ref([]);
const route = useRoute()


onMounted(async () => {
    getPosts();
    getComments();
    console.log('Route.params.id is ', route.params.id)
})

function getPosts() {
    axios.get('http://localhost:8000/api/posts')
        .then(response => {
            posts.value = response.data
            console.log('Posts:', posts)
        })
        .catch(error => {
            console.error("Error getting posts:", error);
        });
}

/*function getUserPosts() {
    return userPosts = posts.value.filter((post) =>post.user_id == route.params.id)
}

function getUserPosts() {
    axios.get('http://localhost:8000/api/posts/user/{id}')
        .then(response => {
            posts.value = response.data
            console.log('User posts:', posts)
       })
        .catch(error => {
            console.error("Error getting user posts:", error);
        });
}*/

function getComments() {
    axios.get('http://localhost:8000/api/comments')
        .then(response => {
            comments.value = response.data
            console.log('Comments:', comments)
        })
        .catch(error => {
            console.error("Error getting posts:", error);
        });
}
</script>

<template>
    <div class="container light">
        <div class="row">
            <div class="card my-3" >
                <DisplayPosts :post="post" v-for="post in posts" :comments="comments.filter((comment) => comment.post_id == post.id)" :key="post.id" />
            </div>
        </div>

</div></template>