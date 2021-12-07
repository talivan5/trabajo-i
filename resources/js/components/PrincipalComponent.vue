<template>
  <div class="mx-5 mb-5">
    <h3 class="text-center">Distancia entre dos puntos</h3>
    <div class="form-row">
      <div class="form-group col-6">
        <label for="inputAddress">Punto X1</label>
        <input
          class="form-control"
          type="number"
          name="distaciaX1"
          v-model="distaciaX1"
        />
      </div>
      <div class="form-group col-6">
        <label for="inputAddress">Punto X2</label>
        <input
          class="form-control"
          type="number"
          name="distaciaX2"
          v-model="distaciaX2"
        />
      </div>
      <div class="form-group col-6">
        <label for="inputAddress">Punto Y1</label>
        <input
          class="form-control"
          type="number"
          name="distaciaY1"
          v-model="distaciaY1"
        />
      </div>
      <div class="form-group col-6">
        <label for="inputAddress">Punto Y2</label>
        <input
          class="form-control"
          type="number"
          name="distaciaY2"
          v-model="distaciaY2"
        />
      </div>
      <div class="form-group col-6">
        <button class="btn btn-info my-4" @click="carcular()">Graficar</button>
        <button class="btn btn-warning my-4" @click="distacia()">
          Distancia
        </button>
      </div>
      <div class="form-group col-6">
        <h6>La distancia es de : {{ total }}</h6>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        <div class="map">
          <l-map
            v-if="showMap"
            :zoom="zoom"
            :center="center"
            :options="mapOptions"
            style="height: 100%"
          >
            <l-tile-layer :url="url" :attribution="attribution" />
            <l-marker
              v-for="estacion in estacions"
              :key="estacion.id"
              :lat-lng="latlng(estacion.latitud, estacion.longitud)"
            >
              <l-popup>
                <div class="card" @click="innerClick">
                  <img
                    class="card-img-top"
                    :src="'storage/img/estaciones/' + estacion.imagen"
                    alt="Card image cap"
                  />
                  <div class="card-body">
                    <h5 class="card-title">{{ estacion.nombre_estacion }}</h5>
                    <p class="card-text">{{ estacion.datos }}</p>
                  </div>
                </div>
              </l-popup>
              <l-tooltip :options="{ permanent: true, interactive: true }">
                <h5 class="card-title">{{ estacion.nombre_estacion }}</h5>
              </l-tooltip>
            </l-marker>
            <l-circle
              :lat-lng="circle.center"
              :radius="circle.radius"
              :l-style="circle.style"
            />
            <l-polyline :lat-lngs="travel" />
          </l-map>
        </div>
      </div>
      <div class="col-4">
        <h3 class="text-center">Graficar un circulo</h3>
        <div class="form-row">
          <div class="form-group col-6">
            <label for="latitudcir">Latitud</label>
            <input
              class="form-control"
              type="number"
              id="latitudcir"
              name="latitudcir"
              v-model="latitudcir"
            />
          </div>
          <div class="form-group col-6">
            <label for="longitudcir">Longitud</label>
            <input
              class="form-control"
              type="number"
              id="longitudcir"
              name="longitudcir"
              v-model="longitudcir"
            />
          </div>
          <div class="form-group col-6">
            <label for="radiocir">Radio</label>
            <input
              class="form-control"
              id="radiocir"
              type="number"
              name="radiocir"
              v-model="radiocir"
            />
          </div>
          <div class="form-group col-6">
            <label for="colorBuf">Color</label>
            <input
              class="form-control"
              id="colorBuf"
              type="color"
              name="colorBuf"
              v-model="colorBuf"
            />
          </div>
          <div class="form-group col-6">
            <label for="anchoBuf">Ancho</label>
            <input
              class="form-control"
              id="anchoBuf"
              min="1"
              max="6"
              type="number"
              name="anchoBuf"
              v-model="anchoBuf"
            />
          </div>
          <div class="form-group col-6">
            <label for="cantidadBuf">Cantidad</label>
            <input
              class="form-control"
              id="cantidadBuf"
              type="number"
              name="cantidadBuf"
              v-model="cantidadBuf"
            />
          </div>
          <div class="form-group col-12">
            <button class="from-control btn btn-secondary" @click="dibujar()">
              Graficar
            </button>
            <button class="btn btn-success" @click="clickBtn">Buffer</button>
            <button class="btn btn-danger" @click="bufferCantidad">
              Buffer Multiple
            </button>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">N°</th>
                <th scope="col">Estacion</th>
                <th scope="col">Latitud</th>
                <th scope="col">Longitud</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(estacion, index) in estacions" :key="estacion.id">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ estacion.nombre_estacion }}</td>
                <td>{{ estacion.latitud }}</td>
                <td>{{ estacion.longitud }}</td>
                <td>{{ estacion.estado }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { latLng } from "leaflet";
import { LMap, LCircle, LPolyline, LTooltip } from "vue2-leaflet";
export default {
  data() {
    return {
      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      attribution:
        '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      latitudcir: 0,
      longitudcir: 0,
      radiocir: 0,
      colorBuf: "",
      circle: {},
      distaciaX1: 0,
      distaciaX2: 0,
      distaciaY1: 0,
      distaciaY2: 0,
      travel: [
        [0, 0],
        [0, 0],
      ],
      zoom: 9,
      center: [-17.9647, -67.106],
      markers: [],
      estacion: {
        id: "",
        nombre_estacion: "",
        descripcion: "",
        movilidad: "",
        latitud: "",
        longitud: "",
        imagen: "",
      },
      lat: "",
      lng: "",
      showMap: true,
      mapOptions: {
        zoomSnap: 0.1,
      },
      total: 0,
      cantidadBuf: 0,
      anchoBuf: 0,
    };
  },
  components: {
    LMap,
    LCircle,
    LPolyline,
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
    dibujar() {
      this.circle = {
        center: latLng(this.latitudcir, this.longitudcir),
        radius: Number(this.radiocir),
        style: { color: this.colorBuf, weight: this.anchoBuf },
      };
    },
    distacia() {
      (this.total = Math.sqrt(
        Math.pow(Number(this.distaciaX2) - Number(this.distaciaX1), 2) +
          Math.pow(Number(this.distaciaY2) - Number(this.distaciaY1), 2)
      )),
        console.log(this.total);
    },
    carcular() {
      this.travel = [
        [this.distaciaX1, this.distaciaX2],
        [this.distaciaY1, this.distaciaY2],
      ];
    },
    clickBtn() {
      this.circle.style.weight += this.anchoBuf;
      this.circle.style.color = this.colorBuf;
    },
    bufferCantidad() {
      for (var i = 1; i <= this.cantidadBuf; i++) {
        this.circle.style.weight++;
        this.circle.style.color =
          "#" + (((1 << 24) * Math.random()) | 0).toString(16);
        this.circle.style.update = true;
        console.log(
          "#:",
          i,
          "radio:",
          this.circle.style.weight,
          "color:",
          this.circle.style.color
        );
      }
    }
  },
  mounted() {
    this.listaEstacions();
  },
};
</script>
<style scoped>
.map {
  width: 100%;
  height: 800px;
  margin: 1px;
}
</style>
