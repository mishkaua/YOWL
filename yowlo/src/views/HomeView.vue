<script setup>

import Landing from '../components/Landing.vue'
import PostFeedView from './PostFeedView.vue'
import BackToTop from '../components/BackToTop.vue'
import CategoriesView from './CategoriesView.vue'

</script>

<template>
  <div class="light">
   <main>
    <BackToTop />
    <Landing />
    <PostFeedView />
    <RouterView/>
<CategoriesView />
  </main> 
  </div>
  
</template>
