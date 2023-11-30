<script setup>
import { ref, onMounted, getCurrentInstance } from 'vue';

onMounted(async () => {
  const res = await fetch ('http://localhost:8000/api/users')
  const users = await res.json();
  console.log(users);
  /*postits = data.notes;
  forceRerender();*/
})
</script>

<template>
  <main>
    <router-link to="/adminusers">Admin User Page</router-link>
  </main>
</template>
