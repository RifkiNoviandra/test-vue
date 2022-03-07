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
import Admin from './components/Admin';
import Home from './components/Home';
import Search from './components/Search';
import template_home from './components/template_home';
import template_HeaderGuest from './components/template_HeaderGuest';
import Template_admin from './components/Template_admin';
import Nft from './components/Nft';
import Category from './components/Category';

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

    {
        path: '/landing' , component: template_HeaderGuest, children : [
            {path : '/landing' , component: Landing},
            {path : '/landing/detail/:id' , component: Detail},
            {path : '/landing/search/:key' , component: Search},

        ]
    },
    {
        path: '/home' , component: template_home, children : [
            {path : '/home' , component: Home},
            {path : '/home/detail/:id' , component: Detail},
            {path : '/home/search/:key' , component: Search},

        ], meta: {requiresToken: true}
    },
    {
        path : '/admin' , component: Template_admin , children: [

        {path : '/admin' , component: Admin},
        {path : '/nft' , component: Nft},
        {path : '/category' , component: Category},

        ] , meta: {requiresToken: true}
    },
    {path : '/login' , component: Login},
    {path : '/register' , component: Register},
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

router.beforeEach(async (to, from, next) => {
    let token = localStorage.getItem('token');
    if (to.meta.requiresToken) {
        if (!token) {
            return next('/login');
        }
        window.axios.defaults.params = {};
        window.axios.defaults.params['token'] = token;
    }
    return next();
});

const app = createApp({});

app.use(router);

app.mount('#app');
