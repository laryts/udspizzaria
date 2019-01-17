<template>
    <div class="row h-100">
        <div class="col-sm-12 my-auto">
            <card-component 
                :titleHeader="'Meus Pedidos'"
                :cardImgTop="'images/pizza2.jpg'">
                <div  v-for="(ped, key) in pedidos" :key="key">
                    <ul>
                        <li></li>
                    </ul>
                    {{ped}}
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
            pedidos:null
        }
    },
    mounted () {
        axios.get('/pedidos').then(response => (this.pedidos = response.data))
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

