
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import VueRouter from 'vue-router'

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter);

Vue.component('navbar', require('./components/Layouts/Navbar.vue'))
Vue.component('flash-message', require('./components/Layouts/FlashMessage.vue'))
const router = new VueRouter({
    mode: 'history',
    routes: [
       { path: '/'                   , component: require('./components/Home.vue') },
       { path: '/about'               , component: require('./components/About.vue') },
       { path: '/users/login'        , component: require('./components/Users/Login.vue') },
       /* tasks */
       { path: '/tasks'              , component: require('./components/Tasks/Index.vue') },
       { path: '/tasks/new/'         , component: require('./components/Tasks/new.vue') },
       { path: '/tasks/show/:id'     , component: require('./components/Tasks/show.vue') },
       { path: '/tasks/edit/:id'     , component: require('./components/Tasks/edit.vue') },
       { path: '/tasks/test/'         , component: require('./components/Tasks/test.vue') },
       { path: '/books/'              , component: require('./components/Books/index.vue') },
        /* depts */
       { path: '/depts'              , component: require('./components/Depts/Index.vue') },
       { path: '/depts/new/'         , component: require('./components/Depts/new.vue') },
       { path: '/depts/show/:id'     , component: require('./components/Depts/show.vue') },
       { path: '/depts/edit/:id'     , component: require('./components/Depts/edit.vue') },
    ]
});

const app = new Vue({
    router,
    el: '#app'
});
