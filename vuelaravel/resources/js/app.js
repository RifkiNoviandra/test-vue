/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import {createRouter, createWebHashHistory} from 'vue-router';

require('./bootstrap');
// import Vue from 'vue';
// import VueRouter from 'vue-router';
import Landing from './components/Landing';
import Login from './components/Login';
import {createApp} from 'vue';
import Register from './components/Register';
import Detail from './components/Detail';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const routes = [
    {path : '/' , component: Landing},
    {path : '/login' , component: Login},
    {path : '/register' , component: Register},
    {path : '/detail' , component: Detail},
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

const app = createApp({});

app.use(router);

app.mount('#app');
