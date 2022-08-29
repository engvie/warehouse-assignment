import 'bulma/css/bulma.css'
import 'vue-toastification/dist/index.css';
import 'dropzone-vue/dist/dropzone-vue.common.css';
import '@/assets/scss/app.scss'

import { createApp } from 'vue'
import { createHead } from '@vueuse/head'
import App from './App.vue'
import router from './router/index'
import Toast from "vue-toastification";
import DropZone from 'dropzone-vue';

const head = createHead()

createApp(App)
    .use(router)
    .use(head)
    .use(Toast)
    .use(DropZone)
    .mount('#app');
