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
                center: {lat: 46.666827, lng: 2.290004},
                markers: [{
                    position: {lat: 45.764657, lng: 4.834262}
                }]
            }
        },
    }
</script>
