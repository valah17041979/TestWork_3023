require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
import router from './router';
import pagination from 'laravel-vue-pagination';


Vue.component('app', require('./components/App.vue').default);

const app = new Vue({
    el: '#app',
    router
});

