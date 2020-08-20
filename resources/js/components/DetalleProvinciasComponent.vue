<template>
    <div>
        <div class="row">
          <div class="col-sm-6" v-for="provincia in provincias" :key="provincia.id">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-8">
                 <l-map
                            v-if="showMap"
                            :zoom="zoom"
                            :center="center"
                            :options="mapOptions"
                            style="height: 100%"
                        >
                            <l-tile-layer :url="url" :attribution="attribution"/>
                            <l-marker :lat-lng="latlng(provincia.latitud, provincia.longitud)">
                                <l-popup>
                                    <div @click="innerClick">
                                        {{ provincia.nombre }}
                                        <p v-show="true">
                                        {{ provincia.descripcion }}
                                        </p>
                                    </div>
                                </l-popup>
                            </l-marker>
                        </l-map>
                </div>
                <div class="col-md-4">
                  <div class="card-body">
                    <h5 class="card-title">{{provincia.nombre}}</h5>
                    <p class="card-text">{{provincia.descripcion}}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
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
