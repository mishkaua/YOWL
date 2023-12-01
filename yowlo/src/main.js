import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

import './assets/sass/style.scss'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap'

import ToastPlugin from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-bootstrap.css'

const app = createApp(App)
const vuetify = createVuetify({
    components,
    directives,
  })

app.use(router)
app.use(vuetify)
app.use(ToastPlugin)

app.mount('#app')
