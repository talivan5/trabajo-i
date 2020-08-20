import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import usuarios from './modulos/usuarios.js';
import provincias from './modulos/provincias.js';

export default new Vuex.Store({
    strict: true,
    modules: {
        modulo_usuarios: usuarios,
        modulo_provincias: provincias,
    }
})
