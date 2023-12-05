<script setup>

import Landing from '../components/Landing.vue'
import PostFeedView from './PostFeedView.vue'
import BackToTop from '../components/BackToTop.vue'

</script>

<template>
  <main>
    <BackToTop />
    <router-link to="/adminusers">Admin User Page</router-link> |
    <router-link to="/user/:id">User Profile Page</router-link>
    <Landing />
    <PostFeedView />
    <RouterView/>
  </main>
</template>
