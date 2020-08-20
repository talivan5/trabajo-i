<template>
    <div>
        <div class = "row">
            <div class = "col col-8">
                <h1>
                    LISTA DE PROVINCIAS
                </h1>
            </div>

            <div class = "col col-4">
               <button type="button" class="btn btn-primary" @click="abrirModal('nuevo',null)">Nuevo</button>
            </div>
        </div>
        <br>
        <br>
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nombre </th>
                    <th scope="col">Movilidad</th>
                    <th scope="col">Latitud</th>
                    <th scope="col">Longitud</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(provincia, $index) in provincias" :key="provincia.id">
                        <th scope="row">{{$index + 1}}</th>
                        <td>{{ provincia.nombre }}</td>
                        <td>{{ provincia.movilidad }}</td>
                        <td>{{ provincia.latitud }}</td>
                        <td>{{ provincia.longitud }}</td>
                        <td>{{ provincia.descripcion }}</td>
                        <td>
                            <button class="btn btn-warning" @click="abrirModal('editar', provincia)">Editar</button>
                            <button class="btn btn-danger" @click="eliminarProvincia(provincia.id)">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
        </table>
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
                        <div class="row">
                            <div class="col col md-6" >
                                <div class="container-fluid">
                                    <p style="text-align:center; font-size:20px"> <b>UBICACIÓN</b></p>
                                    <div class="row justify-content-center">
                                        <p><b> Mi Ubicación : </b> {{myLocation}} </p><br>
                                        <p> <b> Mi Latitud : </b> {{provincia.latitud}} &nbsp;&nbsp;
                                            <b> Mi Longitud : </b> {{provincia.longitud}} </p>
                                        <div class= "map">
                                            <l-map
                                                style="height: 300px; width: 500px"
                                                :zoom="zoom"
                                                :center="center"
                                                :options="mapOptions"
                                            >
                                                <l-tile-layer :url="url"></l-tile-layer>
                                                <v-geosearch :options="geosearchOptions" ></v-geosearch>
                                                <l-control>
                                                    <button class="btn btn-warning" @click= "addMarker" v-show="addButton">
                                                        ADICIONAR
                                                    </button>
                                                    <button class="btn btn-success" @click= "deleteMarker" v-show="deleteButton">
                                                        ELIMINAR
                                                    </button>
                                                </l-control>
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
                                </div>
                            </div>
                            <div class="col col md-6">
                                <br><br><br>
                                <form enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Nombre de Provincia</label>
                                            <input type="text" v-model="provincia.nombre" class="form-control" placeholder="Nombre de la Provincia">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Movilidad</label>
                                            <input type="text" v-model="provincia.movilidad" class="form-control" placeholder="Movilidad a Usar">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Latitud</label>
                                            <input type="text" v-model="provincia.latitud" class="form-control" placeholder="La Latitud">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Longitud</label>
                                            <input type="text" v-model="provincia.longitud" class="form-control" placeholder="La Longitud">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress2">Descripción</label>
                                        <textarea class="form-control" v-model="provincia.descripcion" placeholder="Descripción de la Provincia"></textarea>

                                    </div>
                                    <div class="form-group" v-if="esEdit!=false">
                                        <label for="imagen">Foto de Referencia</label>
                                        <input type="file" @change="obtenerImagen" class="form-control-file btn btn-success">
                                        <br>
                                        <br>
                                        <figure>
                                            <img width="200" height="200" :src="imagen" alt="Foto">
                                        </figure>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button v-if="esEdit" @click="agregarProvincia(provincia)" class="btn btn-primary">Guardar</button>
                        <button v-else  @click="editarProvincia(provincia)" class="btn btn-primary">Actualizar</button>
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
$('#nuevo').on('shows.bs.modal',function(){
    
})
export default {
    data(){
        return {
            url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            zoom: 15,
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
            title:"Registrar Provincia",
            esEdit:false,
            imagenMineatura:"",
            mapOptions: {
                zoomSnap: 0.1
            },

        }
    },
    components: {
        LMap,
        LTileLayer,
        VGeosearch,
        LControl,
        LMarker,
    },
    computed:{
        provincias(){
            return this.$store.state.modulo_provincias.provincias;
        },
        imagen(){
            return this.imagenMineatura;
        }
    },
    methods:{
        listaProvincias(){
            this.$store.dispatch("getProvincias");
        },
        obtenerImagen(e){
            let file = e.target.files[0];
            this.provincia.imagen = file;
            this.cargarImagen(file);
            console.log(file);
        },
        cargarImagen(file){
            let reader = new FileReader();
            reader.onload = (e) =>{
                this.imagenMineatura = e.target.result;
            }
            reader.readAsDataURL(file);
        },
        abrirModal(tipo, provincia){
            if(tipo != "nuevo")
            {
                this.esEdit = false;
                this.title= "Editar Provincia";
                this.provincia = {
                    id: provincia.id,
                    nombre: provincia.nombre,
                    descripcion: provincia.descripcion,
                    movilidad: provincia.movilidad,
                    latitud: provincia.latitud,
                    longitud: provincia.longitud,
                    imagen: provincia.imagen
                };
            }else{
                this.esEdit = true;
                this.title = "Registrar Provincia";
                this.provincia = {
                    id: "",
                    nombre: "",
                    descripcion: "",
                    movilidad: "",
                    latitud: "",
                    longitud:"",
                    imagen:""
                };
            }
            $("#nuevo").modal({ backdrop: "static", keyboard:false, show:true })
        },
        agregarProvincia(provincia){
            // const formData = new FormData();
            // formData.append('nombre',provincia.nombre);
            // formData.append('descripcion',provincia.descripcion);
            // formData.append('movilidad',provincia.movilidad);
            // formData.append('latitud',provincia.latitud);
            // formData.append('longitud',provincia.longitud);
            // formData.append('imagen',provincia.imagen);
            // this.addProvincia(formData).then( () => {
            //     $('#nuevo').modal('hide');
            //     this.$swal.fire('Exito!','Registro creado exitosamente.','success');
            // }).catch(error =>{
            //     this.$swal.fire('Ops!',utils.showErrors(error.response.data.errors),'error');
            // })
            this.$store.dispatch("addProvincia",provincia);
            this.provincia = {
                id:"",
                nombre:"",
                descripcion:"",
                movilidad:"",
                latitud:"",
                longitud:"",
                //imagen:""
            };
            $("#nuevo").modal("hide");
        },
        editarProvincia(provincia){
            let payload = {
                id: provincia.id,
                nombre: provincia.nombre,
                descripcion: provincia.descripcion,
                movilidad: provincia.movilidad,
                latitud: provincia.latitud,
                longitud: provincia.longitud,
                //imagen: provincia.imagen
            };
            this.$store.dispatch("editProvincia", payload);
            $("#nuevo").modal("hide");
        },
        eliminarProvincia(id){
            this.$store.dispatch('deleteProvincia',id);
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
        addMarker(){
            this.markers.push(L.latLng(this.center));
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
    img {
        width: 50%;
        border: red 5px solid;
        display: block;
    }

</style>
