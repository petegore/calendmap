<template>
    <gmap-map
        :center="center"
        :zoom="7"
        v-bind:style="{ width: mapWidth, height: mapHeight }"
    >
    </gmap-map>
</template>

<script>
    export default {
        props: [
            'mapWidth',
            'mapHeight'
        ],

        data () {
            return {
                center: {lat: 10.0, lng: 10.0},
                markers: [{
                    position: {lat: 10.0, lng: 10.0}
                }, {
                    position: {lat: 11.0, lng: 11.0}
                }]
            }
        },
    }
</script>
