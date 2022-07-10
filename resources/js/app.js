/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
const axios = require('axios').default;

Vue.component('component-first', require('./components/ComponentFirst.vue').default);
Vue.component('component-second', require('./components/ComponentSecond.vue').default);
Vue.component('component-third', require('./components/ComponentThird.vue').default);
Vue.component('component-forth', require('./components/ComponentForth.vue').default);
//  Vue.component('component-fifth', require('./components/ComponentFifth.vue').default);
//  Vue.component('component-sixth', require('./components/ComponentSixth.vue').default);
//  Vue.component('component-seventh', require('./components/ComponentSeventh.vue').default);
//  Vue.component('component-eighth', require('./components/ComponentEighth.vue').default);
//  Vue.component('component-eighth', require('./components/ComponentNinth.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        NavBarPhoneScreen: false,
    },

    mounted() {

    },

    methods: {

    }
});