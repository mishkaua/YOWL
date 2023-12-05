<script setup>
import {ref} from 'vue'
//add request to fetch all user posts, need to add .filter to filter posts of a particular user
</script>

<template>

<div class="container light">
    <div class="row">
        <!--add v-for to display a list of posts
        v-for="post in posts" :key="post.id"-->
        <div class="card">
            <a href="#">Link to a user's resource</a>
            <hr>
            <div class="card-body orange">
                <h5 class="card-title">Post title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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