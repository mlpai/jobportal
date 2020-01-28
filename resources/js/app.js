/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import $ from 'jquery';
import swal from 'sweetalert2'
import flatpickr from "flatpickr";
import select2 from "select2";
import moment from 'moment'


window.$ = window.jQuery = $;
window.flatpickr = flatpickr;
window.select2 = select2;
window.swal = swal;

const Toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
window.Toast = Toast;

$(function()
{
    $('[data-toggle="tooltip"]').tooltip();
});

//flatpicker class
//flatpickr(".cutomeDatePicker");

require('bootstrap');
require('admin-lte');
window.Vue = require('vue');
window.axios = require('axios');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.filter('formatDate', function(value) {
    if (value) {
      return moment(String(value)).format('Do MMM, h:mm a');
    }
  });

Vue.component('JobStatus', require('./components/JobStatus.vue').default);
Vue.component('chatbox', require('./components/ChatBox.vue').default);
Vue.component('message', require('./components/JobseekerChatBox.vue').default);
Vue.component('mandantory', require('./components/mandantorySign.vue').default);
Vue.component('feedback-opt', require('./components/feedBack.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
