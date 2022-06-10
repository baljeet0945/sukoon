require('./bootstrap');

import { createApp } from 'vue'
import App from './App.vue'
import router from './router/index'
import jQuery from 'jquery'
import PerfectScrollbar from 'vue3-perfect-scrollbar'
import Toaster from "@meforma/vue-toaster";

const app = createApp(App)
app.use(router)
//app.use(jQuery)
// app.use(PerfectScrollbar)
//app.use(TouchSpin)
app.mount('#app')

app.use(Toaster);

   




