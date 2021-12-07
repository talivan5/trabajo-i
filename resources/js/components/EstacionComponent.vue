<template>
  <div>
    <h3>LISTA DE LAS ESTACIONES</h3>
    <div class="display:flex float-right my-2">
      <button
        type="button"
        class="btn btn-primary"
        @click="abrirModal('nuevo', null)"
      >
        Nuevo <i class="fa fa-file"></i>
      </button>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Estación</th>
            <th scope="col">Provincia/Localidad</th>
            <th scope="col">Municipio</th>
            <th scope="col">Año Inicio</th>
            <th scope="col">Año Fin</th>
            <th scope="col">Latitud</th>
            <th scope="col">Longitud</th>
            <th scope="col">Altura</th>
            <th scope="col">Tipo Estación</th>
            <th scope="col">Tipo Sensores</th>
            <th scope="col">Datos</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Estado</th>
            <th scope="col">Imagen</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(estacion, $index) in estacions" :key="estacion.id">
            <th scope="row">{{ $index + 1 }}</th>
            <td>{{ estacion.nombre_estacion }}</td>
            <td>{{ estacion.provincia_localidad }}</td>
            <td>{{ estacion.municipio }}</td>
            <td>{{ estacion.fecha_inicio }}</td>
            <td>{{ estacion.fecha_fin }}</td>
            <td>{{ estacion.latitud }}</td>
            <td>{{ estacion.longitud }}</td>
            <td>{{ estacion.altura }}</td>
            <td>{{ estacion.tipo_estacion }}</td>
            <td>
              <span class="badge badge-primary" v-for="sensor in estacion.sensors" :key="sensor">
                {{ sensor.nombre }}
              </span>
            </td>
            <td>{{ estacion.datos }}</td>
            <td>{{ estacion.observaciones }}</td>
            <td>{{ estacion.estado }}</td>
            <td>
              <img
                :src="'storage/img/estaciones/' + estacion.imagen"
                alt="estos es"
                width="70"
                height="70"
              />
            </td>
            <td>
              <button
                class="btn btn-warning"
                @click="abrirModal('editar', estacion)"
              >
                <i class="fa fa-pencil-alt"></i>
              </button>
              <button
                class="btn btn-danger"
                @click="eliminarEstacion(estacion.id)"
              >
                <i class="fa fa-trash"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="modal fade" id="nuevo">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ this.title }}</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-6">
                  <label for="nombre_estacion">Estacion</label>
                  <input
                    type="text"
                    v-model="estacion.nombre_estacion"
                    class="form-control"
                    placeholder="Nombre de la estacion"
                  />
                </div>
                <div class="form-group col-6">
                  <label for="provincia_localidad">Provincia/Localidad</label>
                  <input
                    type="text"
                    v-model="estacion.provincia_localidad"
                    class="form-control"
                    placeholder="Tipo de Estacion"
                  />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-6">
                  <label for="municipio">Municipio</label>
                  <input
                    type="text"
                    v-model="estacion.municipio"
                    class="form-control"
                    placeholder="Municipio"
                  />
                </div>
                <div class="form-group col-6">
                  <label for="altura">Altura</label>
                  <input
                    type="number"
                    v-model="estacion.altura"
                    class="form-control"
                  />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-6">
                  <label for="fecha_inicio">Año Inicio</label>
                  <input
                    type="date"
                    v-model="estacion.fecha_inicio"
                    class="form-control"
                  />
                </div>
                <div class="form-group col-6">
                  <label for="fecha_fin">Año Fin</label>
                  <input
                    type="date"
                    v-model="estacion.fecha_fin"
                    class="form-control"
                  />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-6">
                  <label for="latitud">Latitud</label>
                  <input
                    type="text"
                    v-model="estacion.latitud"
                    class="form-control"
                    placeholder="La Latitud"
                  />
                </div>
                <div class="form-group col-6">
                  <label for="longitud">Longitud</label>
                  <input
                    type="text"
                    v-model="estacion.longitud"
                    class="form-control"
                    placeholder="La Longitud"
                  />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-6">
                  <label for="tipo_estacion">Tipo Estacion</label>
                  <input
                    type="text"
                    v-model="estacion.tipo_estacion"
                    class="form-control"
                    placeholder="Tipo de estacion"
                  />
                </div>
                <div class="form-group col-6">
                  <label for="estado">Estado</label>
                  <input
                    type="text"
                    v-model="estacion.estado"
                    class="form-control"
                    placeholder="Estado que se encuentra"
                  />
                </div>
                <!-- <div class="form-group col-6">
                  <label for="tipo_estacion">Tipo Estacion</label>
                  <a
                    class="btn btn-primary"
                    data-toggle="collapse"
                    href="#collapseExample"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseExample"
                  >
                    Mostrar
                  </a>
                  <div class="collapse" id="collapseExample">
                    <ul class="list-group">
                      <li class="list-group-item">{{estacion.sensors}}</li>
                    </ul>
                  </div>
                </div> -->
              </div>
              <div class="form-row">
                <div class="form-group col-12">
                  <label for="datos">Datos</label>
                  <textarea
                    v-model="estacion.datos"
                    class="form-control"
                    placeholder="Datos importantes"
                  ></textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-12">
                  <label for="observaciones">Observaciones</label>
                  <textarea
                    class="form-control"
                    v-model="estacion.observaciones"
                    placeholder="Observaciones de la estacion"
                  ></textarea>
                </div>
              </div>
              <!-- <div v-if="esEdit==false">
                                <input type="file" @change="obtenerImagen" class="form-control-file btn btn-success">
                            </div> -->
              <div class="form-group" v-if="esEdit != false">
                <label for="imagen">Foto de Referencia</label>
                <input
                  type="file"
                  @change="obtenerImagen"
                  class="form-control-file btn btn-success"
                />
                <br />
                <br />
                <figure>
                  <img width="200" height="200" :src="imagen" alt="Foto" />
                </figure>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Cancelar
            </button>
            <button
              v-if="esEdit"
              @click="agregarEstacion(estacion)"
              class="btn btn-primary"
            >
              Guardar
            </button>
            <button
              v-else
              @click="editarEstacion(estacion)"
              class="btn btn-primary"
            >
              Actualizar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { LMap, LTileLayer, LControl, LMarker } from "vue2-leaflet";
import { latLng } from "leaflet";
import { OpenStreetMapProvider } from "leaflet-geosearch";
import VGeosearch from "vue2-leaflet-geosearch";
$("#nuevo").on("shows.bs.modal", function () {});
export default {
  data() {
    return {
      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      zoom: 2,
      center: [-17.9647, -67.106],
      geosearchOptions: {
        provider: new OpenStreetMapProvider(),
        style: "bar",
        showMarker: false,
      },

      markers: [],
      myLocation: "",
      addButton: true,
      deleteButton: false,
      estacion: {
        id: "",
        nombre_estacion: "",
        provincia_localidad: "",
        municipio: "",
        fecha_inicio: "",
        fecha_fin: "",
        latitud: "",
        longitud: "",
        altura: "",
        tipo_estacion: "",
        datos: "",
        observaciones: "",
        estado: "",
        imagen: "",
      },
      lat: "",
      lng: "",
      showMap: true,
      title: "",
      esEdit: false,
      imagenMineatura: "",
      mapOptions: {
        zoomSnap: 0.5,
      },
    };
  },
  components: {
    LMap,
    LTileLayer,
    VGeosearch,
    LControl,
    LMarker,
  },
  computed: {
    estacions() {
      return this.$store.state.modulo_estacions.estacions;
    },
    imagen() {
      return this.imagenMineatura;
    },
  },
  methods: {
    listaEstacions() {
      this.$store.dispatch("getEstacions");
    },
    obtenerImagen(e) {
      let file = e.target.files[0];
      this.estacion.imagen = file;
      this.cargarImagen(file);
    },
    cargarImagen(file) {
      let reader = new FileReader();
      reader.onload = (e) => {
        this.imagenMineatura = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    abrirModal(tipo, estacion) {
      if (tipo != "nuevo") {
        this.esEdit = false;
        this.title = "Editar la Estación";
        this.estacion = {
          id: estacion.id,
          nombre_estacion: estacion.nombre_estacion,
          provincia_localidad: estacion.provincia_localidad,
          municipio: estacion.municipio,
          fecha_inicio: estacion.fecha_inicio,
          fecha_fin: estacion.fecha_fin,
          latitud: estacion.latitud,
          longitud: estacion.longitud,
          altura: estacion.altura,
          tipo_estacion: estacion.tipo_estacion,
          datos: estacion.datos,
          observaciones: estacion.observaciones,
          estado: estacion.estado,
          imagen: estacion.imagen,
        };
      } else {
        this.esEdit = true;
        this.title = "Registrar un Tipo Sensor";
        this.estacion = {
          id: "",
          nombre_estacion: "",
          provincia_localidad: "",
          municipio: "",
          fecha_inicio: "",
          fecha_fin: "",
          latitud: "",
          longitud: "",
          altura: "",
          tipo_estacion: "",
          datos: "",
          observaciones: "",
          estado: "",
          imagen: "",
        };
      }
      $("#nuevo").modal({ backdrop: "static", keyboard: false, show: true });
    },
    agregarEstacion(estacion) {
      let formData = new FormData();
      formData.append("nombre_estacion", estacion.nombre_estacion);
      formData.append("provincia_localidad", estacion.provincia_localidad);
      formData.append("municipio", estacion.municipio);
      formData.append("fecha_inicio", estacion.fecha_inicio);
      formData.append("fecha_fin", estacion.fecha_fin);
      formData.append("latitud", estacion.latitud);
      formData.append("longitud", estacion.longitud);
      formData.append("altura", estacion.altura);
      formData.append("tipo_estacion", estacion.tipo_estacion);
      formData.append("datos", estacion.datos);
      formData.append("observaciones", estacion.observaciones);
      formData.append("estado", estacion.estado);
      formData.append("imagen", estacion.imagen);
      this.$store.dispatch("addEstacion", formData);
      $("#nuevo").modal("hide");
    },
    editarEstacion(estacion) {
      let payload = {
        id: estacion.id,
        nombre_estacion: estacion.nombre_estacion,
        provincia_localidad: estacion.provincia_localidad,
        municipio: estacion.municipio,
        fecha_inicio: estacion.fecha_inicio,
        fecha_fin: estacion.fecha_fin,
        latitud: estacion.latitud,
        longitud: estacion.longitud,
        altura: estacion.altura,
        tipo_estacion: estacion.tipo_estacion,
        datos: estacion.datos,
        observaciones: estacion.observaciones,
        estado: estacion.estado,
        imagen: estacion.imagen,
      };
      $("#nuevo").modal("hide");
      this.$store.dispatch("editEstacion", payload);
    },
    eliminarEstacion(id) {
      this.$store.dispatch("deleteEstacion", id);
    },
    getLocation(estacion) {
      this.myLocation = estacion;
      this.estacion.latitud = estacion.lat;
      this.estacion.longitud = estacion.lng;
    },
    latlng(lat, lng) {
      return latLng(lat, lng);
    },
    zoomUpdate(zoom) {
      this.currentZoom = zoom;
    },
    centerUpdate(center) {
      this.currentCenter = center;
    },
    addMarker() {
      this.markers.push(L.latLng(this.center));
      this.zoom = 15;
      this.addButton = false;
      this.deleteButton = true;
    },
    deleteMarker() {
      this.markers.splice(-1, 1);
      this.deleteButton = false;
      this.addButton = true;
    },
  },
  mounted() {
    this.listaEstacions();
  },
};
</script>

<style scoped>
.map {
  width: 100%;
  height: 300px;
  margin: 1px;
}
img {
  border: red 2px solid;
  display: block;
}
</style>
