
<template>
  <div class="d-flex align-center justify-center" style="height: 100vh">
    <v-sheet width="400" class="mx-auto">
      <v-form @submit.prevent="login">
        <!--  <v-text-field variant="underlined" v-model="form.name" type=name label="name"></v-text-field> -->

        <v-text-field variant="underlined" v-model="email" type=email label="email"></v-text-field>

        <v-text-field variant="underlined" v-model="password" type=password label="password"></v-text-field>
        <!--  <a href="#" class="text-body-2 font-weight-regular">Forgot Password?</a> -->

        <v-btn type="submit" variant="outlined" color="primary" block class="mt-2">Log in</v-btn>

      </v-form>
      <div class="mt-2">
        <p class="text-body-2">Don't have an account? <router-link to="/register">Sign Up</router-link></p>
      </div>
    </v-sheet>
  </div>
</template>
<script>
import axios from 'axios';


export default {
  data() {
    return {

      name: '',
      email: '',
      password: '',

    };
  },

  methods: {
    async login() {
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/login', { email: this.email, password: this.password });
        /* Ici on set les infos que l'on veut garder dans le localStorage,
         en leur donnant une clé différentes'il y en a plusieurs et 
       ne pas oublier de lces clear lors de la session destroy dans le logout ici */
        localStorage.setItem('access_token', response.data.token)
        localStorage.setItem('id_locally_stored', response.data.user.id)
        this.name = response.data.user.name
        /* console.log(response.data) */
        this.$toast.success(`Welcome, ${this.name}!`), {
          timeout: 20000,
          closeable: true,
        }
        this.$router.push('/'); /* link to x page */
        console.log('Logged in successfully');
      } catch (error) {
        console.log('Pas marché pske:', error);
      }
    }
  },
  /* created(){}, */
}
</script>