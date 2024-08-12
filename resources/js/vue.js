/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import { createApp } from 'vue';
require('./bootstrap');
import router from './router';
import '../css/objectlist.css';
//import axios from 'axios';
//axios.defaults.baseURL = 'https://develop.api.immo1.mogic-server.de';
//axios.defaults.baseURL = 'http://localhost:5642';


let app = createApp({})
app.component('objectlist-component', require('./components/ObjectlistComponent.vue').default);
app.use(router);
app.mount("#app");



