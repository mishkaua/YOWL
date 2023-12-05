<script setup>
//add script to read user table
import { ref, onMounted, getCurrentInstance } from 'vue';
import axios from "axios"
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
const $toast = useToast();

let users = ref([]);
const componentKey = ref(0);
 const forceRerender = () => {
  componentKey.value += 1;
}

/*async getUsers(){
  const response = await axios.get('http://localhost:8000/api/users')
  .then(response=> {
    //save the response in users table
    this.users.value = response.data.total
  })
  .catch(error=> {
    //handle errors
  })
}*/

onMounted(async () => {
  const res = await fetch ('http://localhost:8000/api/users')
  users.value = await res.json();
  console.log(users);
  forceRerender();
}),

function updateUser(){ 
  const dataToUpdate = {
                    id: this.user.id,
                    name: this.user.name,
                    email: this.user.email,
                };
                axios.put(`http://localhost:8000/api/users/${this.user.id}`, dataToUpdate)
                .then(response => {
                    console.log(response.data);
                });
                $toast.succes('User updated successfully')
                .catch(error => {
                    console.error("Error updating user:", error);
                });
            }

</script>

<template>
<h1>User Management</h1>


<div class="input-group m-2" v-for="user in users" :key="user.id">
  <span class="input-group-text">User{{ user.id }} name and email</span>
  <input type="text" aria-label="Username" class="form-control" v-model="user.name">
  <input type="text" aria-label="Email" class="form-control" v-model="user.email">
  <router-link to="" class="btn btn-outline-secondary" @click.prevent="resetPassword">Reset a password</router-link>
  <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><a class="dropdown-item" href="#">Add as admin</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Reset password</a></li>
    <li><router-link to="" class="dropdown-item" @click.prevent="updateUser">Update a user</router-link></li>
    <li><a class="dropdown-item" href="#">Delete a user</a></li>
  </ul>
</div>

</template>