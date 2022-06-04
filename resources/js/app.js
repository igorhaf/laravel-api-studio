require('./bootstrap');

import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import AnotherComponent from './components/AnotherComponent.vue';

let app=createApp({})

app.component('ExampleComponent' , ExampleComponent);
app.component('AnotherComponent' , AnotherComponent);

app.mount("#app")
