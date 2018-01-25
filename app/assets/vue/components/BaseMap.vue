<template>
    <gmap-map
        :center="center"
        :zoom="7"
        style="width: 500px; height: 300px"
    >
        <gmap-marker
            :key="index"
            v-for="(m, index) in markers"
            :position="m.position"
            :clickable="true"
            :draggable="true"
            @click="center=m.position"
        ></gmap-marker>
    </gmap-map>
</template>

<script>
    import * as VueGoogleMaps from 'vue2-google-maps';
    import Vue2 from 'vue';

    Vue2.use(VueGoogleMaps, {
        load: {
            key: 'AIzaSyDbkaVNsixp_h_ry6VD1Qjy2FnVefthBlI',
            v: '3.',
            // libraries: 'places', //// If you need to use place input
        }
    });

    export default {
        data () {
            return {
                center: {lat: 10.0, lng: 10.0},
                markers: [{
                    position: {lat: 10.0, lng: 10.0}
                }, {
                    position: {lat: 11.0, lng: 11.0}
                }]
            }
        }
    }
</script>