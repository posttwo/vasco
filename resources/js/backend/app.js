import '@coreui/coreui'
import '../bootstrap';
import Vue from 'vue';
import VueToastr from "vue-toastr";

window.Vue = Vue;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('queue-select-component', require('./components/QueueSelectComponent').default);
Vue.use(VueToastr, {});

const app = new Vue({
    el: '#app',
});
