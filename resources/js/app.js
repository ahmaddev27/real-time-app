/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue'
import Vuetify from 'vuetify'
Vue.use(Vuetify);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('home-component', require('./components/Home.vue').default);
Vue.component('toolbar-component', require('./components/Toolbar.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('login-component', require('./components/auth/login.vue').default);
Vue.component('singup-component', require('./components/auth/signup.vue').default);
Vue.component('logout-component', require('./components/auth/logout.vue').default);
Vue.component('forum-component', require('./components/Forum.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import router from './Router'
import User from './Helpers/User'
window.User=User

console.log(User.loggedIn())
const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router,

});

