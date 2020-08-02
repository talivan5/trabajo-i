/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**para las graficas sacar de Quick Start https://vue2-leaflet.netlify.app/quickstart/#nuxt */
/**USAGE In your entry point: ie: app.js o main.js */
import 'leaflet/dist/leaflet.css';
/**Marker Icons are missing */
import { Icon } from 'leaflet';

delete Icon.Default.prototype._getIconUrl;
Icon.Default.mergeOptions({
  iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
  iconUrl: require('leaflet/dist/images/marker-icon.png'),
  shadowUrl: require('leaflet/dist/images/marker-shadow.png'),
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
/**llama al componente ExampleComponent.vue */
Vue.component('usuario-component', require('./components/UsuarioComponent.vue').default);
/**llama al componente ProvinciasComponent.vue */
Vue.component('registrar-component', require('./components/RegistrarProvinciasComponent.vue').default);
Vue.component('provincias-component', require('./components/ListadoProvinciasComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import example from './components/ExampleComponent';
/**importa el componente UsuariosComponent.vue */
import usuario from './components/UsuarioComponent';
/**importa el componente ProvinciasComponent.vue */
import registrar from './components/RegistrarProvinciasComponent';
import provincia from './components/ListadoProvinciasComponent';
const app = new Vue({
    el: '#app',
    component:{
        example,
        usuario,
        registrar,
        provincia
    }
});
