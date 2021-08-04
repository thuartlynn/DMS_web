/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueGoodTablePlugin from 'vue-good-table';

// import the styles
import 'vue-good-table/dist/vue-good-table.css'

// 安裝 BootstrapVue
// Vue.use(BootstrapVue);
// 安裝 BootstrapVue icon components plugin (可選)
Vue.use(VueGoodTablePlugin);

import router from './router.js';
import VModal from 'vue-js-modal';
import DatePicker from 'vue2-datepicker';

Vue.use(VModal, {
    dialog: true,
    dynamic: true
})

Vue.use(DatePicker)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// import ExampleComponent from './components/ExampleComponent'

Vue.component('banner', require('./components/banner.vue').default);
Vue.component('login', require('./components/login_area.vue').default);
Vue.component('copyright', require('./components/copyright.vue').default);
Vue.component('indexbanner', require('./components/index_banner.vue').default);
Vue.component('indexmain', require('./components/index_main.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    // components: { ExampleComponent },
    router
});
