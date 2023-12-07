<script setup>
import { RouterLink, RouterView, useRouter } from 'vue-router'
import axios from 'axios';

useRouter();
/* const response = axios.post('/logout') */
const router = useRouter();
const logout = () => {
  localStorage.removeItem('access_token')
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
    <v-system-bar color="#F6E1C3" height=100>
      <v-container>
        <v-row align-center justify="space-between">
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
          <v-col cols="auto">
            <v-btn @click="logout" height="20" min-width="100" color="#E9A178">
              LOGOUT
            </v-btn>
          </v-col>
          <v-spacer></v-spacer>
        </v-row>
      </v-container>
    </v-system-bar>
    <v-navigation-drawer width="244" color="#F6E1C3">
      <!-- <v-sheet color="grey-lighten-5" height="128" width="100%"></v-sheet> -->

      <v-list>
        <v-list-item v-for="n in 5" :key="n" :title="`Cat ${n}`" link></v-list-item>
      </v-list>
    </v-navigation-drawer>

    <!-- <v-app-bar class="px-3" color="blue" flat height="72">
      <v-spacer></v-spacer>

      <v-responsive max-width="156">
        <v-text-field bg-color="#E9A178" density="compact" flat hide-details rounded="pill"
          variant="solo-filled"></v-text-field>
      </v-responsive>
    </v-app-bar> -->

    <v-main>
      <RouterView />
    </v-main>


    <v-navigation-drawer location="right" color="#F6E1C3">
      <v-list>
        <v-list-item v-for="n in 5" :key="n" :title="`Item ${n}`" link></v-list-item>
      </v-list>
    </v-navigation-drawer>
  </v-app>
</template>

<!-- <style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style -->
