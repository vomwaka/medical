
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform';
import Vue from 'vue';

import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
})

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedcolor: 'red',
  height: '3px'
})

Vue.filter('upText', function(text){
  return text.charAt(0).toUpperCase() + text.slice(1);
})

window.toast = swal;

window.Form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'

Vue.use(VueRouter)


let routes = [
  { path: '/dashboard', component: require('./components/Dashboard.vue').default },
  { path: '/nursing', component: require('./components/Nursing.vue').default },
  { path: '/laboratory', component: require('./components/Laboratory.vue').default },
  { path: '/radiology', component: require('./components/Radiology.vue').default },
  { path: '/treatment', component: require('./components/Treatment.vue').default },
  { path: '/optical', component: require('./components/Optical.vue').default },
  { path: '/reception', component: require('./components/Reception.vue').default },
  { path: '/profile', component: require('./components/Profile.vue').default },
  { path: '/users', component: require('./components/Users.vue').default },
]


const router = new VueRouter({
  mode: 'history',
  routes
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    router
});
