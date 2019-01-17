import Home from './views/Home.vue';
// import Sobre from './views/Sobre.vue';
// import Contato from './views/Contato.vue';
import Pedido from './views/Pedido.vue';
import MeusPedidos from './views/MeusPedidos.vue';
import Login from './views/Login.vue';
import Register from './views/Register.vue';
import PageNotFound from './views/PageNotFound.vue';

export const routes = [
    { path: '/', name: 'home', component:Home, meta: { auth: true }, props: true },
    // { path: '/sobre/', name: 'sobre', component:Sobre, props: true },
    // { path: '/contato', name: 'contato', component:Contato, props: true },
    { path: '/pedido', name: 'pedido', component: Pedido, meta: { auth: true }, props: true },
    { path: '/meuspedidos', name: 'meuspedidos', component: MeusPedidos, meta: { auth: true }, props: true },
    { path: '/login', name: 'login', component: Login, meta: { auth: false }, props: true },
    { path: '/register', name: 'register', component:Register, meta: { auth: false }, props: true },
    { path: "/*", component: PageNotFound },
];