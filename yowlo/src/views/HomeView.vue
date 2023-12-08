<script setup>

import Landing from '../components/Landing.vue'
import PostFeedView from './PostFeedView.vue'
import BackToTop from '../components/BackToTop.vue'
import CategoriesView from './CategoriesView.vue'
import CreatePostView from './CreatePostView.vue'

</script>

<template>
  <div class="light">
   <main>
    <BackToTop />
    <CreatePostView />
    <router-link to="/adminusers">Admin User Page</router-link> |
    <router-link to="/user/:id">User Profile Page</router-link>
    <Landing />
    <PostFeedView />
    <RouterView/>
<CategoriesView />
  </main> 
  </div>
  
</template>
