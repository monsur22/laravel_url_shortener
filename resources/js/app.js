/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');


 import App from './App.vue';
 import VueAxios from 'vue-axios';
 import VueRouter from 'vue-router';
 import axios from 'axios';
 import {
     routes
 } from './routes';




 Vue.use(VueRouter);
 Vue.use(VueAxios, axios);

 export default new VueRouter({
    routes,
    mode: 'history'
})

const app = new Vue({
    el: '#app',
    router: router,
});
