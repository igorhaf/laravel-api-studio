require('./bootstrap');


import { createApp } from 'vue';
import MonacoeditorComponent from './components/MonacoeditorComponent.vue';
import TerminalComponent from './components/TerminalComponent.vue';
import FileexplorerComponent from './components/FileexplorerComponent.vue';
import ComponentsexplorerComponent from './components/ComponentsexplorerComponent.vue';

let app=createApp({})

app.component('MonacoeditorComponent' , MonacoeditorComponent);
app.component('TerminalComponent' , TerminalComponent);
app.component('FileexplorerComponent' , FileexplorerComponent);
app.component('ComponentsexplorerComponent' , ComponentsexplorerComponent);

app.mount("#app")
