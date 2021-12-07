<template>
  <div>
    <div class="row">
      <div class="col-sm-6" v-for="estacion in estacions" :key="estacion.id">
        <div class="card m-2" style="max-width: 740px">
          <div class="row no-gutters">
            <div class="col-md-8">
              <l-map
                v-if="showMap"
                :zoom="zoom"
                :center="center"
                :options="mapOptions"
                style="height: 100%"
              >
                <l-tile-layer :url="url" :attribution="attribution" />
                <l-marker
                  :lat-lng="latlng(estacion.latitud, estacion.longitud)"
                >
                  <l-popup>
                    <div @click="innerClick">
                      {{ estacion.nombre_estacion }}
                    </div>
                  </l-popup>
                </l-marker>
              </l-map>
            </div>
            <div class="col-md-4">
              <div class="card-body">
                <h6 class="card-title" style="text-transform: uppercase">
                  {{ estacion.nombre_estacion }}
                </h6>
                <img
                  :src="'storage/img/estaciones/' + estacion.imagen"
                  alt="estos es"
                  width="80"
                  height="80"
                />
                <p class="card-text">{{ estacion.tipo_estacion }}</p>
              
                <span v-if="estacion.estado =='Funcionando'" class="alert alert-primary">
                    {{estacion.estado}}
                </span>
                <span v-else class="alert alert-danger">
                    {{estacion.estado}}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { latLng } from "leaflet";
import { LMap } from "vue2-leaflet";
export default {
  data() {
    return {
      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      attribution:
        '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      zoom: 8,
      center: [-17.9647, -67.106],
      markers: [],
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
        tipo_sensor: "",
        datos: "",
        observaciones: "",
        estado: "",
        imagen: "",
      },
      lat: "",
      lng: "",
      showMap: true,
      mapOptions: {
        zoomSnap: 0.1,
      },
    };
  },
  components: {
    LMap,
  },
  computed: {
    estacions() {
      return this.$store.state.modulo_estacions.estacions;
    },
  },
  methods: {
    listaEstacions() {
      this.$store.dispatch("getEstacions");
    },
    innerClick() {
      alert("Click!");
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
  },
  mounted() {
    this.listaEstacions();
  },
};
</script>
