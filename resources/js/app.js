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

Vue.component('usuario-component', require('./components/UsuarioComponent.vue').default);
Vue.component('provincia-component', require('./components/ProvinciasComponent.vue').default);
Vue.component('detalle-component', require('./components/DetalleProvinciasComponent.vue').default);
Vue.component('principal-component', require('./components/PrincipalComponent.vue').default);
import { LMap, LTileLayer, LMarker, LPopup, LTooltip, LControlZoom } from 'vue2-leaflet';

Vue.component('l-map', LMap);
Vue.component('l-tile-layer', LTileLayer);
Vue.component('l-marker', LMarker);
Vue.component('l-popup', LPopup);
Vue.component('l-tooltip', LTooltip);
Vue.component('l-control-zoom', LControlZoom);

import store from './store';
const app = new Vue({
    store,
    el: '#app',
});
