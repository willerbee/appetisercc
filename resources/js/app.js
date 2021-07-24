require('./bootstrap');

import Vue from 'vue'
import App from './vue/app'
import VueLuxon from "vue-luxon";
import VueToastr from "vue-toastr";

Vue.use(VueLuxon);
Vue.use(VueToastr);

const app = new Vue({
    el: '#app',
    components: { App }
});
