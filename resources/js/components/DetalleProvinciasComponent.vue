<template>

    <div class="container-fluid">

        <div class="row justify-content-center">
            
            <!-- muestra en la pantalla el zoom 
            <p>Zoom : {{zoom}}</p>-->
            <!-- muestra en la pantalla latitud y longitud
            <br><p>Center : {{center}}</p>
            markers :{{markers}}-->
            <p><b> Mi Ubicación : </b> {{myLocation}} </p><br>
            <p> <b> Mi Latitud : </b> {{myLatitud}} &nbsp;&nbsp;
                <b> Mi Longitud : </b> {{myLongitud}} </p>
            
            <div class= "map">
                <!-- de la pestaña components LMap @update:bounds="boundsUpdated" style="height: 80%; width: 100%"-->
                <l-map
                    style="height: 60%; width: 100%"
                    :zoom="zoom"
                    :center="center"
                    @update:zoom="zoomUpdated"
                    @update:center="centerUpdated"
                    
                    >
                    <l-tile-layer :url="url"></l-tile-layer>
                    <!-- instalar npm install --save vue2-leaflet-geosearch leaflet-geosearch en la terminal
                    // sacar de vue2-leaflet-geosearch--usage -->
                    <v-geosearch :options="geosearchOptions" ></v-geosearch>
                    <!--sacar de vue2-leaflet-Components LControl -->
                    <l-control>
                        <!--agrega el boton adicionar-->
                        <button @click= "addMarker" v-show="addButton">
                            ADICIONAR
                        </button>
                        <!--agrega el boton eliminar-->
                        <button @click= "deleteMarker" v-show="deleteButton">
                            ELIMINAR
                        </button>
                    </l-control>
                    <!--sacar de vue2-leaflet-Components LMarker -->
                    <l-marker 
                        v-for="(marker, index) in markers" :key="index"
                        :lat-lng="marker"
                    
                        :draggable= "true"
                    
                        @update:lat-lng="getLocation"
                    >
                    </l-marker>
                </l-map>
            </div>
                
        </div>
        <!-- añadido para labels y cuadros de textos 
        <div class= "row mt-3 justify-content-center">
            <div class= "col-md-8">
                <form>
                    <div class= "form-row mt-3">
                        <div class= "col-md-12">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" v-model="form.provincia" class= "form-control">
                        </div>
                    </div>
                    <div class= "form-row mt-3">
                        <div class= "col-md-6">
                            <label for="exampleInputPassword1"></label>
                            <input type="text" v-model="form.latitud" class= "form-control" disabled>
                        </div>
                        <div class= "col-md-6">
                            <label for="exampleInputPassword1"></label>
                            <input type="text" v-model="form.longitud" class= "form-control" disabled>
                        </div>
                    </div>
                    <button type= "submit" class= "btn btn-primary mt-3">boton</button>
                </form>
            </div>

        </div>-->

    </div>

</template>

<script>
    //aumentar LControl y LMarker
    import {LMap, LTileLayer, LControl, LMarker} from 'vue2-leaflet';
    // sacar de vue2-leaflet-geosearch--usage
    import Vue2Leaflet from 'vue2-leaflet';
    import { OpenStreetMapProvider } from 'leaflet-geosearch';
    import VGeosearch from 'vue2-leaflet-geosearch';

    export default 
    {
        components: {
            LMap,
            LTileLayer,
            // sacar de vue2-leaflet-geosearch--usage
            VGeosearch,
            // sacar de vue2-leaflet-Components-LControl
            LControl,
            // sacar de vue2-leaflet-Components-LMarker
            LMarker
        },
    
        data (){
            return {
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                zoom: 14,
                center: [ -17.9647, -67.106 ],
                // sacar de vue2-leaflet-geosearch--usage
                geosearchOptions: { // Important part Here
                    provider: new OpenStreetMapProvider(),
                    //sirve para colocar un buscador en la parte del medio
                    style: 'bar',
                    showMarker: false,
                },
                //sacar de vue2-leaflet-Components LMarker
                //markerLatLng: [ -17.9647, -67.106 ],cambiar por 
                markers: [],
                myLocation:'',
                myLatitud:'',
                myLongitud:'',
                //muestra solo el boton adicionar
               addButton: true,
                //no muestra el boton eliminar
                //deleteButton: false,
                //bounds: null
            };
        },

        methods: {
            //adicionar para que funcione el evento de LMarker
            getLocation(location){
                this.myLocation = location;
                this.myLatitud = location.lat;
                this.myLongitud = location.lng;
            },
            
            //adicionar para que funcione el boton de i am usseles button
            //y el markerlatlng
            addMarker(){
                this.markers.push(L.latLng(this.center));
                this.addButton = false;
                this.deleteButton = true;
            },

            deleteMarker(){
                this.markers.splice(-1, 1);
                this.deleteButton = false;
                this.addButton = true;
            },
            zoomUpdated (zoom) {
                this.zoom = zoom;
            },

            centerUpdated (center) {
                this.center = center;
            },
            
            /**boundsUpdated (bounds) {
                this.bounds = bounds;
            }*/
        }
    }
</script>

<style scoped>
    .map{
        width: 100%;
        height: 90vh;
    }
    
</style>