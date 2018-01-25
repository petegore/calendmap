// loading VueJS
import Vue from 'vue';
import BaseMapComponent from '../vue/components/BaseMap.vue';

// Vue components
Vue.component('base-map', BaseMapComponent);

new Vue({
    el: '#app',
});