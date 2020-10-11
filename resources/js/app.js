require('./bootstrap');

window.Vue = require('vue');

import VueRouter from "vue-router"; // import plugin  
import bootstrapVue from "bootstrap-vue";
import axois from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueRouter) // use the plugin  
Vue.use(bootstrapVue)
Vue.use(VueAxios, axois)

import Login from "./components/Login.vue"; // import the component 
import EverydayCheck from "./components/NewData.vue";
import AllData from "./components/AllData.vue";
import Register from "./components/Register.vue";
import Newbaby from "./components/NewBaby.vue";

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: "/",
            name: 'previouscheck',
            component: AllData
        },
        {
            path: "/login",
            name: 'login',
            component: Login
        },
        {
            path: "/everydaycheck",
            name: 'curr-record',
            component: EverydayCheck
        },
        {
            path: "/register",
            name: "register",
            component: Register
        },
        {
            path: "/newbaby",
            name: "newbaby",
            component: Newbaby
        }
    ]
})

const app = new Vue({
    el: '#app', 
    router
});
