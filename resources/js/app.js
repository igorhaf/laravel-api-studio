require('./bootstrap');


import { createApp } from 'vue';
import App from './layouts/App.vue'
import router from './router'

/*import MonacoeditorComponent from './components/MonacoeditorComponent.vue';
import TerminalComponent from './components/TerminalComponent.vue';
import FileexplorerComponent from './components/FileexplorerComponent.vue';
import ComponentsexplorerComponent from './components/ComponentsexplorerComponent.vue';



app.component('MonacoeditorComponent' , MonacoeditorComponent);
app.component('TerminalComponent' , TerminalComponent);
app.component('FileexplorerComponent' , FileexplorerComponent);
app.component('ComponentsexplorerComponent' , ComponentsexplorerComponent);*/
let app=createApp({})

createApp(App).use(router).mount('#app')


