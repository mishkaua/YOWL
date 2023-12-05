<script setup>
import {ref} from 'vue'
import PostFeedView from './PostFeedView.vue'
import BackToTop from '../components/BackToTop.vue';

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


<!--     <v-container>
        <v-row align="center" justify="center">
            

            <v-card
            class="mx-auto my-2 p-4"
            max-width="80%"
            href="https://github.com/vuetifyjs/vuetify/"
            title="This is a title"
            text="This is content"
            :color="backgroundColor"
            >
            <v-btn
            class="g-1"
            icon="thumbs-up"
            :color="darkColor"
            ></v-btn>
            <v-btn
            class="p-1"
            icon="mdi-thumb-down"
            :color="darkColor"
            ></v-btn>
                <v-btn
                :color="buttonColor">Add comment</v-btn>
            </v-card>
        </v-row>
    </v-container> -->
</template>