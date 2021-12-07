import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import usuarios from './modulos/usuarios.js';
import estacions from './modulos/estacions.js';
import noticias from './modulos/noticias.js';
import poblacions from './modulos/poblacions.js';
import escuelas from './modulos/escuelas.js';
import sensors from './modulos/sensors.js';

export default new Vuex.Store({
    strict: true,
    modules: {
        modulo_usuarios: usuarios,
        modulo_estacions: estacions,
        modulo_noticias: noticias,
        modulo_poblacions: poblacions,
        modulo_escuelas: escuelas,
        modulo_sensors: sensors
    }
})
