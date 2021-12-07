<template>
  <div>
    <div class="row">
      <div class="col col-8">
        <h1>LISTA DE TIPO DE SENSORES</h1>
      </div>
    </div>
    <div class="display:flex float-right my-2">
      <button
        type="button"
        class="btn btn-primary"
        @click="abrirModal('nuevo', null)"
      >
        Nuevo <i class="fa fa-file"></i>
      </button>
    </div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripción</th>
          <th scope="col">Estación</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="(sensor, $index) in sensors" :key="sensor.id">
          <th scope="row">{{ $index + 1 }}</th>
          <td>{{ sensor.nombre }}</td>
          <td>{{ sensor.descripcion }}</td>
          <td>{{ sensor.estacion.nombre_estacion }}</td>
          <td>
            <!-- crear boton editar -->
            <button
              type="button"
              class="btn btn-warning"
              @click="abrirModal('editar', sensor)"
            >
              Editar
            </button>
            <!-- crear boton eliminar -->
            <button
              type="button"
              class="btn btn-danger"
              @click="eliminarUsuario(sensor.id)"
            >
              Eliminar
            </button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- modal del nuevo -->
    <div
      class="modal fade"
      id="nuevo"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
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
            <div class="form-group">
              <label for="nombre" class="col-form-label">Nombre:</label>
              <input type="text" class="form-control" v-model="sensor.nombre" />
            </div>
            <div class="form-group">
              <label for="descripcion" class="col-form-label"
                >Descripción:</label
              >
              <textarea
                class="form-control"
                v-model="sensor.descripcion"
              ></textarea>
            </div>
            <div class="form-group">
              <label for="estacion_id" class="col-form-label">Estación:</label>
              <select class="form-control" v-model="sensor.estacion_id">
                <option value="" disabled>--Elegir estación--</option>
                <option
                  v-for="estacion in estacions"
                  :key="estacion.id"
                  :value="estacion.id"
                >
                  {{ estacion.nombre_estacion }}
                </option>
              </select>
            </div>
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
              class="btn btn-primary"
              @click="agregarSensor(sensor)"
            >
              Registrar
            </button>
            <button
              v-else
              class="btn btn-primary"
              @click="editarSensor(sensor)"
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
export default {
  data() {
    return {
      sensor: {
        id: "",
        nombre: "",
        descripcion: "",
        estacion_id: "",
      },
      estacion: [],
      title: "",
      esEdit: false,
    };
  },

  computed: {
    sensors() {
      return this.$store.state.modulo_sensors.sensors;
    },
    estacions() {
      return this.$store.state.modulo_estacions.estacions;
    },
  },

  methods: {
    listarSensors() {
      this.$store.dispatch("getSensors");
    },
    listarEstacions() {
      this.$store.dispatch("getEstacions");
    },
    abrirModal(tipo, sensor) {
      if (tipo != "nuevo") {
        this.esEdit = false;
        this.title = "Editar Tipo de Sensor";
        this.sensor = {
          id: sensor.id,
          nombre: sensor.nombre,
          descripcion: sensor.descripcion,
          estacion_id: sensor.estacion_id,
        };
      } else {
        this.esEdit = true;
        this.title = "Registrar un Tipo Sensor";
        this.sensor = {
          id: "",
          sensor: "",
          descripcion: "",
          estacion_id: "",
        };
      }
      $("#nuevo").modal({ backdrop: "static", keyboard: false, show: true });
    },
    agregarSensor(sensor) {
      this.$store.dispatch("addSensor", sensor);
      this.sensor = {
        nombre: sensor.nombre,
        descripcion: sensor.descripcion,
        estacion_id: sensor.estacion_id,
      };
      $("#nuevo").modal("hide");
    },
    editarSensor(sensor) {
      let payload = {
        id: sensor.id,
        nombre: sensor.nombre,
        descripcion: sensor.descripcion,
        estacion_id: sensor.estacion_id,
      };
      $("#nuevo").modal("hide");
      this.$store.dispatch("editSensor", sensor);
    },
    eliminarSensor(id) {
      this.$store.dispatch("deleteSensor", id);
    },
  },
  mounted() {
    this.listarSensors();
    this.listarEstacions();
  },
};
</script>
