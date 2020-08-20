<template>
    <div>
        <div class="row">
            <div class="col col-md-7">
                 <div class="map">
                    <l-map
                         v-if="showMap"
                        :zoom="zoom"
                        :center="center"
                        :options="mapOptions"
                        style="height: 100%"
                    >
                        <l-tile-layer :url="url" :attribution="attribution"/>
                        <l-marker v-for="provincia in provincias" :key="provincia.id" :lat-lng="latlng(provincia.latitud, provincia.longitud)">
                            <l-popup>
                                <div @click="innerClick">
                                    {{ provincia.nombre }}
                                </div>
                            </l-popup>
                        </l-marker>
                    </l-map>
                </div>
            </div>
            <div class="col col-md-5">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Latitud</th>
                        <th scope="col">Longitud</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(provincia, index) in provincias" :key="provincia.id">
                        <th scope="row">{{index +1}}</th>
                        <td>{{provincia.nombre}}</td>
                        <td>{{provincia.latitud}}</td>
                        <td>{{provincia.longitud}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import { latLng } from 'leaflet'
import {LMap} from 'vue2-leaflet';
export default {
    data(){
        return {
            url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            attribution:
            '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            zoom: 13,
            center: [ -17.9647, -67.106 ],
            markers: [],
            provincia:{
                id: "",
                nombre: "",
                descripcion:"",
                movilidad:"",
                latitud:"",
                longitud:"",
                imagen:"",
            },
            lat: '',
            lng: '',
            showMap: true,
            mapOptions: {
                zoomSnap: 0.1
            },
        }
    },
    components: {
        LMap
    },
    computed:{
        provincias(){
            return this.$store.state.modulo_provincias.provincias;
        }
    },
    methods:{
        listaProvincias(){
            this.$store.dispatch("getProvincias");
        },
         innerClick() {
            alert("Click!");
        },
        getLocation(provincia){
            this.myLocation = provincia;
            this.provincia.latitud = provincia.lat;
            this.provincia.longitud = provincia.lng;
        },
        latlng(lat, lng){
            return latLng(lat, lng);
        },
        zoomUpdate(zoom) {
            this.currentZoom = zoom;
        },
        centerUpdate(center) {
            this.currentCenter = center;
        },
    },
    mounted(){
        this.listaProvincias();
    }
}
</script>
<style scoped>
    .map{
        width: 100%;
        height: 300px;
        margin: 1px;
    }
</style>
