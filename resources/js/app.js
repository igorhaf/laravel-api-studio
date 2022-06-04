require('./bootstrap');

import { createApp } from 'vue';
import MonacoeditorComponent from './components/MonacoeditorComponent.vue';

let app=createApp({})

app.component('MonacoeditorComponent' , MonacoeditorComponent);

app.mount("#app")
