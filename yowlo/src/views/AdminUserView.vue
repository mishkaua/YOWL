<script setup>
//add script to read user table
import { ref, onMounted, getCurrentInstance } from 'vue';

let users = ref([]);
const componentKey = ref(0);
const forceRerender = () => {
  componentKey.value += 1;
}
onMounted(async () => {
  const res = await fetch ('http://localhost:8000/api/users')
  users.value = await res.json();
  console.log(users);
  forceRerender();
})
</script>

<template>
<h1>User Management</h1>


<div class="input-group m-2" v-for="user in users" :key="user.id">
  <span class="input-group-text">User{{ user.id }} name and email</span>
  <input type="text" aria-label="Username" class="form-control" v-model="user.name">
  <input type="text" aria-label="Email" class="form-control" v-model="user.email">
  <button type="button" class="btn btn-outline-secondary">Reset a password</button>
  <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><a class="dropdown-item" href="#">Add as admin</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Reset password</a></li>
    <li><a class="dropdown-item" href="#">Update a user</a></li>
    <li><a class="dropdown-item" href="#">Delete a user</a></li>
  </ul>
</div>

</template>