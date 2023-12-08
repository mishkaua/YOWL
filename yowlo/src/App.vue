<script setup>
//import CategoriesView from './views/CategoriesView.vue'
import { RouterLink, RouterView, useRouter } from 'vue-router'
import axios from 'axios';

useRouter();
/* const response = axios.post('/logout') */
const router = useRouter();
let isLoggedIn = localStorage.getItem('access_token') !== null;
const logout = () => {
  localStorage.removeItem('access_token')
  localStorage.removeItem('id_locally_stored')
  localStorage.removeItem('name_locally_stored')
  localStorage.removeItem('account_creation_date_locally_stored')
  axios.post('/logout')
  .then(response => {
    console.log('ma requête', response)
    router.push({path:'/'})
  })
  .catch (error => {
    console.log ('response', error)
  })
}
</script>

<template>
  <v-app id="inspire">
    <v-system-bar height=100>
      <v-container class="light">
        <v-row align-center justify="space-between" max-width="150">
          <v-spacer></v-spacer>
          <v-col>
            <router-link to="/">
              <v-img src="/src/assets/yowlito.png" alt="logo" style="max-height: 50px;"></v-img>
            </router-link>
          </v-col>
          <v-col cols="auto">
            <v-text-field bg-color="#E9A178" density="compact" hide-details rounded="pill" variant="solo-filled"
              placeholder="Search" style="min-width: 300px;"></v-text-field>
          </v-col>
          <v-spacer></v-spacer>
          <router-link to="/login">
            <v-col cols="auto">
              <v-btn height="20" min-width="100" color="#E9A178">
                LOGIN
              </v-btn>
            </v-col>
            <v-spacer></v-spacer>
          </router-link>
          <v-col cols="auto">
            <router-link to="/register">
              <v-btn height="20" min-width="100" color="#E9A178">
                REGISTER
              </v-btn>
            </router-link>
          </v-col>
          <v-col cols="auto" v-if="isLoggedIn">
            <v-btn @click="logout" height="20" min-width="100" color="#E9A178">
              LOGOUT
            </v-btn>
          </v-col>
          <v-col cols="auto">
            <router-link to="/user/:userId">
              <v-btn height="20" min-width="100" color="#E9A178">
                My Profile
              </v-btn>
            </router-link>
          </v-col>
          <v-spacer></v-spacer>
        </v-row>
      </v-container>
    </v-system-bar>

    <v-main>
      <RouterView />
    </v-main>
  </v-app>
</template>