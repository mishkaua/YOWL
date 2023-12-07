<template>
  <v-sheet max-width="300" class="mx-auto">
    <v-form validate-on="submit lazy" @submit.prevent="submitNewUser">
      <v-text-field v-model="name" label="Enter Name"></v-text-field>
      <v-text-field v-model="email" label="Enter email address"></v-text-field>
      <v-text-field v-model="password" label="Enter Password"></v-text-field>
      <v-text-field v-model="password_confirmation" label="Confirm Password"></v-text-field>

      <v-btn :loading="loading" type="submit" block class="mt-2" text="Submit"></v-btn>
    </v-form>
  </v-sheet>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      loading: false,
    }
  },
  methods: {
    async submitNewUser() {
      try {
        this.loading = true;
        await axios.post('http://127.0.0.1:8000/api/register', {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
        });
        console.log('register ok');
      } catch (error) {
        console.log('error not registered', error);
      }
      this.loading = false;
    }
  },
}
</script>