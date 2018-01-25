// loading VueJS
import Vue from 'vue';
import * as VueGoogleMaps from 'vue2-google-maps';
import BaseMapComponent from '../vue/components/BaseMap.vue';

// Vue components
Vue.component('base-map', BaseMapComponent);

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyDbkaVNsixp_h_ry6VD1Qjy2FnVefthBlI',
        v: '3.',
        // libraries: 'places', //// If you need to use place input
    }
});

new Vue({
    el: '#app',
});
