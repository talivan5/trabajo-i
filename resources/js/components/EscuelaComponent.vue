<template>
    <div>
        <h3>
            LISTA DE ESCUELAS
        </h3> 
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
                            <l-marker v-for="escuela in escuelas" :key="escuela.id" :lat-lng="latlng(poblacion.latitud, poblacion.longitud)">
                                <l-popup>                                
                                    <h6>{{ escuela.nombre }}</h6>
                                </l-popup>
                            </l-marker>
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
                            <th scope="col">Nombre</th>
                            <th scope="col">Latitud</th>
                            <th scope="col">Longitud</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(escuela, $index) in escuelas" :key="escuela.id">
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{ escuela.nombre }}</td>
                            <td>{{ escuela.latitud }}</td>
                            <td>{{ escuela.longitud }}</td>
                            <td>
                                <div class="row">
                                    <button class="btn btn-warning pull-left" @click="abrirModal('editar', escuela)">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn btn-danger pull-rigth" @click="eliminarEscuela(escuela.id)">
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
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Nombre</label>
                                <input type="text" v-model="escuela.nombre" class="form-control" placeholder="Unidad Educativa">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Población</label>
                                <v-select
                                    v-model="poblacion"
                                    label="estacion"
                                    :options="poblacions"
                                >
                                </v-select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Latitud</label>
                                <input type="text" v-model="escuela.latitud" class="form-control" placeholder="La Latitud">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Longitud</label>
                                <input type="text" v-model="escuela.longitud" class="form-control" placeholder="La Longitud">
                            </div>
                        </div>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button v-if="esEdit" @click="agregarEscuela(escuela)" class="btn btn-primary">Guardar</button>
                        <button v-else  @click="editarEscuela(escuela)" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {LMap, LTileLayer, LControl, LMarker} from 'vue2-leaflet';
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
            escuela:{
                id: "",
                nombre: "",
                latitud:"",
                longitud:"",
                poblacion_id: "",
            },
            poblacion: null,
            lat: '',
            lng: '',
            showMap: true,
            title:"Registrar la Unidad Educativa",
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
        LMarker
    },
    computed:{
        poblacions(){
            return this.$store.state.modulo_poblacions.poblacions;
        },
        escuelas(){
            return this.$store.state.modulo_escuelas.escuelas;
        }
    },
    methods:{
        listaPoblacions(){
            this.$store.dispatch("getPoblacions");
        },
        listaEscuelas(){
            this.$store.dispatch("getEscuelas");
        },
        abrirModal(tipo, escuela){
            if(tipo != "nuevo")
            {
                this.esEdit = false;
                this.title= "Editar la Unidad Educativa";
                this.escuela = {
                    id: escuela.id,
                    nombre: escuela.nombre,
                    latitud:  escuela.latitud,
                    longitud: escuela.longitud,
                    poblacion_id: escuela.poblacion_id
                };
            }else{
                this.esEdit = true;
                this.escuela = {
                    id: "",
                    nombre: "",
                    latitud: "",
                    longitud: "",
                    poblacion_id: ""
                };
            }
            $("#nuevo").modal({ backdrop: "static", keyboard:false, show:true })
        },
        agregarEscuela(escuela) {
            this.escuela = {
                nombre: escuela.nombre,
                latitud:  escuela.latitud,
                longitud: escuela.longitud,
                poblacion_id: escuela.poblacion_id
            };
            this.$store.dispatch("addEscuela", escuela);
            this.escuela = {
                nombre:"",
                latitud:"",
                longitud:"",
                poblacion_id:"",
            };
            $("#nuevo").modal("hide");
        },
        editarEscuela(escuela) {
            let payload = {
                id: poblacion.id,
                escuela: escuela.nombre,
                latitud: poblacion.latitud,
                longitud: poblacion.longitud,
                poblacion_id: poblacion.poblacion_id
            };
            this.$store.dispatch("editEscuela", payload);
            $("#nuevo").modal("hide");
        },
        eliminarEscuela(id){
            this.$store.dispatch('deleteEscuela',id);
        },
        getLocation(escuela){
            this.myLocation = escuela;
            this.escuela.latitud =  escuela.lat;
            this.escuela.longitud = escuela.lng;
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
        }
    },
    mounted(){
        this.listaEscuelas();
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
