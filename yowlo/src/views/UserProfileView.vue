<script setup>
import {ref, onMounted } from 'vue'
import PostFeedView from './PostFeedView.vue'
import BackToTop from '../components/BackToTop.vue';
import axios from "axios"
import { useToast } from 'vue-toast-notification';

let posts = ref([]);
onMounted(async () => {
  getUserPosts();
})

function getUserPosts() {
    axios.get('http://localhost:8000/api/posts/user/{id}')
        .then(response => {
            posts.value = response.data
            console.log('User posts:', posts)
       })
        .catch(error => {
            console.error("Error getting user posts:", error);
        });
}
</script>

<template>
    <BackToTop />
    <h1>User Profile Page</h1>

<!--a list of user posts-->
    <PostFeedView />


<section>
  <div class="container py-2 h-100 light">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-md-9 col-lg-7 col-xl-5 orange shadow rounded">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body shadow rounded">
            <div class="d-flex text-black">
              <div class="flex-shrink-0">
                <!--add link to user avatar-->
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                  alt="User avatar" class="img-fluid"
                  style="width: 180px; border-radius: 10px;">
              </div>
              <div class="flex-grow-1 ms-3">
                <!--username-->
                <h5 class="mb-1">Danny McLoan</h5>
                <!--add user creation date-->
                <p class="mb-2 pb-1">YOWLer since {{  }} </p>
                <div class="d-flex justify-content-start rounded-3 p-2 mb-2">
                  <div>
                    <!--add post counter-->
                    <p class="small text-muted mb-1">{{  }} Posts</p>
                    <p class="mb-0">41</p>
                  </div>
                  <div class="px-3">
                    <!--add comment counter-->
                    <p class="small text-muted mb-1">{{  }} Comments</p>
                    <p class="mb-0">976</p>
                  </div>
                </div>
                <div class="d-flex pt-1 dark rounded">
                  <button type="button" class="btn flex-grow-1" style="color: white;">FOLLOW</button>
                </div>
              </div>
            </div>
          </div>
        </div>
            <ul id="profileOptions">
                <li class="dark rounded my-2">CHANGE AVATAR</li>
                <li class="dark rounded my-2">CHANGE PASSWORD</li>
                <li class="dark rounded my-2">CREATE A POST</li>
                <li class="dark rounded my-2">MANAGE MY POSTS</li>
            </ul>
      </div>
    </div>
  </div>
</section>


</template>