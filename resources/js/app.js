require('./bootstrap');
import Example from './components/ExampleComponent';
import login from './components/login';

window.Vue = require('vue');

// Vue.component('root', require('').default);

import App from './components/layouts/App';
import Login from './components/login';
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routers/routers';
import store from './stores/store';

Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    mode: 'history',
});
window.events = new Vue();

const app = new Vue({
    el: '#app',
    components :{
        // 'Example': Example,
        'App':App
    },
    // template: '<App/>',
    // render: h => h(App),
    router,
    store: store,
});
const loginVue = new Vue({
    el: '#login',
    components :{
        // 'Example': Example,
        'Login':login,
    },
    router,
    store: store,
});