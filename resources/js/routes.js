import Home from './views/Home.vue';
// import Sobre from './views/Sobre.vue';
// import Contato from './views/Contato.vue';
import Pedido from './views/Pedido.vue';
// import PageNotFound from './views/PageNotFound.vue';

export const routes = [
    { path: '/', name: 'home', component:Home, props: true },
    // { path: '/sobre/', name: 'sobre', component:Sobre, props: true },
    // { path: '/contato', name: 'contato', component:Contato, props: true },
    { path: '/pedido', name: 'pedido', component:Pedido, props: true },
    // { path: "/*", component: PageNotFound },
];