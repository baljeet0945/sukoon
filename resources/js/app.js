require('./bootstrap');

import { createApp } from 'vue'
import App from './App.vue'
import router from './router/index'
import jQuery from 'jquery'
import PerfectScrollbar from 'vue3-perfect-scrollbar'

const app = createApp(App)
app.use(router)
//app.use(jQuery)
// app.use(PerfectScrollbar)
//app.use(TouchSpin)
app.mount('#app')

   




