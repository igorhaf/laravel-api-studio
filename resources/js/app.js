require('./bootstrap');

import { createApp } from 'vue';
import MonacoeditorComponent from './components/MonacoeditorComponent.vue';
import TerminalComponent from './components/TerminalComponent.vue';

let app=createApp({})

app.component('MonacoeditorComponent' , MonacoeditorComponent);
app.component('TerminalComponent' , TerminalComponent);

app.mount("#app")
