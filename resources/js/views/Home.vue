<template>
    <div class="row h-100">
        <div class="col-sm-12 my-auto">
            <card-component 
                :titleHeader="'Seja Bem Vindo ao UDS Pizzaria'"
                :cardImgTop="'images/pizza2.jpg'">
                    <div class="text-center">
                        <h1>Vamos pedir uma pizza?</h1>

                        <div class="btn btn-outline-danger">
                            <router-link :to="{ name: 'pedido' }" class="nav-link text-danger">Fazer pedido</router-link>
                        </div>
                        
                    </div>
            </card-component>
        </div>
    </div>
</template>
<script>
import CardComponent from '../components/CardComponent'
export default {
    components: {
        CardComponent
    },
    data(){
        return {
            email: null,
            password: null,
            error: false,
            msg: ''
        }
    },
    mounted () {
    },
    methods:{
        login(){
            var app = this
            this.$auth.login({
                params: {
                    email: app.email,
                    password: app.password
                }, 
                success: function (res) {
                    console.log(res);
                },
                error: function (res) {
                    var status = res.response.data;
                    if(status.status == 'error'){
                        this.error = true;
                        this.msg = status.msg
                    }
                },
                rememberMe: true,
                redirect: '/pedido',
                fetchUser: true,
            });       
        },
    }
}
</script>

