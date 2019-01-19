
require('./bootstrap');
import Vue from 'vue'
import VeeValidate from 'vee-validate';
import VueRouter from 'vue-router'
import VueAxios from 'vue-axios';
import axios from 'axios';
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

Vue.router = router

// Init Axios
Vue.use(VueAxios, axios);

axios.defaults.baseURL = 'http://localhost:3000/api';

// Init Vee Validate
Vue.use(VeeValidate, {
    events: 'change'
});

// Init Vue-Auth
Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});