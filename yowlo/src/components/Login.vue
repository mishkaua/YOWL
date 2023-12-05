<!-- <template>
    <v-sheet width="300" class="mx-auto">
      <v-form fast-fail @submit.prevent>
        <v-text-field
          v-model="Name"
          label="User Name"
          :rules="userNameRules"
        ></v-text-field>
  
        <v-text-field
          v-model="password"
          label="Password"
          :rules="passswordRules"
        ></v-text-field>
  
        <v-btn type="submit" block class="mt-2">Submit</v-btn>
      </v-form>
    </v-sheet>
  </template> -->

  
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
  data () {
    return {
      
       /*  name: '', */ 
        email: '', 
        password: '', 
      
    };
  },

methods: {
  async login() {
    try {
      await axios.post('http://127.0.0.1:8000/api/login', {email: this.email, password: this.password});
      this.$router.push('/login'); /* link to x page */
      console.log('Logged in successfully');
    } catch (error) {
      console.log('Pas marché pske:', error);
    }
  }
},
/* created(){}, */
}
</script>

<!-- <script>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router'


const router = useRouter();
const form = ref( {
email: '', 
password: '' ,
})
const myLogin = async ()=> {
    await axios.post('/login', {
        email: form.value.email,
        password: form.value.password
    });
    router.push('/');
};

  export default {
    data: () => ({
      Name: '',
      NameRules: [
        value => {
          if (value?.length > 3) return true

          return 'You must enter a valid username'
        },
      ],
      password: '',
      passswordRules: [
        value => {
          if (value?.length > 5) return true

          return 'You must enter a valid password'
        },
      ],
    }),
  }
</script> -->