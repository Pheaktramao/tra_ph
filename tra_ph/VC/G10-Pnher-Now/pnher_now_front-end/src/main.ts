import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import 'bootstrap-icons/font/bootstrap-icons.css';

import App from './App.vue'
import router from './router'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import axios from './plugins/axios'
import 'uno.css'
import { configure } from 'vee-validate'
// import { library } from '@fortawesome/fontawesome-free';
// import { FontAwesomeIcon } from '@fortawesome/fontawesome-free';

// library.add(fas);

const app = createApp(App)

configure({
  validateOnInput: true
})

app.use(createPinia())
app.use(router.router)
app.use(ElementPlus)
app.use(router.simpleAcl)

app.config.globalProperties.$axios = axios

app.mount('#app')
