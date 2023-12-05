<script setup>

import Landing from '../components/Landing.vue'

</script>

<template>
  <main>
    <router-link to="/adminusers">Admin User Page</router-link> |
    <router-link to="/user/:id">User Profile Page</router-link>
    <Landing />
    <RouterView/>
  </main>
</template>
