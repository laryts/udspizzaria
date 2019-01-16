
require('./bootstrap');
import Vue from 'vue'
import VeeValidate from 'vee-validate';
import VueRouter from 'vue-router'
import { routes } from './routes'
// FontAwesome
import { library, config } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons';
import { fab } from '@fortawesome/free-brands-svg-icons';
// Main Page 
import App from './views/App'


// Init Font Awesome
library.add(fas, far, fab)
Vue.component('font-awesome-icon', FontAwesomeIcon)

// Init Vue Router
Vue.use(VueRouter)
const router = new VueRouter({
    mode: 'history',
    routes
});

// Init Vee Validate
Vue.use(VeeValidate, {
    events: 'change'
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});