<script setup>
import { ref, onMounted, getCurrentInstance } from 'vue';
import axios from "axios"
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();
let posts = ref([]);

onMounted(() => {
    getPosts();
})

//add request to fetch all user posts into the main feed
function getPosts(){
  axios.get('http://localhost:8000/api/posts')
  .then(response=> {
    posts.value = response.data
})
  .catch(error=> {
    console.error("Error getting posts:", error);
    });
}

</script>

<template>

<div class="container light">
    <div class="row">
        <!--add v-for to display a list of posts-->
        <div class="card my-3" v-for="post in posts" :key="post.id">
            <a href="#">Link to a user's resource</a>
            <hr>
            <div class="card-body orange">
                <h5 class="card-title">{{ post.title }}</h5>
                <p class="card-text">{{ post.content }}</p>
                    <div>
                        <button class="btn"><font-awesome-icon icon="fa-solid fa-thumbs-up" class="fa-xl"/></button>
                        <!--placeholder for reaction counter-->
                        {{ 25 }}
                        <button class="btn mr-5"><font-awesome-icon icon="fa-solid fa-thumbs-down" class="fa-xl" /></button>
                        <input class="col-sm-10" type="text shadow border rounded" placeholder="Add a comment"/>
                        <!--v-for to display existing comments, v-model="post.content"-->
                    </div>
                
            </div>
        </div>
    </div>

</div>
</template>