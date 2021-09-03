require('./bootstrap');

window.Vue = require('vue').default;

import storeData from "./store/vuex"
import Vuex from 'vuex'

const store = new Vuex.Store(
   storeData
)

import VueDatePicker from '@mathieustan/vue-datepicker';
import '@mathieustan/vue-datepicker/dist/vue-datepicker.min.css';
Vue.use(VueDatePicker, {
    lang: 'es'
});

import WebRTC from 'vue-webrtc'
Vue.use(WebRTC)


import Loading from 'vue-loading-overlay';
Vue.use(Loading,{ color:'#46196E', height:90, loader:'dots', width:200, backgroundColor:'rgb(194,250,198)', })
import 'vue-loading-overlay/dist/vue-loading.css';

// Cargar componentes
const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js');

const app = new Vue({
    el: '#app',
    store
});
