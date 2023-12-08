<script setup>
//add script to read user table
import { ref, onMounted, getCurrentInstance } from 'vue';
import axios from "axios"
import { useToast } from 'vue-toast-notification';
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
    users.value = response.data.total
  })
  .catch(error=> {
    //handle errors
  })
}*/

onMounted(async () => {
  const res = await fetch('http://localhost:8000/api/users')
  users.value = await res.json();
  console.log(users);
  forceRerender();
})

function updateUser(user) {
  const dataToUpdate = {
    id: user.id,
    name: user.name,
    email: user.email,
  };
  //console.log(dataToUpdate)
  axios.put(`http://localhost:8000/api/users/${user.id}`, dataToUpdate)
    .then(response => {
      console.log(response.data);
      $toast.success('User updated successfully')
    })
    .catch(error => {
      console.error("Error updating user:", error);
    });
}

function deleteUser(user) {
  axios.delete(`http://localhost:8000/api/users/${user.id}`)
  .then(response => {
      console.log(response.data);
      $toast.success('User deleted successfully')
    })
    .catch(error => {
      console.error("Error updating user:", error);
    });

}

function addAdmin(user){
  const dataToUpdate = {
    id: user.id,
    is_admin: 1
  };
  console.log(dataToUpdate)
  axios.put(`http://localhost:8000/api/users/${user.id}`, dataToUpdate)
  .then(response => {
      console.log(response.data);
      $toast.success('User assigned as admin')
    })
    .catch(error => {
      console.error("Error updating user:", error);
    });
}

</script>

<template>
  <div class="light">
        <h1>User Management</h1>


        <div class="input-group m-2" v-for="user in users" :key="user.id">
          <span class="input-group-text">User{{ user.id }} name and email</span>
          <input type="text" aria-label="Username" class="form-control" v-on:keyup.enter="updateUser(user)" v-model="user.name">
          <input type="text" aria-label="Email" class="form-control" v-on:keyup.enter="updateUser(user)" v-model="user.email">
          <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
            data-bs-toggle="dropdown" aria-expanded="false">    
            <span class="visually-hidden">Toggle Dropdown</span>
      </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <router-link to="" 
              class="dropdown-item" 
              @click.prevent="addAdmin(user)"
              v-model="user.id">
              Add as admin
              </router-link>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Reset password</a></li>
            <li>
              <router-link to="" 
                class="dropdown-item" 
                v-on:click="updateUser(user)" 
                v-model="user.id">
                Update a user
              </router-link>
            </li>
            <li>
              <router-link to="" 
              class="dropdown-item" 
              v-on:click="deleteUser(user)" 
              v-model="user.id">
              Delete a user
              </router-link>
            </li>
          </ul>
        </div>

</div>
</template>