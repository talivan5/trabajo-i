<template>
    <div>
        <h3>
            LISTA DE LAS POBLACIONES
        </h3> 
        <div class="form-row">  
            <div class="form-group col-md-3">
                <label for="inputAddress">Latitud</label>      
                <input class="form-control" type="number" name="latitudcir" v-model="latitudcir">
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress">Longitud</label>
                <input class="form-control" type="number" name="longitudcir" v-model="longitudcir">
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress">Radio</label>
                <input class="form-control" type="number" name="radiocir" v-model="radiocir">
            </div>
            <div class="form-group col-md-3">
                <button class="btn btn-secondary my-4" @click="dibujar()">Graficar</button>
            </div>
         </div>
        <!-- <select>
            <option v-for="poblacion in poblacions"  :key="poblacion.id" :value="latlng(poblacion.latitud, poblacion.longitud)">
                {{poblacion.estacion}}
            </option>
        </select> -->
       <div class="row">
            <div class="col-8">
                <div class="card card-body">
                    <div class="map">
                        <l-map
                                v-if="showMap"
                            :zoom="zoom"
                            :center="center"
                            :options="mapOptions"
                            style="height: 100%"
                        >
                            <l-tile-layer :url="url" :attribution="attribution"/>
                            <l-marker v-for="poblacion in poblacions" :key="poblacion.id" :lat-lng="latlng(poblacion.latitud, poblacion.longitud)">
                                <l-popup>                                
                                    <h6>{{ poblacion.estacion }}</h6>
                                </l-popup>
                            </l-marker>
                            <l-circle
                                :lat-lng="circle.center"
                                :radius="circle.radius"
                            />
                        </l-map>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="my-2">
                    <a type="button" class="btn btn-primary" @click="abrirModal('nuevo',null)">
                        Nuevo <i class="fa fa-file"></i>
                    </a>
                </div>       
                <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Estacion</th>
                                <th scope="col">Latitud</th>
                                <th scope="col">Longitud</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(poblacion, $index) in poblacions" :key="poblacion.id">
                                <th scope="row">{{$index + 1}}</th>
                                <td>{{ poblacion.estacion }}</td>
                                <td>{{ poblacion.latitud }}</td>
                                <td>{{ poblacion.longitud }}</td>
                                <td>
                                    <div class="row">
                                        <button class="btn btn-warning pull-left" @click="abrirModal('editar', poblacion)">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button class="btn btn-danger pull-rigth" @click="eliminarPoblacion(poblacion.id)">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                </table>    
            </div>     
        </div>
        <div class="modal fade" id="nuevo">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{this.title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputAddress">Estación</label>
                                <input type="text" v-model="poblacion.estacion" class="form-control" placeholder="Estación de la población">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Latitud</label>
                                <input type="text" v-model="poblacion.latitud" class="form-control" placeholder="La Latitud">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Longitud</label>
                                <input type="text" v-model="poblacion.longitud" class="form-control" placeholder="La Longitud">
                            </div>
                        </div>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button v-if="esEdit" @click="agregarPoblacion(poblacion)" class="btn btn-primary">Guardar</button>
                        <button v-else  @click="editarPoblacion(poblacion)" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {LMap, LTileLayer, LControl, LMarker, LCircle} from 'vue2-leaflet';
import { latLng } from 'leaflet'
import { OpenStreetMapProvider } from 'leaflet-geosearch';
import VGeosearch from 'vue2-leaflet-geosearch';

export default {
  watch: {
  },
    data(){
        return {
            url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            latitudcir:0,
            longitudcir:0,
            radiocir:0,
            circle: {
                // center: latLng(this.latitudcir, this.longitudcir),
                // radius: this.radiocir
                center: latLng(0,0),
                radius:0
            },
            zoom: 8,
            center: [ -17.9647, -67.106 ],
            geosearchOptions: {
                provider: new OpenStreetMapProvider(),
                style: 'bar',
                showMarker: false,
            },

            markers: [],
            myLocation:'',
            addButton: true,
            deleteButton: false,
            poblacion:{
                id: "",
                estacion: "",
                latitud:"",
                longitud:""
            },
            lat: '',
            lng: '',
            showMap: true,
            title:"Registrar Población",
            esEdit:false,
            mapOptions: {
                zoomSnap: 0.5
            }
        }
    },
    components: {
        LMap,
        LTileLayer,
        VGeosearch,
        LControl,
        LMarker,
        LCircle
    },
    computed:{
        poblacions(){
            return this.$store.state.modulo_poblacions.poblacions;
        }
    },
    methods:{
        listaPoblacions(){
            this.$store.dispatch("getPoblacions");
        },
        abrirModal(tipo, poblacion){
            if(tipo != "nuevo")
            {
                this.esEdit = false;
                this.title= "Editar Poblacion";
                this.poblacion = {
                    id: poblacion.id,
                    estacion: poblacion.estacion,
                    latitud:  poblacion.latitud,
                    longitud: poblacion.longitud
                };
            }else{
                this.esEdit = true;
                this.poblacion = {
                    id: "",
                    estacion: "",
                    latitud: "",
                    longitud:""
                };
            }
            $("#nuevo").modal({ backdrop: "static", keyboard:false, show:true })
        },
        agregarPoblacion(poblacion) {
            this.poblacion = {
                estacion: poblacion.estacion,
                latitud:  poblacion.latitud,
                longitud: poblacion.longitud
            };
            this.$store.dispatch("addPoblacion",poblacion);
            this.poblacion = {
                estacion:"",
                latitud:"",
                longitud:""
            };
            $("#nuevo").modal("hide");
        },
        editarPoblacion(poblacion) {
            let payload = {
                id: poblacion.id,
                estacion: poblacion.estacion,
                latitud: poblacion.latitud,
                longitud: poblacion.longitud
            };
            this.$store.dispatch("editPoblacion", payload);
            $("#nuevo").modal("hide");
        },
        eliminarPoblacion(id){
            this.$store.dispatch('deletePoblacion',id);
        },
        getLocation(poblacion){
            this.myLocation = poblacion;
            this.poblacion.latitud =  poblacion.lat;
            this.poblacion.longitud = poblacion.lng;
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
        addMarker(){
            this.markers.push(L.latLng(this.center));
            this.zoom=25;
            this.addButton = false;
            this.deleteButton = true;
        },
        deleteMarker(){
            this.markers.splice(-1, 1);
            this.deleteButton = false;
            this.addButton = true;
        },
        dibujar(){
            this.circle ={
                center:latLng(this.latitudcir, this.longitudcir),
                radius:this.radiocir
            }
        }
    },
    mounted(){
        this.listaPoblacions();
    }
}
</script>

<style scoped>
    .map{
        width: 100%;
        height: 300px;
        margin: 1px;
    }
    img {
        
        border: red 2px solid;
        display: block;
    }

</style>
