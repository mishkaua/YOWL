<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'; 

const user = ref();
let isLoggedIn = ref(false) 
onMounted(async () => {
  const data = await axios.get('http://127.0.0.1:8000/api/user'); /* ajouter le header headers: , */
  user.value = data.data; 
  console.log(user.value);
  isLoggedIn.value = true;
})
</script>

<template>
  <div v-if="user">
     <span><h6> {{ user.name }} </h6></span>
    <span ><h6>online</h6></span>
    <div v-if="isLoggedIn" style="width: 10px; height: 10px; border-radius: 50%; background-color: green;">
    
      
  </div>
  </div>
</template>
