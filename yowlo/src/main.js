import './assets/main.css'
import './axios'
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import 'vuetify/styles'
import './axios'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

import './assets/sass/style.scss'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap'

import ToastPlugin from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-bootstrap.css'

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faThumbsUp } from '@fortawesome/free-solid-svg-icons'
import { faThumbsDown } from '@fortawesome/free-solid-svg-icons'
import { faArrowUp } from '@fortawesome/free-solid-svg-icons'


const app = createApp(App)
const vuetify = createVuetify({
    components,
    directives,
  })

app.use(router)
app.use(vuetify)
app.use(ToastPlugin)

.component('font-awesome-icon', FontAwesomeIcon)
library.add(faArrowUp)


app.mount('#app')
